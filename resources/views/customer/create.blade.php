<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer | Create</title>
</head>
<body>
    <h1>Tambah Data User</h1>

<form method="POST" action="{{ route('customer.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="name">Nama</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="ttl">TTL</label>
        <input type="date" name="ttl" id="ttl" required>
    </div>

    <div>
        <label for="gender">Jenis Kelamin</label>
        <select name="gender" id="gender" required>
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
        </select>
    </div>

    <div>
        <label for="address">Alamat</label>
        <textarea name="address" id="address" required></textarea>
    </div>

    <div>
        <label for="ktp_photo">Foto KTP</label>
        <input type="file" name="ktp_photo" id="ktp_photo" required>
    </div>

    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>

    <input type="hidden" name="role" id="role" value="customer">
    {{-- <div>
        <label for="role">Role</label>
        <select name="role" id="role" required>
            <option value="customer">Customer</option>
            <option value="staff">Staff</option>
            <option value="admin">Admin</option>
        </select>
    </div> --}}

    <button type="submit">Simpan</button>
</form>

</body>
</html>