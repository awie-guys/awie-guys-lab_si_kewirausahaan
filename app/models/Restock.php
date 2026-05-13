<?php

class Restock extends Model
{
    protected $table = 'restock';

    public function getAll($limit = 100)
    {
        $sql = "
            SELECT
                r.id,
                r.tanggal,
                r.qty,
                r.harga_beli,
                r.harga_jual_baru,
                r.total_nilai,
                r.catatan,

                b.id AS id_barang,
                b.kode_barang,
                b.nama AS nama_barang,

                s.id AS id_supplier,
                s.nama AS nama_supplier,

                u.id AS id_user,
                u.username AS nama_user

            FROM restock r

            INNER JOIN barang b
                ON b.id = r.id_barang

            INNER JOIN supplier s
                ON s.id = r.id_supplier

            INNER JOIN users u
                ON u.id = r.id_user

            ORDER BY r.id DESC
            LIMIT :limit
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $sql = "
            SELECT
                r.id,
                r.tanggal,
                r.qty,
                r.harga_beli,
                r.harga_jual_baru,
                r.total_nilai,
                r.catatan,

                b.id AS id_barang,
                b.kode_barang,
                b.nama AS nama_barang,
                b.stok,

                s.id AS id_supplier,
                s.nama AS nama_supplier,

                u.id AS id_user,
                u.username AS nama_user

            FROM restock r

            INNER JOIN barang b
                ON b.id = r.id_barang

            INNER JOIN supplier s
                ON s.id = r.id_supplier

            INNER JOIN users u
                ON u.id = r.id_user

            WHERE r.id = :id

            LIMIT 1
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "
            INSERT INTO restock (
                tanggal,
                id_barang,
                id_supplier,
                id_user,
                qty,
                harga_beli,
                harga_jual_baru,
                total_nilai,
                catatan
            ) VALUES (
                :tanggal,
                :id_barang,
                :id_supplier,
                :id_user,
                :qty,
                :harga_beli,
                :harga_jual_baru,
                :total_nilai,
                :catatan
            )
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':tanggal', $data['tanggal']);
        $stmt->bindValue(':id_barang', $data['id_barang'], PDO::PARAM_INT);
        $stmt->bindValue(':id_supplier', $data['id_supplier'], PDO::PARAM_INT);
        $stmt->bindValue(':id_user', $data['id_user'], PDO::PARAM_INT);
        $stmt->bindValue(':qty', $data['qty'], PDO::PARAM_INT);
        $stmt->bindValue(':harga_beli', $data['harga_beli']);
        $stmt->bindValue(':total_nilai', $data['total_nilai']);
        $stmt->bindValue(':catatan', $data['catatan']);

        if (!empty($data['harga_jual_baru'])) {
            $stmt->bindValue(
                ':harga_jual_baru',
                $data['harga_jual_baru']
            );
        } else {
            $stmt->bindValue(
                ':harga_jual_baru',
                null,
                PDO::PARAM_NULL
            );
        }

        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function getByDateRange($start, $end, $limit = 100)
    {
        $sql = "
            SELECT
                r.id,
                r.tanggal,
                r.qty,
                r.harga_beli,
                r.harga_jual_baru,
                r.total_nilai,
                r.catatan,

                b.nama AS nama_barang,
                b.kode_barang,

                s.nama AS nama_supplier,

                u.username AS nama_user

            FROM restock r

            INNER JOIN barang b
                ON b.id = r.id_barang

            INNER JOIN supplier s
                ON s.id = r.id_supplier

            INNER JOIN users u
                ON u.id = r.id_user

            WHERE r.tanggal BETWEEN :start AND :end

            ORDER BY r.tanggal DESC
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