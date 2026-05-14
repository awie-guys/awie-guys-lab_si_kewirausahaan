<h2>Data Restock</h2>
<a href="/mtsn8/restock/create">Tambah Restock</a>
<br><br>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Tanggal</th>
        <th>ID Barang</th>
        <th>Qty</th>
        <th>Total Nilai</th>
    </tr>

    <?php foreach ($data['restock'] as $r) : ?>
    <tr>
        <td><?= $r['id']; ?></td>
        <td><?= $r['tanggal']; ?></td>
        <td><?= $r['id_barang']; ?></td>
        <td><?= $r['qty']; ?></td>
        <td><?= $r['total_nilai']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>