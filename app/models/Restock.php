<?php

class Restock extends Model
{
    public function getAll(): array
    {
        $sql = "SELECT r.id, r.tanggal, r.qty, r.harga_beli, r.harga_jual_baru, r.total_nilai, r.catatan,
                       b.nama AS nama_barang, b.kode_barang, b.satuan,
                       s.nama AS nama_supplier,
                       u.username AS nama_user
                FROM restock r
                JOIN barang b ON r.id_barang = b.id
                JOIN supplier s ON r.id_supplier = s.id
                JOIN users u ON r.id_user = u.id
                ORDER BY r.tanggal DESC, r.id DESC";

        return $this->all($sql);
    }

    public function findById(int $id): array|false
    {
        $sql = "SELECT r.id, r.tanggal, r.qty, r.harga_beli, r.harga_jual_baru, r.total_nilai, r.catatan,
                       r.id_barang, r.id_supplier, r.id_user,
                       b.nama AS nama_barang, b.kode_barang, b.satuan,
                       s.nama AS nama_supplier,
                       u.username AS nama_user
                FROM restock r
                JOIN barang b ON r.id_barang = b.id
                JOIN supplier s ON r.id_supplier = s.id
                JOIN users u ON r.id_user = u.id
                WHERE r.id = :id
                LIMIT 1";

        return $this->first($sql, [':id' => $id]);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO restock (tanggal, id_barang, id_supplier, id_user, qty, harga_beli, harga_jual_baru, total_nilai, catatan)
                VALUES (:tanggal, :id_barang, :id_supplier, :id_user, :qty, :harga_beli, :harga_jual_baru, :total_nilai, :catatan)";

        $this->query($sql, [
            ':tanggal'       => $data['tanggal'],
            ':id_barang'     => $data['id_barang'],
            ':id_supplier'   => $data['id_supplier'],
            ':id_user'       => $data['id_user'],
            ':qty'           => $data['qty'],
            ':harga_beli'    => $data['harga_beli'],
            ':harga_jual_baru' => $data['harga_jual_baru'] ?? null,
            ':total_nilai'   => $data['total_nilai'],
            ':catatan'       => $data['catatan'] ?? null,
        ]);

        return true;
    }

    public function getByDateRange(string $start, string $end): array
    {
        $sql = "SELECT r.id, r.tanggal, r.qty, r.harga_beli, r.harga_jual_baru, r.total_nilai, r.catatan,
                       b.nama AS nama_barang, b.kode_barang, b.satuan,
                       s.nama AS nama_supplier,
                       u.username AS nama_user
                FROM restock r
                JOIN barang b ON r.id_barang = b.id
                JOIN supplier s ON r.id_supplier = s.id
                JOIN users u ON r.id_user = u.id
                WHERE r.tanggal BETWEEN :start AND :end
                ORDER BY r.tanggal DESC, r.id DESC";

        return $this->all($sql, [':start' => $start, ':end' => $end]);
    }
}