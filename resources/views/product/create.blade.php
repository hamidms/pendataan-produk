<h1>Tambah Data Barang</h1>

<form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Nama Barang</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="desc">Deskripsi</label>
        <textarea name="desc" id="desc" required></textarea>
    </div>

    <div>
        <label for="type">Jenis Barang</label>
        <input type="text" name="type" id="type" required>
    </div>

    <div>
        <label for="stock">Stock Barang</label>
        <input type="number" name="stock" id="stock" required>
    </div>

    <div>
        <label for="buy_price">Harga Beli</label>
        <input type="number" name="buy_price" id="buy_price" step="0.01" required>
    </div>

    <div>
        <label for="sell_price">Harga Jual</label>
        <input type="number" name="sell_price" id="sell_price" step="0.01" required>
    </div>

    <div>
        <label for="photo">Gambar Barang</label>
        <input type="file" name="photo" id="photo">
    </div>

    <button type="submit">Simpan</button>
</form>
