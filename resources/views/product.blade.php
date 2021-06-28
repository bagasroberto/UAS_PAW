<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Product') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class=" max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('productlistme.create') }}"
                        class="inline-flex items-center font-medium h-8 px-4 mr-3 text-sm text-black transition-colors duration-150 bg-green-300 rounded focus:shadow-outline hover:bg-green-400">Tambah
                        Product</a>
                </div>
            </div>


            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama Produk
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Deskripsi Produk
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Jumlah
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status Stock
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Harga
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $no = 1; ?>
                    @foreach ($product as $pd)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm text-gray-500">{{ $no++ }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm text-gray-500">{{ $pd->nama_product }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm text-gray-500">{{ $pd->deskripsi_product }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm text-gray-500">{{ $pd->jumlah_product }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                @if ($pd->jumlah_product > 0)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Tersedia</span>
                                @elseif ($pd->jumlah_product == 0)
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Habis</span>
                                @endif

                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm text-gray-500">{{ 'Rp.' . $pd->harga_product }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="flex items-center justify-between">
                                    <a href="{{ url('productlistme/' . $pd->id . '/edit') }}"
                                        class="text-indigo-600 font-medium hover: text-indigo-900 mr-5">Edit</a>
                                    <form action="{{ url('productlistme/' . $pd->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="submmit"
                                            class="flex-auto items-center h-8 px-4 text-sm text-white font-medium transition-colors duration-150 bg-red-500 rounded focus:shadow-outline hover:bg-red-600">{{ __('Hapus') }}</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</x-app-layout>
