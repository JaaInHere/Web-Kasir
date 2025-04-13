<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Barang') }}
        </h2>
    </x-slot>
    <x-partial.header />

    <section class="pl-72 px-10 pt-10 pb-10">
    <div class="justify-self-start">
        <a href="{{ route('itemData') }}"
            class="bg-gradient-to-tl from-purple-700 to-pink-500 text-white rounded-md p-2 px-4 inline-block text-sm transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg">
            Kembali
        </a>
    </div>
    <br>
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Sukses!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Oops!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif
    
    <form class="max-w-xl pt-5" action="{{ route('addProduk') }}" method="POST">
        @csrf
        <div class="pb-3">
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Nama Produk</label>
            <input type="text" id="namaProduk" name="namaProduk" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="pb-3">
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Harga Produk</label>
            <input type="number" min="0" id="harga" name="harga" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="pb-3">
            <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900">Stok Produk</label>
            <input type="number" min="0" id="stok" name="stok" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="justify-self-end">
        <button type="submit" class="bg-gradient-to-tl from-purple-700 to-pink-500 text-white rounded-md p-2 px-4 inline-block text-sm transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg">Masukan</button>
        </div>
    </form>

    </section>

</x-app-layout>
<x-partial.script />