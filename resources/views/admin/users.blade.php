<x-app-layout>
    <div class="p-6">
        <div class="flex justify-between mb-5">
            <h1 class="text-3xl font-bold text-orange-500">Data Pengguna</h1>
            <a href="{{ route('admin.users.create') }}" 
               class="bg-orange-600 hover:bg-orange-500 text-white px-4 py-2 rounded-lg">
                Tambah Admin
            </a>
        </div>
    
        <table class="w-full">
            <thead class="bg-orange-500">
                <tr>
                    <th class="p-2">No</th>
                    <th class="p-2">Nama</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Role</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $item)
                <tr class=" text-white text-center">
                    <td class="p-2 text-center">
                        {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                    </td>
                    <td class="p-2">{{ $item->name }}</td>
                    <td class="p-2">{{ $item->email }}</td>
                    <td class="p-2">
                        {{ $item->role->name ?? '-' }}
                    </td>
                    <td class="p-2 flex gap-2 justify-center">
                        <a href="{{ route('admin.users.edit',$item->id) }}"
                           class="bg-orange-600 hover:bg-orange-500 text-white px-2 py-1 rounded">
                            Edit
                        </a>
                    
                        <form action="{{ route('admin.users.destroy',$item->id) }}"
                              method="POST"
                              class="inline"
                              onsubmit="return confirm('Hapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 hover:bg-red-500 text-white px-2 py-1 rounded">
                                Hapus
                            </button>
                        </form>
                    </td>                    
                </tr>
                @endforeach
            </tbody>
        </table>
    
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
    