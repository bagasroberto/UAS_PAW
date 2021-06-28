<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <a class="underline text-sm ml-3 text-gray-600 hover:text-gray-900" href="{{ route('laporan.index') }}">
            {{ __('Kembali') }}
        </a>

        <form action="{{ url('/laporanpenjualan/pdf') }}" enctype="multipart/form-data">
            @csrf
            <x-label class="text-3xl text-center mb-3" for="email" :value="__('Laporan Menu')" />
            <!-- Pilih Bulan-->
            <div>
                <x-label class="mt-3" for="email" :value="__('Pilih Bulan')" />

                <x-input
                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="month" name="bulan" :value="old('jumlah')" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3">
                    {{ __('Generate Laporan') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
