<?php

class Barang extends Model {

    public function getAll() {
        // Menggunakan JOIN untuk mendapatkan nama kategori 
        $query = "SELECT b.id, b.kode_barang, b.nama, b.barcode, b.id_kategori, b.satuan, 
                         b.harga_jual, b.stok, b.stok_minimum, b.status, k.nama as nama_kategori 
                  FROM barang b 
                  LEFT JOIN kategori k ON b.id_kategori = k.id 
                  ORDER BY b.id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id) {
        $query = "SELECT b.*, k.nama as nama_kategori 
                  FROM barang b 
                  LEFT JOIN kategori k ON b.id_kategori = k.id 
                  WHERE b.id = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findActiveById($id) {
        $query = "SELECT b.*, k.nama as nama_kategori 
                  FROM barang b 
                  LEFT JOIN kategori k ON b.id_kategori = k.id 
                  WHERE b.id = :id AND b.status = 'aktif' LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function search($keyword) {
        $query = "SELECT id, kode_barang, nama, harga_jual, stok 
                  FROM barang 
                  WHERE nama LIKE :keyword OR kode_barang LIKE :keyword OR barcode LIKE :keyword 
                  LIMIT 10";
        $stmt = $this->db->prepare($query);
        $likeKeyword = "%$keyword%";
        $stmt->bindParam(':keyword', $likeKeyword);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function increaseStock($id, $qty) {
        $query = "UPDATE barang SET stok = stok + :qty WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':qty', $qty, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    public function decreaseStock($id, $qty) {
        $query = "UPDATE barang SET stok = stok - :qty WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':qty', $qty, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    public function insert($data) {
        $query = "INSERT INTO barang (kode_barang, nama, barcode, id_kategori, satuan, harga_jual, stok_minimum, status) 
                  VALUES (:kode_barang, :nama, :barcode, :id_kategori, :satuan, :harga_jual, :stok_minimum, :status)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_barang', $data['kode_barang']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':barcode', $data['barcode']);
        $stmt->bindParam(':id_kategori', $data['id_kategori']);
        $stmt->bindParam(':satuan', $data['satuan']);
        $stmt->bindParam(':harga_jual', $data['harga_jual']);
        $stmt->bindParam(':stok_minimum', $data['stok_minimum']);
        $stmt->bindParam(':status', $data['status']);
        
        return $stmt->execute();
    }

    public function update($id, $data) {
        // Stok sengaja tidak diupdate melalui fungsi master ini 
        $query = "UPDATE barang SET kode_barang = :kode_barang, nama = :nama, barcode = :barcode, 
                  id_kategori = :id_kategori, satuan = :satuan, harga_jual = :harga_jual, 
                  stok_minimum = :stok_minimum, status = :status 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_barang', $data['kode_barang']);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':barcode', $data['barcode']);
        $stmt->bindParam(':id_kategori', $data['id_kategori']);
        $stmt->bindParam(':satuan', $data['satuan']);
        $stmt->bindParam(':harga_jual', $data['harga_jual']);
        $stmt->bindParam(':stok_minimum', $data['stok_minimum']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }

    public function checkDuplicate($field, $value, $ignoreId = null) {
        $query = "SELECT id FROM barang WHERE $field = :value";
        if ($ignoreId) {
            $query .= " AND id != :id";
        }
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':value', $value);
        if ($ignoreId) {
            $stmt->bindParam(':id', $ignoreId);
        }
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }

    public function hasTransactions($id) {
        // Cek riwayat restock
        $query1 = "SELECT id FROM restock WHERE id_barang = :id LIMIT 1";
        $stmt1 = $this->db->prepare($query1);
        $stmt1->bindParam(':id', $id);
        $stmt1->execute();
        if ($stmt1->fetch()) return true;

        // Cek riwayat penjualan kasir
        $query2 = "SELECT id FROM detail_transaksi WHERE id_barang = :id LIMIT 1";
        $stmt2 = $this->db->prepare($query2);
        $stmt2->bindParam(':id', $id);
        $stmt2->execute();
        if ($stmt2->fetch()) return true;

        return false;
    }

    public function delete($id) {
        $query = "DELETE FROM barang WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
}