<x-app-layout>

    <h2 class="text-2xl font-bold text-white mb-4">Checkout</h2>
    
    <form action="{{ route('checkout.store') }}" method="POST">
    @csrf
    
        <table class="w-full text-white mb-6">
            @php $total=0; @endphp
            @foreach($carts as $item)
                @php $sub = $item->produk->harga * $item->qty; $total+=$sub; @endphp
                <tr>
                <td>{{ $item->produk->nama }}</td>
                <td>{{ $item->ukuran->nama ?? '-' }}</td>
                <td>{{ $item->qty }}</td>
                <td>Rp {{ number_format($sub) }}</td>
                </tr>
            @endforeach
        </table>
        
        <p class="text-white mb-4">Total: Rp {{ number_format($total) }}</p>
        
        <h3 class="text-white mb-2">Metode Pembayaran</h3>
        
        @foreach($metodes as $m)
        <label class="text-white block">
            <input type="radio" name="metode_pembayaran_id" value="{{ $m->id }}">
            {{ $m->nama }}
        </label>
        @endforeach
        
        <button class="bg-green-500 px-6 py-2 mt-4 rounded text-white">
        Bayar Sekarang
        </button>
    
    </form>
    
    </x-app-layout>
    