<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Obat
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <form action="{{ route('obat.update', $obat->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block">Nama</label>
                <input type="text" name="nama" value="{{ $obat->nama }}" class="w-full border px-2 py-1" required>
            </div>

            <div>
                <label class="block">Jenis</label>
                <input type="text" name="jenis" value="{{ $obat->jenis }}" class="w-full border px-2 py-1" required>
            </div>

            <div>
                <label class="block">Stok</label>
                <input type="number" name="stok" value="{{ $obat->stok }}" class="w-full border px-2 py-1" required>
            </div>

            <div>
                <label class="block">Harga</label>
                <input type="number" step="0.01" name="harga" value="{{ $obat->harga }}" class="w-full border px-2 py-1" required>
            </div>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                <a href="{{ route('obat.index') }}" class="ml-2 text-gray-600">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
