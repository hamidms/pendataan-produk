<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendataan | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="/product">
            <img src="/img/Pendataan_gr.png" alt="Pendataan" width="100">
            </a>
            <form class="d-flex" action="{{ route('logout.submit') }}" method="POST">
                <div class="btn">
                    {{ Auth::user()->name }}
                </div>
                @csrf
                <button class="btn btn-outline-success" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <div class="my-5">
            <h1>Edit Data Barang</h1>
        </div>

<form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label" for="name">Nama Barang</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="desc">Deskripsi</label>
        <textarea class="form-control" name="desc" id="desc" required>{{ $product->desc }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label" for="type">Jenis Barang</label>
        <input class="form-control" type="text" name="type" id="type" value="{{ $product->type }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="stock">Stock Barang</label>
        <input class="form-control" type="number" name="stock" id="stock" value="{{ $product->stock }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="buy_price">Harga Beli</label>
        <input class="form-control" type="number" name="buy_price" id="buy_price" step="0.01" value="{{ $product->buy_price }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="sell_price">Harga Jual</label>
        <input class="form-control" type="number" name="sell_price" id="sell_price" step="0.01" value="{{ $product->sell_price }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="photo">Gambar Barang</label>
        <input class="form-control" type="file" name="photo" id="photo">
    </div>

    <div class="mb-3">
        <button class="btn btn-outline-primary" type="submit">Update</button>
        <a href="/product/stock" class="btn btn-outline-secondary">Kembali</a>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
