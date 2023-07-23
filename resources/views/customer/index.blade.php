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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="/product">
            <img src="/img/Pendataan_gr.png" alt="Pendataan" width="100">
            </a>
            @if (Auth::user()->role == 'staff')
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/customer">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/product/stock">Stock</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/sales">Penjualan</a>
                    </li>
                </ul>
              </div>
            
            @elseif ((Auth::user()->role == 'customer'))
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/cart">Keranjang</a>
                    </li>
                </ul>
              </div>
              @elseif ((Auth::user()->role == 'admin'))
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/customer">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/product/stock">Stock</a>
                    </li>
                  </ul>
                </div>
            @endif
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
    <div class="my-3">
        <h1>Data Customer</h1>
    </div>
        <div class="mb-3">
            <a href="{{ route('customer.create') }}" class="btn btn-success">Tambah Data</a>
        </div>
    
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>TTL</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Foto KTP</th>
                <th>Username</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->ttl }}</td>
                <td>{{ $customer->gender }}</td>
                <td>{{ $customer->address }}</td>
                <td>
                    @if ($customer->ktp_photo)
                        <img src="{{ asset('storage/' . $customer->ktp_photo) }}" alt="KTP Photo" width="100">
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $customer->username }}</td>
                <td>{{ $customer->role }}</td>
                <td>
                    <a href="/customer/{{ $customer->id }}/edit" class="btn btn-warning">Edit</a>
                <form method="POST" action="{{ route('customer.destroy', $customer->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="confirmDelete()" class="btn btn-danger">Hapus</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
