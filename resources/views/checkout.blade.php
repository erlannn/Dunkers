<x-app-layout>

    <div class=" flex justify-center mt-5">
        <div class=" bg-[#E67E22] w-[500px] rounded-2xl">
            <h2 class="text-2xl font-bold text-white mb-4 mt-2 text-center">Checkout Produk</h2>
        
            <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            
                <table class="w-full text-white mb-6 text-lg">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Ukuran</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    @php $total=0; @endphp
                    @foreach($carts as $item)
                        @php $sub = $item->produk->harga * $item->qty; $total+=$sub; @endphp
                        <tbody class=" text-center text-md">
                            <tr>
                                <td>{{ $item->produk->nama }}</td>
                                <td>{{ $item->ukuran->nama ?? '-' }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>Rp {{ number_format($sub) }}</td>
                                </tr>
                        </tbody>
                    @endforeach
                </table>
                
                <p class="text-white mb-2 mt-5 text-center text-xl font-bold">Total: Rp {{ number_format($total) }}</p>

                <div class=" flex justify-center">
                    <hr class=" w-96">
                </div>

                <h3 class="text-white mb-1 text-center text-lg font-semibold mt-2">Metode Pembayaran</h3>
                
                <div class=" flex justify-center">
                    @foreach($metodes as $m)
                    <label class="text-white block text-lg font-semibold mx-2">
                        <input type="radio" name="metode_pembayaran_id" value="{{ $m->id }}">
                        {{ $m->nama }}
                    </label>
                    @endforeach
                </div>
                
                <div class=" flex justify-center mb-3">
                    <button class="bg-blue-600 hover:bg-blue-700 w-80 px-6 py-2 mt-4 rounded-lg text-white text-lg font-bold">
                        Bayar Sekarang
                    </button>
                </div>
            
            </form>
        </div>
    </div>
    
    </x-app-layout>
    