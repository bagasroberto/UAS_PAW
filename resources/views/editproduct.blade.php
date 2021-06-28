<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <a class="underline text-sm ml-3 text-gray-600 hover:text-gray-900" href="{{ route('productlistme.index') }}">
            {{ __('Kembali') }}
        </a>

        <form method="POST" action="{{ url('productlistme/' . $editproduct->id) }}" enctype="multipart/form-data">
            @csrf



            <x-label class="text-3xl text-center mb-3" for="email" :value="__('Edit Product')" />
            <input type="hidden" name="_method" value="patch">
            <!-- Nama Product -->
            <div>
                <x-label for="email" :value="__('Nama Product')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="nama" value="{{ $editproduct->nama_product }}" />
            </div>

            <!-- Deskripsi Product -->
            <div>
                <x-label class="mt-3" for="email" :value="__('Deskripsi Product')" />

                <textarea
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="deskripsi" value=""></textarea>
            </div>

            <!-- Jumlah Product-->
            <div>
                <x-label class="mt-3" for="email" :value="__('Jumlah Product')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="jumlah" value="{{ $editproduct->jumlah_product }}" />
            </div>

            <!-- Harga Product-->
            <div>
                <x-label class="mt-3" for="email" :value="__('Harga Product')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="harga" value="{{ $editproduct->harga_product }}" />
            </div>

            <!-- Upload Gambar Product 1-->
            <div>
                <x-label class="mt-3" for="email" :value="__('Upload Gambar Product 1')" />

                <x-input class="block mt-1 w-full" type="file" name="gambar1" />
            </div>

            <!-- Upload Gambar Product 2-->
            <div>
                <x-label class="mt-3" for="email" :value="__('Upload Gambar Product 2')" />

                <x-input class="block mt-1 w-full" type="file" name="gambar2" />
            </div>

            <!-- Upload Gambar Product 3-->
            <div>
                <x-label class="mt-3" for="email" :value="__('Upload Gambar Product 3')" />

                <x-input class="block mt-1 w-full" type="file" name="gambar3" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3">
                    {{ __('Simpan Data') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
