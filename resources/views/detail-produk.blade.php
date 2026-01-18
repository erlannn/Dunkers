<x-app-layout>

    <div class="grid grid-cols-2 mt-10">

        {{-- ================= SISI KIRI ================= --}}
        <div class="flex justify-center w-[500px] ml-10"> 
    
            <div class="w-40 mx-4">
                <img src="{{ asset('storage/img/produk/' . $produk->gambarproduk1) }}" 
                     alt="{{ $produk->nama }}" 
                     class="w-32 rounded-2xl">
    
                <img src="{{ asset('storage/img/produk/' . $produk->gambarproduk2) }}" 
                     alt="{{ $produk->nama }}" 
                     class="w-32 rounded-2xl my-2">
    
                <img src="{{ asset('storage/img/produk/' . $produk->gambarproduk3) }}" 
                     alt="{{ $produk->nama }}" 
                     class="w-32 rounded-2xl my-2">    
            </div>
    
            <div class="max-w-lg mx-auto w-full">
                <div class="relative max-w-lg mx-auto overflow-hidden rounded-2xl shadow-lg">
    
                    <div id="slider" class="flex transition-transform duration-700 ease-in-out">
    
                        <div class="min-w-full">
                            <img src="{{ asset('storage/img/produk/' . $produk->gambarproduk1) }}" 
                                 class="w-full object-cover" 
                                 alt="{{ $produk->nama }}">
                        </div>
    
                        <div class="min-w-full">
                            <img src="{{ asset('storage/img/produk/' . $produk->gambarproduk2) }}" 
                                 class="w-full object-cover" 
                                 alt="{{ $produk->nama }}">
                        </div>
    
                        <div class="min-w-full">
                            <img src="{{ asset('storage/img/produk/' . $produk->gambarproduk3) }}" 
                                 class="w-full object-cover" 
                                 alt="{{ $produk->nama }}">
                        </div>
    
                    </div>
    
                    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                        <div class="dot w-3 h-3 rounded-full bg-white/50 cursor-pointer"></div>
                        <div class="dot w-3 h-3 rounded-full bg-white/50 cursor-pointer"></div>
                        <div class="dot w-3 h-3 rounded-full bg-white/50 cursor-pointer"></div>
                    </div>
    
                </div>
            </div>
        </div>
    
        {{-- ================= SISI KANAN ================= --}}
        <div class="text-white mr-10">
    
            <h2 class="text-3xl font-extrabold mb-1">
                {{ $produk->nama }}
            </h2>
    
            <h3 class="text-2xl font-extrabold mb-1">
                Rp {{ number_format($produk->harga,0,',','.') }}
            </h3>
    
            <p>{{ $produk->deskripsi }}</p>
    
            <br><br>
    
            {{-- ================= UKURAN ================= --}}
            <div class="text-md text-gray-300 mb-2">
                <span class="mr-4">
                    Kategori: 
                    <span class="text-orange-400 font-semibold">
                        {{ $produk->kategori?->nama ?? '-' }}
                    </span>
                </span>
            
                <span class="mr-4">
                    Merek: 
                    <span class="text-orange-400 font-semibold">
                        {{ $produk->merek?->nama ?? '-' }}
                    </span>
                </span>

                <span>
                    Stok yang tersedia: 
                    <span class="text-orange-400 font-semibold">
                        {{ $produk->stok}}
                    </span>
                </span>
            </div>

            {{-- <h3 class="text-2xl font-extrabold mb-3">Ukuran</h3> --}}
    
            {{-- <div class="grid grid-cols-2">
    
                <div class="flex gap-2 flex-wrap">
                    @if ($produk->kategori && $produk->kategori->ukurans->count())
                        @foreach ($produk->kategori->ukurans as $ukuran)
                            <x-primary-button>{{ $ukuran->nama }}</x-primary-button>
                        @endforeach
                    @else
                        <span class="text-gray-400">Ukuran tidak tersedia untuk aksesoris</span>
                    @endif
                </div>
    
                <div class="flex justify-center">
                    <x-primary-button>Keranjang</x-primary-button>
                </div>
    
            </div> --}}

            <form action="{{ route('cart.add', $produk->id) }}" method="POST">
                @csrf
                
                <div class=" grid grid-cols-2">
                    <div>
                        @if ($produk->kategori && $produk->kategori->ukurans->count())
                            <h3 class="text-2xl font-extrabold mb-3">Ukuran</h3>
                        
                            <div class="flex gap-3 flex-wrap">
                                @foreach ($produk->kategori->ukurans as $ukuran)
                                    <label class="cursor-pointer">
                                        <input type="radio" 
                                            name="ukuran_id" 
                                            value="{{ $ukuran->id }}" 
                                            class="hidden peer" required>
                        
                                        <span class="px-4 py-2 rounded-lg border 
                                            peer-checked:bg-[#E67E22]
                                            peer-checked:text-white">
                                            {{ $ukuran->nama }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        @endif
                    </div>
     
                    <div>
                        <h3 class="text-2xl ml-4 font-extrabold">Jumlah</h3>
                        <div class="flex items-center ml-4 gap-3">
                        
                            <input type="number" name="qty" value="1" min="1" class=" w-20 text-black rounded">
                            <button type="submit" class=" bg-orange-500 px-6 py-2 rounded w-[75px] text-white">
                                <img src="{{ asset('storage/img/produk/keranjang.png') }}" alt="keranjang">
                                {{-- <svg  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="25" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7h-1M8 7h-.688M13 5v4m-2-2h4" />
                                </svg> --}}
                            </button>
                        </div>
                    </div>
                </div>
                
            </form>  
            @if(session('success'))
                <div class="bg-green-500 text-white px-4 py-2 rounded mb-4 mt-4">
                    {{ session('success') }}
                </div>
            @endif   
                  
        </div>
    
    </div>
    

    <br><br><br><br>

    <div class=" max-h-full mx-10 border-t-2 border-orange-500">
        <div class=" mt-4 flex justify-start">
            <h3 class=" text-2xl font-bold text-[#E67E22] border-b-2 border-[#E67E22]">Rekomendasi Produk!</h3>
        </div>

    </div>

    @if($guest)
    <p class="text-gray-400 mt-4 ml-10">
        Login untuk mendapatkan rekomendasi produk khusus untukmu.
    </p>
    @else
        @if($rekomendasi->isEmpty())
            <p class="text-gray-400 mt-4">Silahkan berbelanja dahulu untuk mendapatkan rekomendasi.</p>
        @else
            <div class="grid grid-cols-4 mt-6">
                @foreach($rekomendasi as $item)
                    <div class=" flex justify-center">
                        <a href="{{ route('produk.show', $item->id) }}"
                            class="bg-[#1A1A1A] p-4 rounded-xl hover:scale-110 transition">
        
                                <img src="{{ asset('storage/img/produk/'.$item->gambarproduk) }}"
                                    class="h-40 object-cover rounded mb-2">
        
                                <h4 class="font-bold text-white">{{ $item->nama }}</h4>
                                <p class="text-orange-400">
                                    Rp {{ number_format($item->harga,0,',','.') }}
                                </p>
                            </a>
                    </div>
                @endforeach
            </div>
        @endif
    @endif

    <br><br>

    <script>
        const slider = document.getElementById('slider');
        const dots = document.querySelectorAll('.dot');
        let currentIndex = 0;
        const totalSlides = dots.length;
      
        function updateSlider() {
          // Geser slider berdasarkan index
          slider.style.transform = `translateX(-${currentIndex * 100}%)`;
          
          // Update warna indikator
          dots.forEach((dot, index) => {
            dot.classList.toggle('bg-white', index === currentIndex);
            dot.classList.toggle('bg-white/50', index !== currentIndex);
          });
        }
      
        function nextSlide() {
          currentIndex = (currentIndex + 1) % totalSlides;
          updateSlider();
        }
      
        // Jalankan animasi otomatis setiap 3 detik
        setInterval(nextSlide, 3000);
      
        // Inisialisasi tampilan pertama
        updateSlider();
    </script>
</x-app-layout>