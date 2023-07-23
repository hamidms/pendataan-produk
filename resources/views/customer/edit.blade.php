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
        <div class="my-5"><h1>Edit User</h1>
    </div>
    <form method="POST" action="{{ route('customer.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label" for="name">Nama</label>
            <input class="form-control" type="text" name="name" id="name" required value="{{ $user->name }}">
        </div>
    
        <div class="mb-3">
            <label class="form-label" for="ttl">TTL</label>
            <input class="form-control" type="date" name="ttl" id="ttl" required value="{{ $user->ttl }}">
        </div>
    
        <div class="mb-3">
            <label class="form-label" for="gender">Jenis Kelamin</label>
            <select class="form-control" name="gender" id="gender" required >
                {{-- {{ $isAdmin ? 'Welcome, Admin!' : 'Welcome, Guest!' }} --}}
                <option {{ $user->gender === 'Pria' ? 'selected' : '' }} value="Pria">Pria</option>
                <option {{ $user->gender === 'Wanita' ? 'selected' : '' }} value="Wanita">Wanita</option>
            </select>
        </div>
    
        <div class="mb-3">
            <label class="form-label" for="address">Alamat</label>
            <textarea class="form-control" name="address" id="address" required>{{ $user->address }}</textarea>
        </div>
    
        <div class="mb-3">
            <label class="form-label" for="ktp_photo">Foto KTP</label>
            <input class="form-control" type="file" name="ktp_photo" id="ktp_photo" value="{{ $user->ktp_photo }}">
        </div>
    
        <input class="form-control" type="hidden" name="role" id="role" value="customer">
    
        <div>
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>

    @if ($errors->any())
    <div class="mt-3 alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
{{-- 
<form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}" required>
    </div>
    <div>
        <button type="submit">Simpan Perubahan</button>
    </div>
</form>

<form method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
    @csrf
    @method('DELETE')
    <button type="submit">Hapus User</button>
</form> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
