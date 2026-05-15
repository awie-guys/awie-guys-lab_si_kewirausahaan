<?php

class RiwayatTransaksiController extends Controller
{
    public function index(): void
    {
        $this->requireRole('admin');

        /** @var Transaksi $transaksiModel */
        $transaksiModel = $this->model('Transaksi');

        $transaksis = $transaksiModel->getWithUser();

        $this->view('admin/riwayat-transaksi/index', [
            'title'      => 'Riwayat Transaksi',
            'transaksis' => $transaksis,
        ]);
    }

    public function detail(int $id): void
    {
        $this->requireRole('admin');

        /** @var Transaksi $transaksiModel */
        $transaksiModel = $this->model('Transaksi');

        $transaksi = $transaksiModel->findById($id);

        if (!$transaksi) {
            $this->redirect('/admin/riwayat-transaksi');
            return;
        }

        /** @var DetailTransaksi $detailModel */
        $detailModel = $this->model('DetailTransaksi');

        $details = $detailModel->getItemsWithBarang($id);

        $this->view('admin/riwayat-transaksi/detail', [
            'title'     => 'Detail Transaksi',
            'transaksi' => $transaksi,
            'details'   => $details,
        ]);
    }
}