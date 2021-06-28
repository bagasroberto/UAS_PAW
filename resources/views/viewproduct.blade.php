<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tampilkan Produk') }}
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="p-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-6 gap-5">

            <?php $no = 1; ?>
            @foreach ($product as $pd)
                <div class="bg-white rounded overflow-hidden shadow-lg">
                    <img class="w-full" class="lazy" src="{{ URL::asset('/images/' . $pd->gambar_product3) }}"
                        alt="Gambar1">
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $pd->nama_product }}
                        </div>
                        <div class="mb-2">
                            @if ($pd->jumlah_product > 0)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Tersedia</span>
                            @elseif ($pd->jumlah_product == 0)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Habis</span>
                            @endif
                        </div>
                        <p class="text-gray-500 text-base">
                            {{ 'Harga Barang : Rp.' . $pd->harga_product }}
                        </p>

                        <br>
                        <hr>
                        <br>

                        <div class="flex items-center justify-between">
                            <a href="{{ url('viewproductlist/' . $pd->id . '/edit') }}"
                                class="inline-flex items-center font-medium h-8 px-4 mr-3 text-sm text-gray-900 transition-colors duration-150 bg-gray-300 rounded focus:shadow-outline hover:bg-gray-400">
                                Lihat Produk</a>

                            <a href="{{ url('listbuy/' . $pd->id . '/edit') }}"
                                class="inline-flex items-center font-medium h-8 px-4 mr-3 text-sm text-green-900 transition-colors duration-150 bg-green-300 rounded focus:shadow-outline hover:bg-green-400">
                                List</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</x-app-layout>
