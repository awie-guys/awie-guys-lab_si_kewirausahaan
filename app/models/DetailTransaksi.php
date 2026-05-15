<?php

class DetailTransaksi extends Model
{
    public function create(array $data): bool
    {
        $sql = "INSERT INTO detail_transaksi (id_transaksi, id_barang, qty, harga_jual, harga_beli, subtotal_jual, subtotal_beli, laba_item)
                VALUES (:id_transaksi, :id_barang, :qty, :harga_jual, :harga_beli, :subtotal_jual, :subtotal_beli, :laba_item)";

        $this->query($sql, [
            ':id_transaksi'  => $data['id_transaksi'],
            ':id_barang'     => $data['id_barang'],
            ':qty'           => $data['qty'],
            ':harga_jual'    => $data['harga_jual'],
            ':harga_beli'    => $data['harga_beli'],
            ':subtotal_jual' => $data['subtotal_jual'],
            ':subtotal_beli' => $data['subtotal_beli'],
            ':laba_item'     => $data['laba_item'],
        ]);

        return true;
    }

    public function getByTransaksiId(int $idTransaksi): array
    {
        $sql = "SELECT dt.id, dt.qty, dt.harga_jual, dt.harga_beli,
                       dt.subtotal_jual, dt.subtotal_beli, dt.laba_item,
                       b.nama AS nama_barang, b.kode_barang, b.satuan
                FROM detail_transaksi dt
                JOIN barang b ON dt.id_barang = b.id
                WHERE dt.id_transaksi = :id_transaksi";

        return $this->all($sql, [':id_transaksi' => $idTransaksi]);
    }

    public function getItemsWithBarang(int $idTransaksi): array
    {
        return $this->getByTransaksiId($idTransaksi);
    }
}
