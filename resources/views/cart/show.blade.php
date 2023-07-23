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
            <h1>Keranjang</h1>
        </div>

@if ($carts->isEmpty())
    <p>Keranjang kosong.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($carts as $cart)
                {{ $cart }}
            @endforeach --}}
            @foreach ($carts as $cart)
            <tr>
                <td>
                    @if ($cart)
                        {{ $cart->name }}
                    @else
                        Produk Tidak Ditemukan
                    @endif
                </td>
                <td>
                    <form method="POST" action="{{ route('cart.update', $cart->id) }}">
                        @csrf
                        @method('PUT')
                        <input type="number" name="quantity" value="{{ $cart->pivot->quantity }}" min="1">
                        <button type="submit">Ubah</button>
                    </form>
                </td>
                <td>{{ $cart ? $cart->sell_price : 'Produk Tidak Ditemukan' }}</td>
                <td>{{ $cart ? $cart->sell_price * $cart->pivot->quantity : '0' }}</td>
                <td>
                    <form method="POST" action="{{ route('cart.remove', $cart->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>