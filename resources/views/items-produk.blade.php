@foreach ($produk as $item)
<div class="h-[400px] w-[200px] bg-[#1A1A1A] flex items-center justify-center">

    <div class="relative mt-5 w-[200px] bg-[#E67E22] rounded-[30px] shadow-xl shadow-slate-600 text-center hover:bg-orange-600">

        {{-- GAMBAR --}}
        <img
            src="{{ asset('storage/img/produk/' . $item->gambarproduk) }}"
            alt="{{ $item->nama }}"
            class="absolute -top-36 left-1/2 -translate-x-1/2 w-80 drop-shadow-2xl hover:animate-pulse"
        >

        <div class="pt-12 pb-8 text-white">
            {{-- NAMA --}}
            <h3 class="text-xl font-bold mb-2">
                {{ $item->nama }}
            </h3>

            <p class=" line-clamp-2 text-sm mb-2 opacity-90 px-2 ">
                {{$item->deskripsi}}
            </p>

            {{-- HARGA --}}
            <div class="text-xl font-bold mb-4">
                Rp {{ number_format($item->harga, 0, ',', '.') }}
            </div>
            <div class="flex items-center justify-center">
                <a href="{{ route('produk.show', $item->id) }}"
                    class="bg-white text-orange-500 px-4 py-1 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-400 transition-all active:scale-95">
                    Lihat Produk
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach