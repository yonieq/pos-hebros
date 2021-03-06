<?php

use App\Http\Controllers\{
    DashboardController,
    KategoriController,
    LaporanController,
    BarangController,
    MidtransController,
    PelangganController,
    PengeluaranController,
    PembelianController,
    PembelianDetailController,
    PenjualanController,
    PenjualanDetailController,
    SettingController,
    SupplierController,
    UserController,
};
// use Excel;
use App\Imports\BarangImport;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});
// Route::get('/barang/import', [BarangController::class, 'barangImport'])->name('barangImport');
// Route::post('/barang/importPost', [BarangController::class, 'barangImportPost'])->name('barangImportPost');
Route::post('import_barang', function () {
    Excel::import(new BarangImport, request()->file('file'));
    return redirect()->back()->with('success','Data Imported Successfully');
});

Route::get('/pengeluaran/export-excel', [PengeluaranController::class, 'exportExcel'])->name('exportExcel');
Route::get('/pengeluaran/export-csv', [PengeluaranController::class, 'exportCSV'])->name('exportCSV');

Route::get('/pembelian/export-excel', [PembelianController::class, 'exportExcel'])->name('exportExcel');
Route::get('/pembelian/export-csv', [PembelianController::class, 'exportCSV'])->name('exportCSV');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => 'level:1'], function () {
        // Route::get('/kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
        // Route::resource('/kategori', KategoriController::class);

        // Route::get('/barang/data', [BarangController::class, 'data'])->name('barang.data');
        // Route::post('/barang/delete-selected', [BarangController::class, 'deleteSelected'])->name('barang.delete_selected');
        // Route::post('/barang/cetak-barcode', [BarangController::class, 'cetakBarcode'])->name('barang.cetak_barcode');
        // Route::resource('/barang', BarangController::class);

        Route::get('/pelanggan/data', [PelangganController::class, 'data'])->name('pelanggan.data');
        Route::post('/pelanggan/cetak-pelanggan', [PelangganController::class, 'cetakPelanggan'])->name('pelanggan.cetak_pelanggan');
        Route::resource('/pelanggan', PelangganController::class);

        // Route::get('/supplier/data', [SupplierController::class, 'data'])->name('supplier.data');
        // Route::resource('/supplier', SupplierController::class);

        Route::get('/pengeluaran/data', [PengeluaranController::class, 'data'])->name('pengeluaran.data');
        Route::resource('/pengeluaran', PengeluaranController::class);
        // Route::get('/pengeluaran/export-excel', [PengeluaranController::class, 'exportExcel']);

        Route::get('/pembelian/data', [PembelianController::class, 'data'])->name('pembelian.data');
        Route::get('/pembelian/{id}/create', [PembelianController::class, 'create'])->name('pembelian.create');
        Route::resource('/pembelian', PembelianController::class)
            ->except('create');

        Route::get('/pembelian_detail/{id}/data', [PembelianDetailController::class, 'data'])->name('pembelian_detail.data');
        Route::get('/pembelian_detail/loadform/{diskon}/{total}', [PembelianDetailController::class, 'loadForm'])->name('pembelian_detail.load_form');
        Route::resource('/pembelian_detail', PembelianDetailController::class)
            ->except('create', 'show', 'edit');

        Route::get('/penjualan/data', [PenjualanController::class, 'data'])->name('penjualan.data');
        Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
        Route::get('/penjualan/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
        Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
    });

    Route::group(['middleware' => 'level:1,2'], function () {
        Route::get('/transaksi/baru', [PenjualanController::class, 'create'])->name('transaksi.baru');
        Route::post('/transaksi/simpan', [PenjualanController::class, 'store'])->name('transaksi.simpan');
        Route::get('/transaksi/selesai', [PenjualanController::class, 'selesai'])->name('transaksi.selesai');
        Route::get('/transaksi/nota-kecil', [PenjualanController::class, 'notaKecil'])->name('transaksi.nota_kecil');
        Route::get('/transaksi/nota-besar', [PenjualanController::class, 'notaBesar'])->name('transaksi.nota_besar');

        Route::get('/transaksi/{id}/data', [PenjualanDetailController::class, 'data'])->name('transaksi.data');
        Route::get('/transaksi/loadform/{diskon}/{total}/{diterima}', [PenjualanDetailController::class, 'loadForm'])->name('transaksi.load_form');
        Route::resource('/transaksi', PenjualanDetailController::class)
            ->except('create', 'show', 'edit');
    });

    Route::group(['middleware' => 'level:1,3'], function () {
        Route::get('/supplier/data', [SupplierController::class, 'data'])->name('supplier.data');
        Route::resource('/supplier', SupplierController::class);

        Route::get('/barang/data', [BarangController::class, 'data'])->name('barang.data');
        Route::post('/barang/delete-selected', [BarangController::class, 'deleteSelected'])->name('barang.delete_selected');
        Route::post('/barang/cetak-barcode', [BarangController::class, 'cetakBarcode'])->name('barang.cetak_barcode');
        Route::resource('/barang', BarangController::class);

        Route::get('/kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
        Route::resource('/kategori', KategoriController::class);
    });

    Route::group(['middleware' => 'level:1'], function () {
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/laporan/data/{awal}/{akhir}', [LaporanController::class, 'data'])->name('laporan.data');
        Route::get('/laporan/pdf/{awal}/{akhir}', [LaporanController::class, 'exportPDF'])->name('laporan.export_pdf');

        Route::get('/user/data', [UserController::class, 'data'])->name('user.data');
        Route::resource('/user', UserController::class);

        Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
        Route::get('/setting/first', [SettingController::class, 'show'])->name('setting.show');
        Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');
    });
 
    Route::group(['middleware' => 'level:1,2,3'], function () {
        Route::get('/profil', [UserController::class, 'profil'])->name('user.profil');
        Route::post('/profil', [UserController::class, 'updateProfil'])->name('user.update_profil');
    });
});