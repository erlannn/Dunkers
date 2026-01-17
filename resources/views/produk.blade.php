<x-app-layout>
    
    <div class=" ml-16 mb-5 mt-10 flex justify-center">
        <h3 class=" text-5xl font-extrabold text-[#E67E22] border-[#E67E22]">Semua Produk!</h3>

    </div>
    
    <div class="w-full max-w-2xl mx-auto p-4 mb-14 ">
        <form action="#" method="GET" class="relative flex items-center group ">
            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none ">
            </div>
        
            <input 
            type="text" 
            placeholder="Cari Baju, Sepatu atau Aksesoris..." 
            class="block w-full h-16 pl-14 pr-32 bg-[#E67E22] border-none rounded-full shadow-xl text-white placeholder-gray-200 focus:ring-2 focus:ring-white transition-all duration-300 outline-none"
            >
        
            <button 
            type="submit" 
            class="absolute right-2 top-2 bottom-2 px-6 bg-orange-900 hover:bg-orange-700 text-white font-medium rounded-full shadow-md hover:shadow-lg transform active:scale-95 transition-all duration-200"
            >
            Cari Sekarang
            </button>
        </form>
    </div>

    {{-- SEMUA PRODUK --}}
    <div class="flex justify-center">
        <div class="py-6 grid grid-cols-4 gap-20 ">
            {{-- Contoh produk --}}
                {{-- produk-1
                 <div class="h-[400px] w-[200px] bg-[#1A1A1A] flex items-center justify-center">
            
                    <div class="relative mt-5 w-[200px] bg-[#E67E22] rounded-[30px] shadow-xl shadow-slate-600 text-center">
                    
                        <img
                        src="img/produk/KOBE-1.png"
                        alt="Contoh Tube Biru"
                        class="absolute -top-36 left-1/2 -translate-x-1/2 w-80 drop-shadow-2xl"
                        >
                        <div class="pt-12 pb-8 text-white">
                        <h3 class="text-xl font-bold mb-2">Sepatu Kobe Porto</h3>
                        <p class=" text-sm mb-2 opacity-90 ">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                            </p>
                        <div class="text-xl font-bold mb-4">$ 9.99</div>
                    
                        <div class="flex items-center justify-center">         
                            <button class="bg-white text-orange-500 px-4 py-1 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-50 transition-all active:scale-95">
                            Lihat Produk
                            </button>
                        </div>
                        </div>
                    
                    </div>
                </div> 
        
                produk-2
                <div class="h-[400px] w-[200px] bg-[#1A1A1A] flex items-center justify-center">
            
                    <div class="relative mt-5 w-[200px] bg-[#E67E22] rounded-[30px] shadow-xl shadow-slate-600 text-center">
                    
                        <img
                        src="img/produk/BASKETBALL-ELITE-1.png"
                        alt="Contoh Tube Biru"
                        class="absolute -top-36 left-1/2 -translate-x-1/2 w-80 drop-shadow-2xl"
                        >
                        <div class="pt-12 pb-8 text-white">
                        <h3 class="text-xl font-bold mb-2">Sepatu Kobe Porto</h3>
                        <p class=" text-sm mb-2 opacity-90 ">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                            </p>
                        <div class="text-xl font-bold mb-4">$ 9.99</div>
                    
                        <div class="flex items-center justify-center">         
                            <button class="bg-white text-orange-500 px-4 py-1 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-50 transition-all active:scale-95">
                            Lihat Produk
                            </button>
                        </div>
                        </div>
                    
                    </div>
                </div>
        
                produk-3
                <div class="h-[400px] w-[200px] bg-[#1A1A1A] flex items-center justify-center">
            
                    <div class="relative mt-5 w-[200px] bg-[#E67E22] rounded-[30px] shadow-xl shadow-slate-600 text-center">
                    
                        <img
                        src="img/produk/GT-1.png"
                        alt="Contoh Tube Biru"
                        class="absolute -top-36 left-1/2 -translate-x-1/2 w-80 drop-shadow-2xl"
                        >
                        <div class="pt-12 pb-8 text-white">
                        <h3 class="text-xl font-bold mb-2">Sepatu Kobe Porto</h3>
                        <p class=" text-sm mb-2 opacity-90 ">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                            </p>
                        <div class="text-xl font-bold mb-4">$ 9.99</div>
                    
                        <div class="flex items-center justify-center">         
                            <button class="bg-white text-orange-500 px-4 py-1 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-50 transition-all active:scale-95">
                            Lihat Produk
                            </button>
                        </div>
                        </div>
                    
                    </div>
                </div>
        
                produk-4
                <div class="h-[400px] w-[200px] bg-[#1A1A1A] flex items-center justify-center">
            
                    <div class="relative mt-5 w-[200px] bg-[#E67E22] rounded-[30px] shadow-xl shadow-slate-600 text-center">
                    
                        <img
                        src="img/produk/LAKERS-1.png"
                        alt="Contoh Tube Biru"
                        class="absolute -top-36 left-1/2 -translate-x-1/2 w-80 drop-shadow-2xl"
                        >
                        <div class="pt-12 pb-8 text-white">
                        <h3 class="text-xl font-bold mb-2">Sepatu Kobe Porto</h3>
                        <p class=" text-sm mb-2 opacity-90 ">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                            </p>
                        <div class="text-xl font-bold mb-4">$ 9.99</div>
                    
                        <div class="flex items-center justify-center">         
                            <button class="bg-white text-orange-500 px-4 py-1 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-50 transition-all active:scale-95">
                            Lihat Produk
                            </button>
                        </div>
                        </div>
                    
                    </div>
                </div>

                produk-5
                <div class="h-[400px] w-[200px] bg-[#1A1A1A] flex items-center justify-center">
            
                    <div class="relative mt-5 w-[200px] bg-[#E67E22] rounded-[30px] shadow-xl shadow-slate-600 text-center">
                    
                        <img
                        src="img/produk/GIANNIS-1.png"
                        alt="Contoh Tube Biru"
                        class="absolute -top-36 left-1/2 -translate-x-1/2 w-80 drop-shadow-2xl"
                        >
                        <div class="pt-12 pb-8 text-white">
                        <h3 class="text-xl font-bold mb-2">Sepatu Kobe Porto</h3>
                        <p class=" text-sm mb-2 opacity-90 ">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                            </p>
                        <div class="text-xl font-bold mb-4">$ 9.99</div>
                    
                        <div class="flex items-center justify-center">         
                            <button class="bg-white text-orange-500 px-4 py-1 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-50 transition-all active:scale-95">
                            Lihat Produk
                            </button>
                        </div>
                        </div>
                    
                    </div>
                </div>
        
                produk-6
                <div class="h-[400px] w-[200px] bg-[#1A1A1A] flex items-center justify-center">
            
                    <div class="relative mt-5 w-[200px] bg-[#E67E22] rounded-[30px] shadow-xl shadow-slate-600 text-center">
                    
                        <img
                        src="img/produk/NEWYORK-1.png"
                        alt="Contoh Tube Biru"
                        class="absolute -top-36 left-1/2 -translate-x-1/2 w-80 drop-shadow-2xl"
                        >
                        <div class="pt-12 pb-8 text-white">
                        <h3 class="text-xl font-bold mb-2">Sepatu Kobe Porto</h3>
                        <p class=" text-sm mb-2 opacity-90 ">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                            </p>
                        <div class="text-xl font-bold mb-4">$ 9.99</div>
                    
                        <div class="flex items-center justify-center">         
                            <button class="bg-white text-orange-500 px-4 py-1 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-50 transition-all active:scale-95">
                            Lihat Produk
                            </button>
                        </div>
                        </div>
                    
                    </div>
                </div>

                produk-7
                <div class="h-[400px] w-[200px] bg-[#1A1A1A] flex items-center justify-center">
            
                    <div class="relative mt-5 w-[200px] bg-[#E67E22] rounded-[30px] shadow-xl shadow-slate-600 text-center">
                    
                        <img
                        src="img/produk/HEADBAND-1.png"
                        alt="Contoh Tube Biru"
                        class="absolute -top-36 left-1/2 -translate-x-1/2 w-80 drop-shadow-2xl"
                        >
                        <div class="pt-12 pb-8 text-white">
                        <h3 class="text-xl font-bold mb-2">Sepatu Kobe Porto</h3>
                        <p class=" text-sm mb-2 opacity-90 ">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                            </p>
                        <div class="text-xl font-bold mb-4">$ 9.99</div>
                    
                        <div class="flex items-center justify-center">         
                            <button class="bg-white text-orange-500 px-4 py-1 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-50 transition-all active:scale-95">
                            Lihat Produk
                            </button>
                        </div>
                        </div>
                    
                    </div>
                </div>
        
                produk-8
                <div class="h-[400px] w-[200px] bg-[#1A1A1A] flex items-center justify-center">
            
                    <div class="relative mt-5 w-[200px] bg-[#E67E22] rounded-[30px] shadow-xl shadow-slate-600 text-center">
                    
                        <img
                        src="img/produk/LAKERSP-1.png"
                        alt="Contoh Tube Biru"
                        class="absolute -top-36 left-1/2 -translate-x-1/2 w-80 drop-shadow-2xl"
                        >
                        <div class="pt-12 pb-8 text-white">
                        <h3 class="text-xl font-bold mb-2">Sepatu Kobe Porto</h3>
                        <p class=" text-sm mb-2 opacity-90 ">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                            </p>
                        <div class="text-xl font-bold mb-4">$ 9.99</div>
                    
                        <div class="flex items-center justify-center">         
                            <button class="bg-white text-orange-500 px-4 py-1 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-50 transition-all active:scale-95">
                            Lihat Produk
                            </button>
                        </div>
                        </div>
                    
                    </div>
                </div>

                produk-9
                <div class="h-[400px] w-[200px] bg-[#1A1A1A] flex items-center justify-center">
            
                    <div class="relative mt-5 w-[200px] bg-[#E67E22] rounded-[30px] shadow-xl shadow-slate-600 text-center">
                    
                        <img
                        src="img/produk/LAKERSJ-5.png"
                        alt="Contoh Tube Biru"
                        class="absolute -top-36 left-1/2 -translate-x-1/2 w-80 drop-shadow-2xl"
                        >
                        <div class="pt-12 pb-8 text-white">
                        <h3 class="text-xl font-bold mb-2">Sepatu Kobe Porto</h3>
                        <p class=" text-sm mb-2 opacity-90 ">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                            </p>
                        <div class="text-xl font-bold mb-4">$ 9.99</div>
                    
                        <div class="flex items-center justify-center">         
                            <button class="bg-white text-orange-500 px-4 py-1 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-50 transition-all active:scale-95">
                            Lihat Produk
                            </button>
                        </div>
                        </div>
                    
                    </div>
                </div>
        
                produk-10
                <div class="h-[400px] w-[200px] bg-[#1A1A1A] flex items-center justify-center">
            
                    <div class="relative mt-5 w-[200px] bg-[#E67E22] rounded-[30px] shadow-xl shadow-slate-600 text-center">
                    
                        <img
                        src="img/produk/NC-1.png"
                        alt="Contoh Tube Biru"
                        class="absolute -top-36 left-1/2 -translate-x-1/2 w-80 drop-shadow-2xl"
                        >
                        <div class="pt-12 pb-8 text-white">
                        <h3 class="text-xl font-bold mb-2">Sepatu Kobe Porto</h3>
                        <p class=" text-sm mb-2 opacity-90 ">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                            </p>
                        <div class="text-xl font-bold mb-4">$ 9.99</div>
                    
                        <div class="flex items-center justify-center">         
                            <button class="bg-white text-orange-500 px-4 py-1 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-50 transition-all active:scale-95">
                            Lihat Produk
                            </button>
                        </div>
                        </div>
                    
                    </div>
                </div>

                produk-11
                <div class="h-[400px] w-[200px] bg-[#1A1A1A] flex items-center justify-center">
            
                    <div class="relative mt-5 w-[200px] bg-[#E67E22] rounded-[30px] shadow-xl shadow-slate-600 text-center">
                    
                        <img
                        src="img/produk/GWS-1.png"
                        alt="Contoh Tube Biru"
                        class="absolute -top-36 left-1/2 -translate-x-1/2 w-80 drop-shadow-2xl"
                        >
                        <div class="pt-12 pb-8 text-white">
                        <h3 class="text-xl font-bold mb-2">Sepatu Kobe Porto</h3>
                        <p class=" text-sm mb-2 opacity-90 ">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                            </p>
                        <div class="text-xl font-bold mb-4">$ 9.99</div>
                    
                        <div class="flex items-center justify-center">         
                            <button class="bg-white text-orange-500 px-4 py-1 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-50 transition-all active:scale-95">
                            Lihat Produk
                            </button>
                        </div>
                        </div>
                    
                    </div>
                </div>
        
                produk-12
                <div class="h-[400px] w-[200px] bg-[#1A1A1A] flex items-center justify-center">
            
                    <div class="relative mt-5 w-[200px] bg-[#E67E22] rounded-[30px] shadow-xl shadow-slate-600 text-center">
                    
                        <img
                        src="img/produk/PHIL-1.png"
                        alt="Contoh Tube Biru"
                        class="absolute -top-36 left-1/2 -translate-x-1/2 w-80 drop-shadow-2xl"
                        >
                        <div class="pt-12 pb-8 text-white">
                        <h3 class="text-xl font-bold mb-2">Sepatu Kobe Porto</h3>
                        <p class=" text-sm mb-2 opacity-90 ">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                            </p>
                        <div class="text-xl font-bold mb-4">$ 9.99</div>
                    
                        <div class="flex items-center justify-center">         
                            <button class="bg-white text-orange-500 px-4 py-1 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-50 transition-all active:scale-95">
                            Lihat Produk
                            </button>
                        </div>
                        </div>
                    
                    </div>
                </div>  --}}
             {{-- END Contoh Produk --}}

            {{-- Produk variabel --}}
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
        
                            {{-- BUTTON --}}
                            {{-- <div class="flex items-center justify-center">
                                <a href="{{ route('produk.detail', $item->id) }}"
                                    class="bg-white text-orange-500 px-4 py-1 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-400 transition-all active:scale-95">
                                    Lihat Produk
                                </a>
                            </div> --}}
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

        </div>
    </div>

    {{-- Rekomendasi --}}
    <h2 class="text-xl font-bold mb-4">Rekomendasi Produk Untuk Anda</h2>

    {{-- JIKA BELUM LOGIN --}}
    {{-- @if($guest)
        <p>Silakan berbelanja untuk melihat rekomendasi produk.</p>

    @else
        @if($products->isEmpty())
            <p>Tidak ada rekomendasi produk saat ini.</p>
        @else
            <div class="grid grid-cols-2 gap-4">
                @foreach($products as $produk)
                    <div class="border p-4 rounded">
                        <h3 class="font-semibold">{{ $produk->nama }}</h3>
                        <p>Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    @endif --}}


</x-app-layout>