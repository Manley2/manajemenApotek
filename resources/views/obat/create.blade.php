@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Tambah Obat Baru</h2>

        <form action="{{ route('obat.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700">Nama Obat</label>
                <input type="text" name="nama" class="w-full border border-gray-300 rounded px-4 py-2 mt-1" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Jenis</label>
                <input type="text" name="jenis" class="w-full border border-gray-300 rounded px-4 py-2 mt-1" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Stok</label>
                <input type="number" name="stok" class="w-full border border-gray-300 rounded px-4 py-2 mt-1" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Harga</label>
                <input type="number" name="harga" class="w-full border border-gray-300 rounded px-4 py-2 mt-1" required>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('obat.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Kembali</a>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
