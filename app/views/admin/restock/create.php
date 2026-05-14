<h2>Tambah Restock</h2>

<form action="/mtsn8/restock/store" method="POST">

    <label>Tanggal</label><br>
    <input type="date" name="tanggal"><br><br>

    <label>ID Barang</label><br>
    <input type="number" name="id_barang"><br><br>

    <label>ID Supplier</label><br>
    <input type="number" name="id_supplier"><br><br>

    <label>ID User</label><br>
    <input type="number" name="id_user"><br><br>

    <label>Qty</label><br>
    <input type="number" name="qty"><br><br>

    <label>Harga Beli</label><br>
    <input type="number" name="harga_beli"><br><br>

    <label>Harga Jual Baru</label><br>
    <input type="number" name="harga_jual_baru"><br><br>

    <label>Total Nilai</label><br>
    <input type="number" name="total_nilai"><br><br>

    <label>Catatan</label><br>
    <input type="text" name="catatan"><br><br>

    <button type="submit">Simpan</button>
</form>