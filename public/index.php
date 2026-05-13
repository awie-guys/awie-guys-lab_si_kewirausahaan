<?php

define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('CONFIG_PATH', APP_PATH . '/config');
define('CORE_PATH', APP_PATH . '/core');
define('PUBLIC_PATH', __DIR__);

require_once CONFIG_PATH . '/config.php';

date_default_timezone_set(APP_TIMEZONE);

if (APP_DEBUG) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
    error_reporting(0);
}

require_once CORE_PATH . '/Session.php';
require_once CORE_PATH . '/Router.php';
require_once CORE_PATH . '/Controller.php';
require_once CORE_PATH . '/Model.php';
require_once CORE_PATH . '/Validator.php';

spl_autoload_register(function (string $className): void {
    $paths = [
        APP_PATH . '/controllers/' . $className . '.php',
        APP_PATH . '/models/' . $className . '.php',
        APP_PATH . '/middleware/' . $className . '.php',
        CORE_PATH . '/' . $className . '.php',
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

Session::start();

$router = new Router();

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
$router->get('/', 'AuthController@index');
$router->get('/login', 'AuthController@index');
$router->post('/login', 'AuthController@login');
$router->post('/logout', 'AuthController@logout');

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/
$router->get('/admin/dashboard', 'DashboardController@adminIndex');
$router->get('/kasir/dashboard', 'DashboardController@kasirIndex');

/*
|--------------------------------------------------------------------------
| Kategori Routes
|--------------------------------------------------------------------------
*/
$router->get('/admin/kategori', 'KategoriController@index');
$router->get('/admin/kategori/create', 'KategoriController@create');
$router->post('/admin/kategori/store', 'KategoriController@store');
$router->get('/admin/kategori/edit/{id}', 'KategoriController@edit');
$router->post('/admin/kategori/update/{id}', 'KategoriController@update');
$router->post('/admin/kategori/delete/{id}', 'KategoriController@delete');

/*
|--------------------------------------------------------------------------
| Barang Routes
|--------------------------------------------------------------------------
*/
$router->get('/admin/barang', 'BarangController@index');
$router->get('/admin/barang/create', 'BarangController@create');
$router->post('/admin/barang/store', 'BarangController@store');
$router->get('/admin/barang/detail/{id}', 'BarangController@detail');
$router->get('/admin/barang/edit/{id}', 'BarangController@edit');
$router->post('/admin/barang/update/{id}', 'BarangController@update');
$router->post('/admin/barang/delete/{id}', 'BarangController@delete');

/*
|--------------------------------------------------------------------------
| Supplier Routes
|--------------------------------------------------------------------------
*/
$router->get('/admin/supplier', 'SupplierController@index');
$router->get('/admin/supplier/create', 'SupplierController@create');
$router->post('/admin/supplier/store', 'SupplierController@store');
$router->get('/admin/supplier/edit/{id}', 'SupplierController@edit');
$router->post('/admin/supplier/update/{id}', 'SupplierController@update');
$router->post('/admin/supplier/delete/{id}', 'SupplierController@delete');

/*
|--------------------------------------------------------------------------
| Restock Routes
|--------------------------------------------------------------------------
*/
$router->get('/admin/restock', 'RestockController@index');
$router->get('/admin/restock/create', 'RestockController@create');
$router->post('/admin/restock/store', 'RestockController@store');

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
$router->get('/admin/user', 'UserController@index');
$router->get('/admin/user/create', 'UserController@create');
$router->post('/admin/user/store', 'UserController@store');
$router->get('/admin/user/edit/{id}', 'UserController@edit');
$router->post('/admin/user/update/{id}', 'UserController@update');
$router->get('/admin/user/reset-password/{id}', 'UserController@resetPassword');
$router->post('/admin/user/reset-password/{id}', 'UserController@updatePassword');
$router->post('/admin/user/delete/{id}', 'UserController@delete');

/*
|--------------------------------------------------------------------------
| Transaksi Routes
|--------------------------------------------------------------------------
*/
$router->get('/admin/transaksi', 'TransaksiController@adminIndex');
$router->get('/kasir/transaksi', 'TransaksiController@kasirIndex');
$router->post('/transaksi/store', 'TransaksiController@store');

/*
|--------------------------------------------------------------------------
| Riwayat Transaksi Routes
|--------------------------------------------------------------------------
*/
$router->get('/admin/riwayat-transaksi', 'RiwayatTransaksiController@index');
$router->get('/admin/riwayat-transaksi/detail/{id}', 'RiwayatTransaksiController@detail');

/*
|--------------------------------------------------------------------------
| Laporan Routes
|--------------------------------------------------------------------------
*/
$router->get('/admin/laporan', 'LaporanController@index');
$router->get('/admin/laporan/penjualan', 'LaporanController@penjualan');
$router->get('/admin/laporan/laba', 'LaporanController@laba');
$router->get('/admin/laporan/barang-terlaris', 'LaporanController@barangTerlaris');
$router->get('/admin/laporan/restock', 'LaporanController@restock');

/*
|--------------------------------------------------------------------------
| Error Routes
|--------------------------------------------------------------------------
*/
$router->get('/403', 'ErrorController@forbidden');
$router->get('/404', 'ErrorController@notFound');

try {
    $router->run();
} catch (Throwable $error) {
    http_response_code(500);

    if (APP_DEBUG) {
        echo '<h1>500 - Internal Server Error</h1>';
        echo '<pre>' . htmlspecialchars($error->getMessage(), ENT_QUOTES, 'UTF-8') . '</pre>';
        echo '<pre>' . htmlspecialchars($error->getFile() . ':' . $error->getLine(), ENT_QUOTES, 'UTF-8') . '</pre>';
    } else {
        echo '<h1>500 - Internal Server Error</h1>';
        echo '<p>Terjadi kesalahan pada server.</p>';
    }
}