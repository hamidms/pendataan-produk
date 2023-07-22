<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer | All</title>
</head>
<body>
    <h1>Data User</h1>

<a href="{{ route('customer.create') }}">Tambah Data</a>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>TTL</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Foto KTP</th>
            <th>Username</th>
            <th>Role</th>
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
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>