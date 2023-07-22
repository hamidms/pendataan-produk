<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product | All</title>
</head>
<body>
    <h1>Data Barang</h1>

<a href="{{ route('product.create') }}">Tambah Data</a>

<table>
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Deskripsi</th>
            <th>Jenis Barang</th>
            <th>Stock Barang</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Gambar Barang</th>
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
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>