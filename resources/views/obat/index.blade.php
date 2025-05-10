<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Apotek - Data Obat') }}
        </h2>
    </x-slot>

    <div class="py-8 px-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold">Daftar Obat</h3>
            <a href="{{ route('obat.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                + Tambah Obat
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full table-auto border border-gray-200">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">#</th>
                        <th class="px-4 py-2 text-left">Nama Obat</th>
                        <th class="px-4 py-2 text-left">Jenis</th>
                        <th class="px-4 py-2 text-left">Stok</th>
                        <th class="px-4 py-2 text-left">Harga</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($obats as $index => $obat)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $obat->nama }}</td>
                            <td class="px-4 py-2">{{ $obat->jenis }}</td>
                            <td class="px-4 py-2">{{ $obat->stok }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('obat.edit', $obat->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Edit</a>
                                <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus obat ini?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($obats->isEmpty())
                        <tr><td colspan="6" class="text-center py-4 text-gray-500">Belum ada data obat.</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
