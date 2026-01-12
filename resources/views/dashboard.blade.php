<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-800 bg-[#E67E22] leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#E67E22] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Selamat datang dunkers!</p>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="py-12">
        <div class="w-max ml-16">
            <p class=" text-[#E67E22] text-2xl font-extrabold animate-mengetik overflow-hidden whitespace-nowrap border-r-4 border-black pr-2 font-mono">Selamat Datang di Dunkers!</p>
        </div>
        {{-- <div class="w-max ml-16">
            <p class=" text-[#E67E22] text-md font-bold animate-mengetik overflow-hidden whitespace-nowrap border-r-2 border-black pr-2 font-mono">Happy Shopping!</p>
        </div> --}}
    </div>

    <div class=" ml-16 mb-5 flex justify-start">
        <h3 class=" text-3xl font-bold text-[#E67E22] border-b-2 border-[#E67E22]">Produk Terlaris!</h3>
    </div>

    <div class=" py-6 grid grid-cols-5 mx-5">
        
            {{-- produk-1 --}}
            <div class="h-[400px] w-[200px] bg-[#1A1A1A] flex items-center justify-center">
        
                <div class="relative mt-5 w-[200px] bg-[#E67E22] rounded-[30px] shadow-xl shadow-slate-600 text-center">
                
                    <img
                    src="img/produk/KOBE-PORTO-1.png"
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

            {{-- produk-3 --}}
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
    
            {{-- produk-4 --}}
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

            {{-- Produk Spotlight --}}
            <div class=" max-w-lg mx-auto col-span-2 h-[600px] rounded-[30px] bg-[#E67E22] shadow-xl shadow-slate-700 ">
                <div class=" max-w-lg mx-auto ">
                    <div class="relative max-w-lg mx-auto overflow-hidden rounded-3xl shadow-lg">
                      
                      <div id="slider" class="flex transition-transform duration-700 ease-in-out">
                        <div class="min-w-full">
                          <img src="img/produk/mempis1.avif" class="w-full h-64 md:h-96 object-cover" alt="Nature 1">
                        </div>
                        <div class="min-w-full">
                          <img src="img/produk/mempis2.avif" class="w-full h-64 md:h-96 object-cover" alt="Nature 2">
                        </div>
                        <div class="min-w-full">
                          <img src="img/produk/mempis3.avif" class="w-full h-64 md:h-96 object-cover " alt="Nature 3">
                        </div>
                      </div>
                  
                      <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                        <div class="dot w-3 h-3 rounded-full bg-white/50 cursor-pointer"></div>
                        <div class="dot w-3 h-3 rounded-full bg-white/50 cursor-pointer"></div>
                        <div class="dot w-3 h-3 rounded-full bg-white/50 cursor-pointer"></div>
                      </div>
                    </div>
                </div>

                <div class="flex items-center justify-center mx-6 mt-3 text-justify">
                    <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto accusantium nemo esse tenetur blanditiis provident reiciendis expedita! Excepturi, non. Numquam, deserunt hic! Neque voluptates porro debitis quibusdam possimus tempore animi?</p>
                </div>

                <div class="flex items-center justify-center mt-3">        
                    <button class="bg-white text-orange-500 px-5 py-2 rounded-full font-bold text-sm shadow-md hover:shadow-lg hover:bg-gray-50 transition-all active:scale-95">
                    Lihat Produk
                    </button>
                </div>
            </div>
        
    </div>
    <br><br><br><br><br><br>
    
    <div class="relative overflow-hidden bg-[#E67E22] h-12 flex items-center">
        <div class="whitespace-nowrap animate-marquee text-black font-bold text-lg px-1">
            ⚠️ PERHATIAN  PROMO TERBATAS — DISKON HINGGA 50% — BELANJA SEKARANG ⚠️ PERHATIAN  PROMO TERBATAS — DISKON HINGGA 50% — BELANJA SEKARANG ⚠️
        </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br>
    
    
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
