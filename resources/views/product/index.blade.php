<h1>Daftar Produk</h1>

@foreach ($products as $product)
    <div>
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->desc }}</p>
        <p>Harga: {{ $product->sell_price }}</p>
        <form method="POST" action="{{ route('cart.add', $product->id) }}">
            @csrf
            <button type="submit">Tambahkan ke Keranjang</button>
        </form>
    </div>
@endforeach
