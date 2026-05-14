<?php

class Kategori extends Model {

    public function getAll() {
        $query = "SELECT id, nama, deskripsi, created_at, updated_at FROM kategori ORDER BY id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT id, nama, deskripsi FROM kategori WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $query = "INSERT INTO kategori (nama, deskripsi) VALUES (:nama, :deskripsi)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        
        return $stmt->execute();
    }

    public function update($id, $data) {
        $query = "UPDATE kategori SET nama = :nama, deskripsi = :deskripsi WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':deskripsi', $data['deskripsi']);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }

    public function isUsedByBarang($id) {
        // Cek apakah kategori masih dipakai oleh barang
        $query = "SELECT id FROM barang WHERE id_kategori = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }

    public function delete($id) {
        $query = "DELETE FROM kategori WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }

}