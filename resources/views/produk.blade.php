<x-app-layout>
    
    <div class=" ml-16 mb-5 mt-10 flex justify-center">
        <h3 class=" text-5xl font-extrabold text-[#E67E22] border-[#E67E22]">Semua Produk!</h3>
    </div>
    
    <div class="w-full max-w-2xl mx-auto p-4 mb-14 ">
        <form action="{{ route('produk') }}" method="GET" class="relative flex items-center group">
            <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none ">
            </div>
        
                <input 
                type="text" 
                name="search"
                value="{{ request('search') }}"
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
        <div id="produk-wrapper" class="py-6 grid grid-cols-4 gap-20">
            @include('items-produk')
        </div>      
    </div>
    <div class="flex justify-center mt-10">
        <button id="loadMore"
            class="px-10 py-3 mb-10 bg-orange-700 text-white rounded-full hover:bg-orange-600 transition">
            Lihat Produk Selanjutnya
        </button>
    </div>  

    <script>
        let page = 1;
        
        document.getElementById('loadMore').addEventListener('click', function () {
            page++;
        
            let search = new URLSearchParams(window.location.search).get('search') ?? '';
        
            fetch(`?page=${page}&search=${search}`, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.text())
            .then(data => {
                if (data.trim() === '') {
                    this.innerText = "Produk Habis";
                    this.disabled = true;
                } else {
                    document.getElementById('produk-wrapper').insertAdjacentHTML('beforeend', data);
                }
            });
        });
    </script>
        
</x-app-layout>