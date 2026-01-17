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
            <h3 class="text-2xl font-extrabold mb-3">Ukuran</h3>
    
            <div class="grid grid-cols-2">
    
                <div class="flex gap-2 flex-wrap">
                    @if ($produk->kategori && $produk->kategori->ukurans->count())
                        @foreach ($produk->kategori->ukurans as $ukuran)
                            <x-primary-button>{{ $ukuran->nama }}</x-primary-button>
                        @endforeach
                    @else
                        <span class="text-gray-400">Ukuran belum tersedia</span>
                    @endif
                </div>
    
                <div class="flex justify-center">
                    <x-primary-button>Keranjang</x-primary-button>
                </div>
    
            </div>
    
        </div>
    
    </div>
    

    <br><br><br><br>

    <div class=" max-h-full mx-10 border-t-2 border-orange-500">
        <div class=" mt-4 flex justify-start">
            <h3 class=" text-2xl font-bold text-[#E67E22] border-b-2 border-[#E67E22]">Rekomendasi Produk!</h3>
        </div>

    </div>

    @if($guest)
    <p class="text-gray-400 mt-4">
        Login untuk mendapatkan rekomendasi produk khusus untukmu.
    </p>
    @else
        @if($rekomendasi->isEmpty())
            <p class="text-gray-400 mt-4">Tidak ada rekomendasi.</p>
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


    <br><br><br><br><br><br><br><br>

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