<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Obat
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        <a href="{{ route('obat.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Obat</a>

        @if (session('success'))
            <div class="mt-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full mt-4 border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Jenis</th>
                    <th class="border px-4 py-2">Stok</th>
                    <th class="border px-4 py-2">Harga</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obats as $obat)
                    <tr>
                        <td class="border px-4 py-2">{{ $obat->nama }}</td>
                        <td class="border px-4 py-2">{{ $obat->jenis }}</td>
                        <td class="border px-4 py-2">{{ $obat->stok }}</td>
                        <td class="border px-4 py-2">Rp {{ number_format($obat->harga, 0) }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('obat.edit', $obat->id) }}" class="text-blue-500">Edit</a>
                            |
                            <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
