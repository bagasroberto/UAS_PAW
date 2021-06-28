<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <a class="underline text-sm ml-3 text-gray-600 hover:text-gray-900" href="{{ route('productlist.index') }}">
            {{ __('Kembali') }}
        </a>

        <form method="POST" action="{{ url('uploadbukti/' . $product->id) }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="patch">
            <x-label class="text-3xl text-center mb-3" for="email" :value="__('Upload Gambar')" />

            <!-- Nama Product -->
            <div>
                <x-label for="email" :value="__('Nama Product')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 bg-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="nama" value="{{ $product->nama_product }}" readonly />
            </div>

            <!-- Jumlah Pembelian-->
            <div>
                <x-label class="mt-3" for="email" :value="__('Jumlah Pembelian')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 bg-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="jumlah" value="{{ $product->jumlah_pembelian }}" readonly />
            </div>

            <!-- Total Harga-->
            <div>
                <x-label class="mt-3" for="email" :value="__('Harga Product')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 bg-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="harga" value="{{ $product->total_harga }}" readonly />
            </div>

            <!-- Alamat Pembeli-->
            <div>
                <x-label class="mt-3" for="email" :value="__('Alamat Pembelian')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="alamat" :value="old('alamat')" />
            </div>

            <!-- Upload Bukti Pembayaran-->
            <div>
                <x-label class=" mt-3" for="email" :value="__('Upload Gambar Bukti Pembayaran')" />

                <x-input class="block mt-1 w-full" type="file" name="gambar" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3">
                    {{ __('Upload Bukti Pembayaran') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
