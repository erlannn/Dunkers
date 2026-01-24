<x-app-layout>
    <div class="p-6 max-w-xl mx-auto bg-[#E67E22] m-5 rounded-xl">
        <h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>
        @if ($errors->any())
            <div class="bg-red-100 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-600">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="mb-3">
                <label>Nama Produk</label>
                <input type="text" name="nama" class="w-full border p-2 rounded" required>
            </div>
    
            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori_id" class="w-full border p-2 rounded">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label>Merek</label>
                <select name="merek_id" class="w-full border p-2 rounded">
                    <option value="">-- Pilih Merek --</option>
                    @foreach($merek as $m)
                        <option value="{{ $m->id }}">{{ $m->nama }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="w-full border p-2 rounded" required>
            </div>
    
            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="w-full border p-2 rounded"></textarea>
            </div>
    
            <div class=" grid grid-cols-2 gap-4">
                <div class="mb-3">
                    <label>Gambar Produk (wajib png)</label>
                    <input type="file" accept="image/png" name="gambarproduk" class="w-full">
                </div>
    
                <div class="mb-3">
                    <label>Gambar Produk 1</label>
                    <input type="file" accept="image/png,image/jpeg,image/jpg,image/avif" name="gambarproduk1" class="w-full" >
                </div>
    
                <div class="mb-3">
                    <label>Gambar Produk 2</label>
                    <input type="file" accept="image/png,image/jpeg,image/jpg,image/avif" name="gambarproduk2" class="w-full">
                </div>
    
                <div class="mb-3">
                    <label>Gambar Produk 3</label>
                    <input type="file" accept="image/png,image/jpeg,image/jpg,image/avif" name="gambarproduk3" class="w-full">
                </div>
            </div>
    
            <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">Simpan</button>
            <button class=" ml-2 bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg"><a href="{{ route('admin.produk.index') }}">Kembali</a></button>
        </form>
    </div>
</x-app-layout>