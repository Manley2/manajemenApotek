@extends('layouts.guest')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-100 to-white">
    <div class="bg-white p-10 rounded-2xl shadow-lg w-full max-w-md text-center">
        <h1 class="text-3xl font-bold text-blue-600 mb-3">Manajemen Apotek</h1>
        <p class="text-gray-600 text-sm mb-6">
            Selamat datang di sistem informasi apotek modern yang memudahkan pengelolaan data obat secara efisien.
        </p>

        <div class="space-y-4">
            <a href="{{ route('login') }}"
               class="block w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                Masuk
            </a>
            <a href="{{ route('register') }}"
               class="block w-full bg-gray-200 text-gray-800 py-2 rounded-lg font-semibold hover:bg-gray-300 transition">
                Daftar
            </a>
        </div>

        <p class="text-xs text-gray-400 mt-8">© 2025 Sistem Sederhana Manajemen Apotek</p>
    </div>
</div>
@endsection
