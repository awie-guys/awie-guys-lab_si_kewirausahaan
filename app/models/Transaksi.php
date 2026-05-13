<?php

class Transaksi extends Model
{
    protected $table = 'transaksi';

    public function generateKodeTransaksi()
    {
        $date = date('Ymd');

        $sql = "
            SELECT id
            FROM transaksi
            ORDER BY id DESC
            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $last = $stmt->fetch(PDO::FETCH_ASSOC);

        $next = 1;

        if ($last) {
            $next = $last['id'] + 1;
        }

        return 'TRX-' . $date . '-' . str_pad($next, 5, '0', STR_PAD_LEFT);
    }

    public function create($data)
    {
        $sql = "
            INSERT INTO transaksi (
                kode_transaksi,
                id_user,
                tanggal,
                total_jual,
                total_beli,
                total_laba,
                metode_bayar,
                nominal_bayar,
                kembalian
            ) VALUES (
                :kode_transaksi,
                :id_user,
                :tanggal,
                :total_jual,
                :total_beli,
                :total_laba,
                :metode_bayar,
                :nominal_bayar,
                :kembalian
            )
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':kode_transaksi', $data['kode_transaksi']);
        $stmt->bindValue(':id_user', $data['id_user'], PDO::PARAM_INT);
        $stmt->bindValue(':tanggal', $data['tanggal']);
        $stmt->bindValue(':total_jual', $data['total_jual']);
        $stmt->bindValue(':total_beli', $data['total_beli']);
        $stmt->bindValue(':total_laba', $data['total_laba']);
        $stmt->bindValue(':metode_bayar', $data['metode_bayar']);
        $stmt->bindValue(':nominal_bayar', $data['nominal_bayar']);
        $stmt->bindValue(':kembalian', $data['kembalian']);

        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function findById($id)
    {
        $sql = "
            SELECT
                t.id,
                t.kode_transaksi,
                t.tanggal,
                t.total_jual,
                t.total_beli,
                t.total_laba,
                t.metode_bayar,
                t.nominal_bayar,
                t.kembalian,

                u.id AS id_user,
                u.username,
                u.role

            FROM transaksi t

            INNER JOIN users u
                ON u.id = t.id_user

            WHERE t.id = :id

            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll($limit = 100)
    {
        $sql = "
            SELECT
                t.id,
                t.kode_transaksi,
                t.tanggal,
                t.total_jual,
                t.total_beli,
                t.total_laba,
                t.metode_bayar,
                t.nominal_bayar,
                t.kembalian,

                u.username

            FROM transaksi t

            INNER JOIN users u
                ON u.id = t.id_user

            ORDER BY t.id DESC
            LIMIT :limit
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getWithUser($limit = 100)
    {
        return $this->getAll($limit);
    }

    public function getByDateRange($start, $end, $limit = 100)
    {
        $sql = "
            SELECT
                t.id,
                t.kode_transaksi,
                t.tanggal,
                t.total_jual,
                t.total_beli,
                t.total_laba,
                t.metode_bayar,
                t.nominal_bayar,
                t.kembalian,

                u.username

            FROM transaksi t

            INNER JOIN users u
                ON u.id = t.id_user

            WHERE DATE(t.tanggal)
                BETWEEN :start AND :end

            ORDER BY t.tanggal DESC

            LIMIT :limit
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':start', $start);
        $stmt->bindValue(':end', $end);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}