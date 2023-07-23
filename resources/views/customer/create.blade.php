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
        <div class="my-3">
        <h1>Tambah Data User</h1>
        </div>

        <form method="POST" action="{{ route('customer.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Nama</label>
                <input class="form-control" type="text" name="name" id="name" required>
            </div>
        
            <div class="mb-3">
                <label class="form-label" for="ttl">TTL</label>
                <input class="form-control" type="date" name="ttl" id="ttl" required>
            </div>
        
            <div class="mb-3">
                <label class="form-label" for="gender">Jenis Kelamin</label>
                <select class="form-control" name="gender" id="gender" required>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>
        
            <div class="mb-3">
                <label class="form-label" for="address">Alamat</label>
                <textarea class="form-control" name="address" id="address" required></textarea>
            </div>
        
            <div class="mb-3">
                <label class="form-label" for="ktp_photo">Foto KTP</label>
                <input class="form-control" type="file" name="ktp_photo" id="ktp_photo" required>
            </div>
        
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" type="text" name="username" id="username" required>
            </div>
        
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>
        
            <input class="form-control" type="hidden" name="role" id="role" value="customer">
            {{-- <div>
                <label class="form-label" for="role">Role</label>
                <select name="role" id="role" required>
                    <option value="customer">Customer</option>
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                </select>
            </div> --}}
        
            <div>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
