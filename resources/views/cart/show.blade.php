<h1>Keranjang</h1>

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
