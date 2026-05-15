<?php

class Laporan extends Model
{
    public function getRingkasanPenjualan(string $start, string $end): array
    {
        $sql = "SELECT
                    DATE(t.tanggal) AS tanggal,
                    COUNT(t.id)     AS jumlah_transaksi,
                    SUM(t.total_jual) AS total_penjualan,
                    SUM(t.total_laba) AS total_laba
                FROM transaksi t
                WHERE DATE(t.tanggal) BETWEEN :start AND :end
                GROUP BY DATE(t.tanggal)
                ORDER BY DATE(t.tanggal) DESC";

        return $this->all($sql, [':start' => $start, ':end' => $end]);
    }

    public function getLaporanLaba(string $start, string $end): array
    {
        $sql = "SELECT
                    t.id,
                    t.kode_transaksi,
                    t.tanggal,
                    t.total_jual,
                    t.total_beli,
                    t.total_laba,
                    t.metode_bayar,
                    u.username AS nama_kasir
                FROM transaksi t
                JOIN users u ON t.id_user = u.id
                WHERE DATE(t.tanggal) BETWEEN :start AND :end
                ORDER BY t.tanggal DESC";

        return $this->all($sql, [':start' => $start, ':end' => $end]);
    }

    public function getBarangTerlaris(string $start, string $end): array
    {
        $sql = "SELECT
                    b.id,
                    b.kode_barang,
                    b.nama AS nama_barang,
                    b.satuan,
                    SUM(dt.qty)           AS total_terjual,
                    SUM(dt.subtotal_jual) AS total_pendapatan,
                    SUM(dt.laba_item)     AS total_laba
                FROM detail_transaksi dt
                JOIN barang b ON dt.id_barang = b.id
                JOIN transaksi t ON dt.id_transaksi = t.id
                WHERE DATE(t.tanggal) BETWEEN :start AND :end
                GROUP BY b.id, b.kode_barang, b.nama, b.satuan
                ORDER BY total_terjual DESC";

        return $this->all($sql, [':start' => $start, ':end' => $end]);
    }
    public function getLaporanRestock(string $start, string $end): array
    {
        $sql = "SELECT
                    r.id,
                    r.tanggal,
                    r.qty,
                    r.harga_beli,
                    r.harga_jual_baru,
                    r.total_nilai,
                    r.catatan,
                    b.kode_barang,
                    b.nama AS nama_barang,
                    b.satuan,
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

    public function getSummary(string $start, string $end): array|false
    {
        $sql = "SELECT
                    COUNT(id)        AS jumlah_transaksi,
                    SUM(total_jual)  AS total_penjualan,
                    SUM(total_beli)  AS total_modal,
                    SUM(total_laba)  AS total_laba
                FROM transaksi
                WHERE DATE(tanggal) BETWEEN :start AND :end";

        return $this->first($sql, [':start' => $start, ':end' => $end]);
    }
}
