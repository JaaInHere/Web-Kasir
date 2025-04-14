<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-partial.header />
    <section class="pl-72 px-10 pt-10">
        <div class="w-full px-6 py-6 mx-auto">
            
            <div class="flex flex-wrap justify-between mb-6">

                <div class="group w-1/2 lg:w-1/4 mb-4 lg:mb-0 transition duration-300 hover:scale-105 hover:shadow-lg rounded-2xl">
                    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-sans text-sm font-semibold leading-normal">Pendapatan Hari Ini</p>
                                        <h5 class="mb-0 font-bold">
                                            Rp {{ number_format($PendapatanSekarang, 0, ',', '.') }}
                                        </h5>
                                      
                                        <p class="text-sm mt-2 
                                            @if($persentaseKenaikan > 0) text-green-500 
                                            @elseif($persentaseKenaikan < 0) text-red-500 
                                            @else text-gray-500 @endif">
                                            @if($persentaseKenaikan > 0) 
                                                +{{ number_format($persentaseKenaikan, 2) }}% (Naik)
                                            @elseif($persentaseKenaikan < 0) 
                                                {{ number_format($persentaseKenaikan, 2) }}% (Turun)
                                            @else
                                                Tidak ada perubahan
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500 transition duration-300 group-hover:rotate-12">
                                        <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white transition duration-300 group-hover:rotate-12"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
             
                <div class="group w-1/2 lg:w-1/4 mb-4 lg:mb-0 transition duration-300 hover:scale-105 hover:shadow-lg rounded-2xl">
                    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-sans text-sm font-semibold leading-normal">Pendapatan Kemarin</p>
                                        <h5 class="mb-0 font-bold">
                                            Rp {{ number_format($pendapatanKemarin, 0, ',', '.') }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500 transition duration-300 group-hover:rotate-12">
                                        <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white transform transition duration-300 group-hover:rotate-12"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
         
            <div class="flex flex-wrap justify-between">
        
                <div class="group w-1/2 lg:w-1/4 mb-4 lg:mb-0 transition duration-300 hover:scale-105 hover:shadow-lg rounded-2xl">
                    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-sans text-sm font-semibold leading-normal">Total Penjualan</p>
                                        <h5 class="mb-0 font-bold">
                                            {{$jumlahPenjualan}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500 transition duration-300 group-hover:rotate-12">
                                        <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white transform transition duration-300 group-hover:rotate-12"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
    
               
                <div class="group w-1/2 lg:w-1/4 mb-4 lg:mb-0 transition duration-300 hover:scale-105 hover:shadow-lg rounded-2xl">
                    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex-auto p-4">
                            <div class="flex flex-row -mx-3">
                                <div class="flex-none w-2/3 max-w-full px-3">
                                    <div>
                                        <p class="mb-0 font-sans text-sm font-semibold leading-normal">Jumlah Produk</p>
                                        <h5 class="mb-0 font-bold">
                                            {{$jumlahProduk}}
                                        </h5>
                                    </div>
                                </div>
                                <div class="px-3 text-right basis-1/3">
                                    <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-700 to-pink-500 transition duration-300 group-hover:rotate-12">
                                        <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white transform transition duration-300 group-hover:rotate-12"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    

        <section class="pl-72 px-10 pt-10 pb-10">
        <table class="min-w-full border border-gray-400 rounded-lg shadow-md overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">ID produk</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Nama Produk</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Harga</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Stok</th>
                </tr>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ( $produks as $produk )
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $produk->produkID }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $produk->namaProduk }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $produk->harga }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $produk->stok }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </thead>
        </table> 

        <br><br><br>

        <table class="min-w-full border border-gray-400 rounded-lg shadow-md overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">ID Penjualan</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Tanggal Penjualan</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Total Harga</th>
                </tr>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ( $penjualans as $penjualan )
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $penjualan->penjualanID }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $penjualan->tanggalPenjualan }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $penjualan->totalHarga }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </thead>
        </table> 
    </section>
</x-app-layout>
<x-partial.script />
