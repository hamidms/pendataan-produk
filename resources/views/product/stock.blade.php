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
            <a class="navbar-brand">
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
            <h1>Data Barang</h1>
        </div>
    
        <div class="mb-3">
            <a href="{{ route('product.create') }}" class="btn btn-success">Tambah Data</a>
        </div>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Deskripsi</th>
            <th>Jenis Barang</th>
            <th>Stock Barang</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Gambar Barang</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->desc }}</td>
            <td>{{ $product->type }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->buy_price }}</td>
            <td>{{ $product->sell_price }}</td>
            <td>
                @if ($product->photo)
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Photo" width="100">
                @else
                    N/A
                @endif
            </td>
            <td>
                <a href="/product/{{ $product->id }}/edit" class="btn btn-warning">Edit</a>
                <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="confirmDelete()" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

      
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data barang ini?');
    }
</script>

</body>
</html>