{{-- <x-app-layout> --}}
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-300 bg-white shadow-md rounded-lg">
                            <thead>
                                <tr class="bg-gray-100 border-b">
                                    <th class="px-4 py-2 text-left text-gray-600">ID</th>
                                    <th class="px-4 py-2 text-left text-gray-600">Name</th>
                                    <th class="px-4 py-2 text-left text-gray-600">Email</th>
                                    <th class="px-4 py-2 text-left text-gray-600">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-4 py-2">{{ $users->firstItem() + $key }}</td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">
                                        <a href="/users-update/{{ $user->id }}"
                                            class="text-blue-500 hover:underline cursor-pointer" wire:navigate>Edit</a>
                                        <a wire:click="deleteUser({{ $user->id }})"
                                            class="text-red-500 hover:underline ml-2 cursor-pointer">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination Links -->
                        <div class="mt-4">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--
</x-app-layout> --}}