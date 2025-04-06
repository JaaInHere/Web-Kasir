<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Barang') }}
        </h2>
    </x-slot>
    <x-partial.header />
      <!-- table -->
      <section class="pl-72 px-10 pt-10">
        <table class="min-w-full border border-gray-400 rounded-lg shadow-md overflow-hidden">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">ID produk</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Nama Produk</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Harga</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Stok</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase tracking-wider">Aksi</th>

                </tr>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ( $produks as $produk )
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $produk->produkID }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $produk->namaProduk }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $produk->harga }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $produk->stok }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <button class="bg-blue-400 p-1 rounded-md text-white hover:bg-blue-600">
                                <a href="#">Tambah</a>
                            </button>
                            <button class="bg-green-400 p-1 rounded-md text-white hover:bg-green-600">
                                <a href="{{-- {{ route('edit', ['id' => $produk->produkID]) }} --}}#">Ubah</a>
                            </button>
                            <button class="bg-red-400 p-1 rounded-md text-white hover:bg-red-600" onclick="Destroy({{ $produk->produkID }})">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </thead>
        </table> 
    </section>
      <!-- end table -->
</x-app-layout>
<x-partial.script />
