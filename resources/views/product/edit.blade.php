<h1>Edit Data Barang</h1>

<form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Nama Barang</label>
        <input type="text" name="name" id="name" value="{{ $product->name }}" required>
    </div>

    <div>
        <label for="desc">Deskripsi</label>
        <textarea name="desc" id="desc" required>{{ $product->desc }}</textarea>
    </div>

    <div>
        <label for="type">Jenis Barang</label>
        <input type="text" name="type" id="type" value="{{ $product->type }}" required>
    </div>

    <div>
        <label for="stock">Stock Barang</label>
        <input type="number" name="stock" id="stock" value="{{ $product->stock }}" required>
    </div>

    <div>
        <label for="buy_price">Harga Beli</label>
        <input type="number" name="buy_price" id="buy_price" step="0.01" value="{{ $product->buy_price }}" required>
    </div>

    <div>
        <label for="sell_price">Harga Jual</label>
        <input type="number" name="sell_price" id="sell_price" step="0.01" value="{{ $product->sell_price }}" required>
    </div>

    <div>
        <label for="photo">Gambar Barang</label>
        @if ($product->photo)
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Photo" width="100">
                @else
                    N/A
                @endif
        <input type="file" name="photo" id="photo">
    </div>

    <button type="submit">Update</button>
</form>