<h1>Halaman Penjualan</h1>

<h2>Informasi Pengguna:</h2>
<p>Nama Pengguna: {{ auth()->user()->name }}</p>

<h2>Isi Keranjang:</h2>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
            <tr>
                <td>
                    @if ($cart->product)
                        {{ $cart->product->name }}
                    @else
                        Produk Tidak Ditemukan
                    @endif
                </td>
                <td>{{ $cart->quantity }}</td>
                <td>{{ $cart->product ? $cart->product->sell_price : '0' }}</td>
                <td>{{ $cart->product ? $cart->product->sell_price * $cart->quantity : '0' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

<h2>Daftar Produk:</h2>
@if ($products->isEmpty())
    <p>Tidak ada produk yang tersedia.</p>
@else
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - Harga: {{ $product->sell_price }}</li>
        @endforeach
    </ul>
@endif
