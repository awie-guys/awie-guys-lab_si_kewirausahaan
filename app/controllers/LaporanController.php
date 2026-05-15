<?php

class LaporanController extends Controller
{
    public function index(): void
    {
        $this->requireRole('admin');

        [$start, $end] = $this->getDateRange();

        /** @var Laporan $laporanModel */
        $laporanModel = $this->model('Laporan');

        $summary = $laporanModel->getSummary($start, $end);

        $this->view('admin/laporan/index', [
            'title'   => 'Laporan',
            'summary' => $summary,
            'start'   => $start,
            'end'     => $end,
        ]);
    }

    // ----------------------------------------------------------------
    // GET /admin/laporan/penjualan
    // Laporan penjualan per hari
    // ----------------------------------------------------------------
    public function penjualan(): void
    {
        $this->requireRole('admin');

        [$start, $end] = $this->getDateRange();

        /** @var Laporan $laporanModel */
        $laporanModel = $this->model('Laporan');

        $data    = $laporanModel->getRingkasanPenjualan($start, $end);
        $summary = $laporanModel->getSummary($start, $end);

        $this->view('admin/laporan/penjualan', [
            'title'   => 'Laporan Penjualan',
            'data'    => $data,
            'summary' => $summary,
            'start'   => $start,
            'end'     => $end,
        ]);
    }

    // ----------------------------------------------------------------
    // GET /admin/laporan/laba
    // Laporan laba per transaksi
    // ----------------------------------------------------------------
    public function laba(): void
    {
        $this->requireRole('admin');

        [$start, $end] = $this->getDateRange();

        /** @var Laporan $laporanModel */
        $laporanModel = $this->model('Laporan');

        $data    = $laporanModel->getLaporanLaba($start, $end);
        $summary = $laporanModel->getSummary($start, $end);

        $this->view('admin/laporan/laba', [
            'title'   => 'Laporan Laba',
            'data'    => $data,
            'summary' => $summary,
            'start'   => $start,
            'end'     => $end,
        ]);
    }

    // ----------------------------------------------------------------
    // GET /admin/laporan/barang-terlaris
    // Laporan barang terlaris
    // ----------------------------------------------------------------
    public function barangTerlaris(): void
    {
        $this->requireRole('admin');

        [$start, $end] = $this->getDateRange();

        /** @var Laporan $laporanModel */
        $laporanModel = $this->model('Laporan');

        $data = $laporanModel->getBarangTerlaris($start, $end);

        $this->view('admin/laporan/barang-terlaris', [
            'title' => 'Barang Terlaris',
            'data'  => $data,
            'start' => $start,
            'end'   => $end,
        ]);
    }

    // ----------------------------------------------------------------
    // GET /admin/laporan/restock
    // Laporan restock
    // ----------------------------------------------------------------
    public function restock(): void
    {
        $this->requireRole('admin');

        [$start, $end] = $this->getDateRange();

        /** @var Laporan $laporanModel */
        $laporanModel = $this->model('Laporan');

        $data = $laporanModel->getLaporanRestock($start, $end);

        // Hitung total nilai restock
        $totalNilai = array_sum(array_column($data, 'total_nilai'));

        $this->view('admin/laporan/restock', [
            'title'      => 'Laporan Restock',
            'data'       => $data,
            'totalNilai' => $totalNilai,
            'start'      => $start,
            'end'        => $end,
        ]);
    }

    // ----------------------------------------------------------------
    // Helper: ambil rentang tanggal dari GET parameter
    // Default: bulan ini
    // ----------------------------------------------------------------
    private function getDateRange(): array
    {
        $start = trim($_GET['start'] ?? '');
        $end   = trim($_GET['end'] ?? '');

        // Validasi format tanggal
        if (!$this->isValidDate($start)) {
            $start = date('Y-m-01'); // awal bulan ini
        }

        if (!$this->isValidDate($end)) {
            $end = date('Y-m-d'); // hari ini
        }

        // Pastikan start tidak lebih besar dari end
        if ($start > $end) {
            [$start, $end] = [$end, $start];
        }

        return [$start, $end];
    }

    // ----------------------------------------------------------------
    // Helper: validasi format tanggal Y-m-d
    // ----------------------------------------------------------------
    private function isValidDate(string $date): bool
    {
        if (strlen($date) !== 10) {
            return false;
        }

        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }
}