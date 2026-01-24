<x-app-layout>
    <div class=" flex justify-center m-5">
        <div class="p-6 max-w-lg bg-orange-500 rounded-xl">
            <h1 class="text-xl font-bold mb-4 text-black">Tambah Admin</h1>
        
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <div class="mb-3">
                    <label>Username</label>
                    <input name="username" class="border p-2 w-full">
                </div>
        
                <div class="mb-3">
                    <label>Nama</label>
                    <input name="name" class="border p-2 w-full">
                </div>
        
                <div class="mb-3">
                    <label>Email</label>
                    <input name="email" class="border p-2 w-full">
                </div>

                <div class="mb-3">
                    <label>Nomor HP</label>
                    <input name="nomor_hp" class="border p-2 w-full">
                </div>
        
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="border p-2 w-full">
                </div>
        
                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Simpan
                </button>
                <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                    <a href="{{ route('admin.users') }}">Kembali</a>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
    