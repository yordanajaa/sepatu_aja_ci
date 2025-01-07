<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

    // ----------------------------
    // Barang Operations
    // ----------------------------
    public function get_all_barang() {
        return $this->db->get('barang_sepatu')->result();
    }

    public function insert_barang($data) {
        $this->db->insert('barang_sepatu', $data);
    }

    public function get_barang_by_id($id) {
        return $this->db->get_where('barang_sepatu', ['id' => $id])->row();
    }

    public function update_barang($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('barang_sepatu', $data);
    }

    public function delete_barang($id) {
        $this->db->where('id', $id);
        $this->db->delete('barang_sepatu');
    }

    // ----------------------------
    // User Login Operations
    // ----------------------------
    public function login($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
    
        if ($query->num_rows() === 1) {
            $user = $query->row();
            // Verifikasi password
            if ($password === $user->password) {
                return $user;
            }
        }
        return false;
    }

    // Mendapatkan semua pengguna
public function get_all_users() {
    return $this->db->get('users')->result();
}

// Menambahkan pengguna baru
public function insert_user($data) {
    $this->db->insert('users', $data);
}

// Mendapatkan pengguna berdasarkan ID
public function get_user_by_id($id) {
    return $this->db->get_where('users', array('id' => $id))->row();
}

// Menghapus pengguna
public function delete_user($id) {
    $this->db->delete('users', array('id' => $id));
}


    // ----------------------------
    // Transaksi Operations
    // ----------------------------
    public function get_all_transaksi() {
        $this->db->select('transaksi.*, barang_sepatu.nama_barang, barang_sepatu.harga, barang_sepatu.gambar, barang_sepatu.stok');
        $this->db->from('transaksi');
        $this->db->join('barang_sepatu', 'transaksi.barang_id = barang_sepatu.id'); 
        return $this->db->get()->result();
    }

    public function insert_transaksi($data) {
        $this->db->trans_start();
        $this->db->insert('transaksi', $data);
        $barang = $this->get_barang_by_id($data['barang_id']);
        $new_stok = $barang->stok - $data['jumlah'];
    
        if ($new_stok >= 0) {
            $this->update_barang($barang->id, ['stok' => $new_stok]);
        } else {
            $this->db->trans_rollback();
            return false;
        }
        $this->db->trans_complete();   
        return $this->db->trans_status();
    }
    
    public function delete_transaksi($id) {
        $this->db->where('id', $id);
        $this->db->delete('transaksi');
    }
}
