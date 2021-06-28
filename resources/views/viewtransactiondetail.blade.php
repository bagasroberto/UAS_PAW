<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <a class="underline text-sm ml-3 text-gray-600 hover:text-gray-900"
            href="{{ route('viewtransaction.index') }}">
            {{ __('Kembali') }}
        </a>

        <form method="POST" action="{{ url('viewtransaction/' . $product->id) }}" enctype="multipart/form-data">
            @csrf

            <x-label class="text-3xl text-center mb-3" for="email" :value="__('Konfirmasi Pesanan')" />
            <input type="hidden" name="_method" value="patch">
            <x-label class="text-2xl text-left mb-3" for="email" :value="__('Informasi Pembeli')" />
            <!-- Nama Pembeli -->
            <div>
                <x-label for="email" :value="__('Nama Pembeli')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 bg-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="nama" value="{{ $product->name }}" readonly />
            </div>

            <!-- Nama Product -->
            <div>
                <x-label class="mt-3" for="email" :value="__('Nama Product Yang Dibeli')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 bg-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="nama" value="{{ $product->nama_product }}" readonly />
            </div>

            <!-- Jumlah Barang Yang Dibeli-->
            <div>
                <x-label class="mt-3" for="email" :value="__('Jumlah yang dibeli')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 bg-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="jumlah" value="{{ $product->jumlah_pembelian }}" readonly />
            </div>

            <!-- Jumlah Pembayaran-->
            <div>
                <x-label class="mt-3" for="email" :value="__('Total Pembayaran')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 bg-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="jumlah" value="{{ $product->total_harga }}" readonly />
            </div>

            <x-label class="text-2xl text-left mb-1 mt-3" for="email" :value="__('Informasi Barang')" />

            <!-- Jumlah Barang Product-->
            <div>
                <x-label class="mt-3" for="email" :value="__('Jumlah Barang di Gudang')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 bg-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="jumlah" value="{{ $product->jumlah_product }}" readonly />
            </div>

            <!-- Harga Product-->
            <div>
                <x-label class="mt-3" for="email" :value="__('Harga Product')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 bg-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="harga" value="{{ $product->harga_product }}" readonly />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Konfirmasi Pesanan') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
