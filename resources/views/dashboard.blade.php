@extends('layouts.app')

@section('content')
{{-- <div class="max-w-6xl mx-auto px-6">
    <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-6 shadow">
        <h2 class="text-lg font-semibold">Dashboard Manajemen Obat Apotek</h2> --}}
    </div>

    <div class="flex justify-end mb-4">
        <a href="{{ route('obat.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow">
            + Tambah Obat
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full table-auto text-left border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border-b">No</th>
                    <th class="px-4 py-2 border-b">Nama</th>
                    <th class="px-4 py-2 border-b">Jenis</th>
                    <th class="px-4 py-2 border-b">Stok</th>
                    <th class="px-4 py-2 border-b">Harga</th>
                    <th class="px-4 py-2 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($obats as $index => $obat)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border-b">{{ $obat->nama }}</td>
                    <td class="px-4 py-2 border-b">{{ $obat->jenis }}</td>
                    <td class="px-4 py-2 border-b">{{ $obat->stok }}</td>
                    <td class="px-4 py-2 border-b">Rp{{ number_format($obat->harga, 0, ',', '.') }}</td>
                    <td class="px-4 py-2 border-b space-x-2">
                        <a href="{{ route('obat.edit', $obat->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center px-4 py-3 text-gray-500">Belum ada data obat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
