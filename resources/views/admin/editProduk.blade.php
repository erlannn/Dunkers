<x-app-layout>
    <div class="p-6 max-w-xl mx-auto bg-[#E67E22] m-5 rounded-xl">
        <h1 class="text-2xl font-bold mb-4">Edit Produk</h1>
    
        <form action="{{ route('admin.produk.update',$produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
    
            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" name="nama" value="{{ $produk->nama }}" class="w-full border p-2 rounded">
            </div>
    
            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" value="{{ $produk->harga }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori_id" class="w-full border p-2 rounded">
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}" 
                            {{ $produk->kategori_id == $k->id ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label>Merek</label>
                <select name="merek_id" class="w-full border p-2 rounded">
                    @foreach($merek as $m)
                        <option value="{{ $m->id }}" 
                            {{ $produk->merek_id == $m->id ? 'selected' : '' }}>
                            {{ $m->nama }}
                        </option>
                    @endforeach
                </select>
            </div>            
    
            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" value="{{ $produk->stok }}" class="w-full border p-2 rounded">
            </div>
    
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="w-full border p-2 rounded">{{ $produk->deskripsi }}</textarea>
            </div>
    
            <div class=" grid grid-cols-2">
                @php
                $fields = ['gambarproduk','gambarproduk1','gambarproduk2','gambarproduk3'];
                @endphp

                @foreach($fields as $field)
                <div class="mb-3">
                    <label>{{ ucfirst($field) }}</label>
                    <input type="file" name="{{ $field }}" class="w-full">

                    @if($produk->$field)
                        <img src="{{ asset('storage/img/produk/'.$produk->$field) }}" class="w-24 mt-2">
                    @endif
                </div>
                @endforeach
            </div>

    
            <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">Update</button>
            <button class="ml-2 bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg"><a href="{{ route('admin.produk.index') }}">Kembali</a></button>
        </form>
    </div>
</x-app-layout>