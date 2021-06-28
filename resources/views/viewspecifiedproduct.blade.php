<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <a class="underline text-sm ml-3 text-gray-600 hover:text-gray-900"
            href="{{ route('viewproductlist.index') }}">
            {{ __('Kembali') }}
        </a>

        <form method="POST" action="#" enctype="multipart/form-data">
            @csrf
            <x-label class="text-3xl text-center mb-3 font-bold " for="email" :value="__('Detail Produk')" />
            <img class="w-full" class="lazy" src="{{ URL::asset('/images/' . $editproduct->gambar_product1) }}"
                alt="Gambar1">
            <img class="w-full" class="lazy" src="{{ URL::asset('/images/' . $editproduct->gambar_product2) }}"
                alt="Gambar2">
            <img class="w-full" class="lazy" src="{{ URL::asset('/images/' . $editproduct->gambar_product3) }}"
                alt="Gambar3">

            <!-- Nama Product -->
            <div>
                <x-label for="email" class="mt-2 text-2xl font-normal" :value="__('Nama Product')" />
                <div class="mb-2 mt-2 text-gray-500"> {{ $editproduct->nama_product }}</div>

            </div>

            <!-- Deskripsi Product -->
            <div>
                <x-label class="text-2xl font-normal" for="email" :value="__('Deskripsi Product')" />
                <div class="mb-2 mt-2 text-gray-500"> {{ $editproduct->deskripsi_product }}</div>

            </div>

            <!-- Jumlah Product-->
            <div>
                <x-label class="text-2xl font-normal" for="email" :value="__('Jumlah Product')" />
                <div class="mb-2 mt-2 text-gray-500"> {{ $editproduct->jumlah_product }}</div>
            </div>

            <!-- Harga Product-->
            <div>
                <x-label class="text-2xl font-normal" for="email" :value="__('Harga Product')" />
                <div class="mb-2 mt-2 text-gray-500"> {{ $editproduct->harga_product }}</div>
            </div>

            <a href="{{ url('listbuy/' . $editproduct->id . '/edit') }}"
                class="inline-flex items-center font-medium h-8 px-4 mr-3 text-sm text-green-900 transition-colors duration-150 bg-green-300 rounded focus:shadow-outline hover:bg-green-400">
                Tambah Ke Keranjang</a>

        </form>
    </x-auth-card>
</x-guest-layout>
