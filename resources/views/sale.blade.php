<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jual Produk') }}
        </h2>
    </x-slot>
    <x-partial.header />

    <section class="pl-72 px-10 pt-10 pb-10">
        @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Oops!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
        @endif

        <br>
        <form method="POST" action="{{ route('penjualan.store') }}">
            @csrf
            <div class="space-y-4" id="product-list">
                <div class="grid grid-cols-6 gap-4 items-center">
                    <select name="produkID[]" class="col-span-2 p-2 border rounded">
                        <option value="">Pilih Produk</option>
                        @foreach ($produks as $produk)
                            <option value="{{ $produk->produkID }}" data-price="{{ $produk->harga }}" data-stok="{{ $produk->stok }}">
                                {{ $produk->namaProduk }} (stok: {{ $produk->stok }})
                            </option>
                        @endforeach
                    </select>
    
                    <input type="number" name="jumlahProduk[]" class="p-2 border rounded jumlah-input" placeholder="Jumlah" min="1" />
    
                    <input type="text" name="hargaSatuan[]" class="p-2 border rounded bg-gray-100 harga-satuan" placeholder="Harga Satuan" readonly />
    
                    <input type="text" name="subtotal[]" class="p-2 border rounded bg-gray-100 subtotal" placeholder="Total" readonly />
    
                    <button type="button" class="text-red-500 font-bold remove-product">✖</button>
                </div>
            </div>
    
            <div class="mt-4">
                <button type="button" id="add-product" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Produk</button>
            </div>
    
            <div class="mt-6 flex justify-between items-center">
                <div class="text-lg font-semibold">Total Keseluruhan:</div>
                <div id="grand-total" class="text-xl font-bold">Rp 0</div>
            </div>
    
            <div class="mt-6">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded">Simpan Penjualan</button>
            </div>
        </form>
    </section>
    </x-app-layout>
<x-partial.script />

