<x-app-layout>

    <div class=" ml-16 mb-5 mt-5 flex justify-center">
        <h3 class=" text-4xl font-extrabold text-[#E67E22] border-[#E67E22]">Keranjang</h3>
    </div>
    
    <div class=" flex justify-center">
        <div class=" w-[800px] h-auto bg-[#E67E22] p-5 rounded-3xl">
            <table class=" w-full text-white border-y-2">
                <thead>
                    <tr class="border-b-2 text-base">
                        <th>Gambar</th>
                        <th>Produk</th>
                        <th>Ukuran</th>
                        <th>Harga Produk</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            
                <tbody>
                @php $grandTotal = 0; @endphp
                
                @foreach($carts as $item)
                @php 
                $total = $item->produk->harga * $item->qty;
                $grandTotal += $total;
                @endphp
                  
                    <tr class="border-b-2 text-center">
                        <td>
                            <img src="{{ asset('storage/img/produk/' . $item->produk->gambarproduk) }}" 
                             alt="{{ $item->produk->nama }}" 
                             class=" w-32 ml-5">
                        </td>
                        <td>{{ $item->produk->nama }}</td>
                        <td>{{ $item->ukuran->nama ?? '-' }}</td>
                        <td>Rp {{ number_format($item->produk->harga) }}</td>
                    
                        <td>
                            {{ $item->qty }}
                        </td>
                    
                        <td>Rp {{ number_format($total) }}</td>
                    
                        <td>
                            <form action="{{ route('cart.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 hover:bg-red-700 px-2 py-1 rounded-lg my-2">Batalkan</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                
            </table>
            <div class=" flex justify-end">
                <h3 class="text-white mt-6 text-lg font-bold">
                Total Harga: Rp {{ number_format($grandTotal) }}
                </h3>

                @if($carts->isEmpty())
                    <button
                        disabled
                        class="bg-gray-600 cursor-not-allowed mt-4 px-6 py-2 rounded-lg mx-2 font-bold text-white inline-block opacity-60">
                        Checkout
                    </button>
                @else
                    <a href="{{ route('checkout.page') }}"
                    class="bg-orange-800 hover:bg-orange-700 mt-4 px-6 py-2 rounded-lg mx-2 font-bold text-white inline-block">
                        Checkout
                    </a>
                @endif

            </div>
        </div> 
    </div>

    <br><br><br><br>
        
</x-app-layout>
    