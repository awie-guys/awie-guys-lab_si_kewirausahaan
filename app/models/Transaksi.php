<?php

class Transaksi extends Model
{
    public function create(array $data): int
    {
        $sql = "INSERT INTO transaksi (kode_transaksi, id_user, tanggal, total_jual, total_beli, total_laba, metode_bayar, nominal_bayar, kembalian)
                VALUES (:kode_transaksi, :id_user, :tanggal, :total_jual, :total_beli, :total_laba, :metode_bayar, :nominal_bayar, :kembalian)";

        $this->query($sql, [
            ':kode_transaksi' => $data['kode_transaksi'],
            ':id_user'        => $data['id_user'],
            ':tanggal'        => $data['tanggal'],
            ':total_jual'     => $data['total_jual'],
            ':total_beli'     => $data['total_beli'],
            ':total_laba'     => $data['total_laba'],
            ':metode_bayar'   => $data['metode_bayar'],
            ':nominal_bayar'  => $data['nominal_bayar'],
            ':kembalian'      => $data['kembalian'],
        ]);

        return (int) $this->db->lastInsertId();
    }

    public function findById(int $id): array|false
    {
        $sql = "SELECT t.*, u.username AS nama_kasir
                FROM transaksi t
                JOIN users u ON t.id_user = u.id
                WHERE t.id = :id
                LIMIT 1";

        return $this->first($sql, [':id' => $id]);
    }

    public function getAll(): array
    {
        $sql = "SELECT t.id, t.kode_transaksi, t.tanggal, t.total_jual, t.total_beli, t.total_laba,
                       t.metode_bayar, t.nominal_bayar, t.kembalian,
                       u.username AS nama_kasir
                FROM transaksi t
                JOIN users u ON t.id_user = u.id
                ORDER BY t.tanggal DESC, t.id DESC";

        return $this->all($sql);
    }

    public function getWithUser(): array
    {
        return $this->getAll();
    }

    public function getByDateRange(string $start, string $end): array
    {
        $sql = "SELECT t.id, t.kode_transaksi, t.tanggal, t.total_jual, t.total_beli, t.total_laba,
                       t.metode_bayar, t.nominal_bayar, t.kembalian,
                       u.username AS nama_kasir
                FROM transaksi t
                JOIN users u ON t.id_user = u.id
                WHERE DATE(t.tanggal) BETWEEN :start AND :end
                ORDER BY t.tanggal DESC, t.id DESC";

        return $this->all($sql, [':start' => $start, ':end' => $end]);
    }

    public function getDb(): PDO
    {
        return $this->db;
    }
}
