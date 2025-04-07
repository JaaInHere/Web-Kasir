<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Barang') }}
        </h2>
    </x-slot>
    <x-partial.header />

      <!-- table -->
      <section class="pl-72 px-10 pt-10">
        
        <div class="grid grid-cols-2 pb-5">
            <div class="justify-self-start">
                <a href="{{ route('addItem') }}"
                    class="bg-gradient-to-tl from-purple-700 to-pink-500 text-white rounded-md p-2 px-4 inline-block text-sm transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg">
                    Tambah Produk
                </a>
            </div>

            <div class="justify-self-end">
                <a href="#"
                    class="bg-gradient-to-tl from-purple-700 to-pink-500 text-white rounded-md p-2 px-4 inline-block text-sm transition-all duration-300 ease-in-out hover:scale-105 hover:shadow-lg">
                    Jual Produk
                </a>
            </div>
        </div>

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
                        <td class="flex gap-2 px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <a href="{{ route('editItem',  ['id' => $produk->produkID]) }}"
                               class="bg-green-400 p-1 rounded-md text-white hover:bg-green-600 text-center inline-block">
                                Ubah
                            </a>
                            <form action="{{ route('delete', $produk->produkID) }}" method="POST" 
                                  onsubmit="return confirm('Yakin Mau hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-400 p-1 rounded-md text-white hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
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
