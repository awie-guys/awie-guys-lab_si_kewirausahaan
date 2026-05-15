<?php

class Supplier extends Model {

    public function getAll() {
        $query = "SELECT id, nama, kontak_person, no_hp, alamat, keterangan, status, created_at, updated_at 
                  FROM supplier ORDER BY id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT id, nama, kontak_person, no_hp, alamat, keterangan, status 
                  FROM supplier WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($data) {
        $query = "INSERT INTO supplier (nama, kontak_person, no_hp, alamat, keterangan, status) 
                  VALUES (:nama, :kontak_person, :no_hp, :alamat, :keterangan, :status)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':kontak_person', $data['kontak_person']);
        $stmt->bindParam(':no_hp', $data['no_hp']);
        $stmt->bindParam(':alamat', $data['alamat']);
        $stmt->bindParam(':keterangan', $data['keterangan']);
        $stmt->bindParam(':status', $data['status']);
        
        return $stmt->execute();
    }

    public function update($id, $data) {
        $query = "UPDATE supplier SET nama = :nama, kontak_person = :kontak_person, no_hp = :no_hp, 
                  alamat = :alamat, keterangan = :keterangan, status = :status WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama', $data['nama']);
        $stmt->bindParam(':kontak_person', $data['kontak_person']);
        $stmt->bindParam(':no_hp', $data['no_hp']);
        $stmt->bindParam(':alamat', $data['alamat']);
        $stmt->bindParam(':keterangan', $data['keterangan']);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }

    public function hasRestock($id) {
        $query = "SELECT id FROM restock WHERE id_supplier = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }

    public function delete($id) {
        $query = "DELETE FROM supplier WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
}