<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <!-- Title, Search Box, and Add Button -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-900">{{ __('user.title') }}</h2>

                <div class="flex items-center space-x-2">
                    <!-- Search Input -->
                    <input type="text" wire:model.live.debounce="searchText"
                        placeholder="{{__('user.table.search_title')}}"
                        class="px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

                    <!-- Add Button -->
                    <a href="/users-create" wire:navigate
                        class="bg-blue-500 text-white px-4 py-2 rounded-md flex items-center hover:bg-blue-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ __('user.add_user_btn') }}
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300 bg-white shadow-md rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="px-4 py-2 text-left text-gray-600">{{ __('user.table.id') }}</th>
                            <th class="px-4 py-2 text-left text-gray-600">{{ __('user.table.name') }}</th>
                            <th class="px-4 py-2 text-left text-gray-600">{{ __('user.table.email') }}</th>
                            <th class="px-4 py-2 text-left text-gray-600">{{ __('user.table.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                        <tr class="border-b hover:bg-gray-50" wire:key="{{ $key }}">
                            <td class="px-4 py-2">{{ $roles->firstItem() + $key }}</td>
                            <td class="px-4 py-2">{{ $role->name }}</td>
                            <td class="px-4 py-2">{!! __showPermissionsName($role->permissions) !!}</td>
                            <td class="px-4 py-2">
                                <a href="/users-update/{{ $role->id }}"
                                    class="text-blue-500 hover:underline cursor-pointer"
                                    wire:navigate>{{__('user.table.edit_title')}}</a>
                                <a wire:click="deleteUser({{ $role->id }})"
                                    wire:confirm="Are you sure you want to delete?"
                                    class="text-red-500 hover:underline ml-2 cursor-pointer">{{__('user.table.delete_title')}}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
