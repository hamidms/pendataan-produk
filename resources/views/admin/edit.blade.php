<h1>Edit User</h1>

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
</form>
