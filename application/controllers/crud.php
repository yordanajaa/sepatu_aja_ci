<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_data');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
    
            $user = $this->M_data->login($username, $password);
    
            if ($user) {
                $this->session->set_userdata('id', $user->id);
                $this->session->set_userdata('username', $user->username);
                redirect('crud/awal');
            } else {
                $data['error'] = 'Invalid username or password. Please try again.';
                $this->load->view('v_login', $data);
            }
        } else {
            $this->load->view('v_login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        redirect('crud/index');
    }

    public function users() {
        $data['users'] = $this->M_data->get_all_users();
        $this->load->view('v_data', $data);
    }
    
    public function tambah_user() {
        $this->load->view('v_tambah_data');
    }
    
    public function tambah_user_aksi() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('role', 'Role', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('v_input_user');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role')
            );
    
            $this->M_data->insert_user($data);
            redirect('crud/users');
        }
    }
    

    public function awal() {
        $data['barang_sepatu'] = $this->M_data->get_all_barang();
        $this->load->view('v_tampil', $data);
    }

    public function tambah() {
        $this->load->view('v_input');
    }

    public function tambah_aksi() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            $file_data = $this->upload->data();
            $data = array(
                'nama_barang' => $this->input->post('nama_barang'),
                'jenis_barang' => $this->input->post('jenis_barang'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'gambar' => $file_data['file_name']
            );
            $this->M_data->insert_barang($data);
            redirect('crud/awal');
        }
    }

    public function edit($id) {
        $data['barang_sepatu'] = $this->M_data->get_barang_by_id($id);
        $this->load->view('v_edit', $data);
    }

    public function update($id) {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $file_data = $this->upload->data();
            $data['gambar'] = $file_data['file_name'];
        }

        $data['nama_barang'] = $this->input->post('nama_barang');
        $data['jenis_barang'] = $this->input->post('jenis_barang');
        $data['harga'] = $this->input->post('harga');
        $data['stok'] = $this->input->post('stok');

        $this->M_data->update_barang($id, $data);
        redirect('crud/awal');
    }

    public function delete($id) {
        $barang = $this->M_data->get_barang_by_id($id);
    
        if ($barang) {
            $file_path = './uploads/' . $barang->gambar;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
    
            $this->M_data->delete_barang($id);
            redirect('crud/awal'); 
        } else {
            echo "Data tidak ditemukan.";
        }
    }

    public function transaksi() {
        $data['barang_sepatu'] = $this->M_data->get_all_barang();
        $data['transaksi'] = $this->M_data->get_all_transaksi();
        $this->load->view('v_transaksi', $data);
    }

    public function tambah_t() {
        $data['barang_sepatu'] = $this->M_data->get_all_barang();
        $this->load->view('v_input_transaksi', $data);
    }

    public function tambah_transaksi() {
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');
    
        if ($this->form_validation->run() == false) {
            $data['barang_sepatu'] = $this->M_data->get_all_barang();
            $this->load->view('v_input_transaksi', $data);
        } else {
            $barang = $this->M_data->get_barang_by_id($this->input->post('barang_id'));
            $jumlah = $this->input->post('jumlah');
            $total = $barang->harga * $jumlah;
    
            if ($barang->stok >= $jumlah) {
                $data = array(
                    'barang_id' => $this->input->post('barang_id'),
                    'jumlah' => $jumlah,
                    'total_harga' => $total
                );
                $this->M_data->insert_transaksi($data);

                $new_stok = $barang->stok - $jumlah;
                $this->M_data->update_barang($barang->id, array('stok' => $new_stok));
    
                redirect('crud/transaksi');
            } else {
                $this->session->set_flashdata('error', 'Stok tidak mencukupi untuk transaksi.');
                $data['barang_sepatu'] = $this->M_data->get_all_barang();
                $this->load->view('v_input_transaksi', $data);
            }
        }
    }
    

    public function delete_transaksi($id) {
        $this->M_data->delete_transaksi($id);
        redirect('crud/transaksi');
    }
}
?>
