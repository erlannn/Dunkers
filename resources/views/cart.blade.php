<x-app-layout>

    <div class=" ml-16 mb-5 mt-5 flex justify-center">
        <h3 class=" text-4xl font-extrabold text-[#E67E22] border-[#E67E22]">Keranjang</h3>
    </div>
    
    <div class=" flex justify-center">
        <div class=" w-[800px] h-auto">
            <table class=" w-full text-white border">
                <thead>
                    <tr class="border-b">
                        <th>Produk</th>
                        <th>Ukuran</th>
                        <th>Harga</th>
                        <th>Qty</th>
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
                  
                    <tr class="border-b text-center">
                        <td>{{ $item->produk->nama }}</td>
                        <td>{{ $item->ukuran->nama ?? '-' }}</td>
                        <td>Rp {{ number_format($item->produk->harga) }}</td>
                    
                        <td>
                            {{-- <form action="{{ route('cart.update',$item->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="qty" value="{{ $item->qty }}"
                                    class="w-16 text-black rounded">
                                <button class="bg-blue-500 px-2 py-1 rounded">Update</button>
                            </form> --}}
                            {{ $item->qty }}
                        </td>
                    
                        <td>Rp {{ number_format($total) }}</td>
                    
                        <td>
                            <form action="{{ route('cart.destroy',$item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 px-2 py-1 rounded-lg my-2">Batalkan</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                
            </table>
            <div class=" flex justify-end">
                <h3 class="text-white mt-6">
                Total Harga: Rp {{ number_format($grandTotal) }}
                </h3>
                
                {{-- <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button class="bg-orange-500 mt-4 px-6 py-2 mx-2 rounded-lg text-white">
                Checkout
                </button>
                </form>  --}}

                <a href="{{ route('checkout.page') }}"
                class="bg-orange-500 mt-4 px-6 py-2 rounded-lg mx-2 text-white inline-block">
                Checkout
                </a>

            </div>
            @if(session('success'))
                <div class="bg-green-500 text-white px-4 py-2 rounded mb-4 mt-4">
                    {{ session('success') }}
                </div>
            @endif
        </div> 
    </div>

    
    
    <br><br><br><br><br><br><br><br>
        
</x-app-layout>
    