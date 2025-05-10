@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Edit Data Obat</h2>

        <form action="{{ route('obat.update', $obat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700">Nama Obat</label>
                <input type="text" name="nama" value="{{ old('nama', $obat->nama) }}" class="w-full border border-gray-300 rounded px-4 py-2 mt-1" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Jenis</label>
                <input type="text" name="jenis" value="{{ old('jenis', $obat->jenis) }}" class="w-full border border-gray-300 rounded px-4 py-2 mt-1" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Stok</label>
                <input type="number" name="stok" value="{{ old('stok', $obat->stok) }}" class="w-full border border-gray-300 rounded px-4 py-2 mt-1" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Harga</label>
                <input type="number" name="harga" value="{{ old('harga', $obat->harga) }}" class="w-full border border-gray-300 rounded px-4 py-2 mt-1" required>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('obat.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Batal</a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
