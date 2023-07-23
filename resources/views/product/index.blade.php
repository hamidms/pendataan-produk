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
            <h1>Daftar Produk</h1>
        </div>

        <div class="row">
            @foreach ($products as $product)
            <div class="col-3">
                <div class="card shadow">
                    <div class="card-body">
                        @if ($product->photo)
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Photo" class="img-fluid">
                        @else
                            N/A
                        @endif
                        <p class="fw-bold">{{ $product->name }}</p>
                        <p>Rp{{ $product->sell_price }} | {{ $product->stock }} pcs</p>
                        <form method="POST" action="{{ route('cart.add', $product->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">Tambahkan ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

