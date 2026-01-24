<x-app-layout>
    <div class=" flex justify-center m-5">
        <div class="p-6 max-w-lg bg-orange-500 rounded-xl">
            <h1 class="text-xl font-bold mb-4">Edit User</h1>
        
            <form method="POST" action="{{ route('admin.users.update',$user->id) }}">
                @csrf
                @method('PUT')
        
                <div class="mb-3">
                    <label>Nama</label>
                    <input name="name" value="{{ $user->name }}" class="border p-2 w-full">
                </div>

                <div class="mb-3">
                    <label>Username</label>
                    <input name="username" value="{{ $user->username }}" class="border p-2 w-full">
                </div>
        
                <div class="mb-3">
                    <label>Email</label>
                    <input name="email" value="{{ $user->email }}" class="border p-2 w-full">
                </div>

                <div class="mb-3">
                    <label>Nomor Hp</label>
                    <input name="nomor_hp" value="{{ $user->nomor_hp }}" class="border p-2 w-full">
                </div>
        
                <div class="mb-3">
                    <label>Role</label>
                    <select name="role_id" class="border p-2 w-full">
                        <option value="1" {{ $user->role_id==1?'selected':'' }}>Admin</option>
                        <option value="2" {{ $user->role_id==2?'selected':'' }}>Pelanggan</option>
                    </select>
                </div>
        
                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Update
                </button>
                <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                    <a href="{{ route('admin.users') }}">Kembali</a>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
    