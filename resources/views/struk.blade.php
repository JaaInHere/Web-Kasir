<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-partial.header />
    <div class="flex justify-center items-start min-h-screen bg-gray-100 pt-10">
        <section class="px-10 pt-10 bg-white rounded-xl shadow-lg max-w-xl text-sm font-mono text-gray-800">
            <h2 class="text-xl font-semibold border-b pb-2 mb-4">🧾 Struk Penjualan</h2>
            <p class="mb-2">🗓️ Tanggal: {{ $penjualan->tanggalPenjualan }}</p>
            <ul class="mb-4 space-y-1">
                @foreach ($penjualan->detailPenjualans as $item)
                    <li class="flex justify-between">
                        <span>{{ $item->produk->namaProduk }} ({{ $item->jumlahProduk }} x {{ number_format($item->produk->harga, 0, ',', '.') }})</span>
                        <span>Rp {{ number_format($item->subTotalDecimal, 0, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>
            <p class="text-right font-bold text-base border-t pt-2">Total: Rp {{ number_format($penjualan->totalHarga, 0, ',', '.') }}</p>
        </section>
    </div>     
</x-app-layout>
<x-partial.script />