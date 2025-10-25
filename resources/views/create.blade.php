<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Obat
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <form action="{{ route('obat.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block">Nama</label>
                <input type="text" name="nama" class="w-full border px-2 py-1" required>
            </div>

            <div>
                <label class="block">Jenis</label>
                <input type="text" name="jenis" class="w-full border px-2 py-1" required>
            </div>

            <div>
                <label class="block">Stok</label>
                <input type="number" name="stok" class="w-full border px-2 py-1" required>
            </div>

            <div>
                <label class="block">Harga</label>
                <input type="number" step="0.01" name="harga" class="w-full border px-2 py-1" required>
            </div>

            <div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('obat.index') }}" class="ml-2 text-gray-600">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
