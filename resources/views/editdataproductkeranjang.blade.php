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

        <form method="POST" action="{{ url('productlist/' . $product->idTrans) }}" enctype="multipart/form-data">
            @csrf

            <x-label class="text-3xl text-center mt-3 mb-3" for="email"
                :value="__('Edit Jumlah Pembelian Keranjang')" />
            <input type="hidden" name="_method" value="patch">

            <!-- Id Product -->
            <div>
                <x-label class="mt-3" for="email" :value="__('Id Product')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 bg-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="id" value="{{ $product->idProduct }}" readonly />
            </div>

            <!-- Nama Product -->
            <div>
                <x-label class="mt-3" for="email" :value="__('Nama Product')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 bg-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="nama" value="{{ $product->nama_product }}" readonly />
            </div>

            <!-- Id User -->
            <div>
                <x-label class="mt-3" for="email" :value="__('id User')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 bg-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="id_pembeli" value="{{ Auth::user()->id }}" readonly />
            </div>

            <!-- Nama User -->
            <div>
                <x-label class="mt-3" for="email" :value="__('Nama Product')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 bg-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="nama_pembeli" value="{{ Auth::user()->name }}" readonly />
            </div>

            <!-- Jumlah Product-->
            <div>
                <x-label class="mt-3" for="email" :value="__('Jumlah Pembelian')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text" name="jumlah" :value="old('jumlah')" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3">
                    {{ __('Simpan Data') }}
                </x-button>
            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
