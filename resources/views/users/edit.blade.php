<x-app-layout>
    <div class="max-w-2xl md:max-w-6xl px-4 sm:px-6 lg:px-8 mx-auto text-black dark:text-white">
        <!-- Card -->
        <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-gray-900">
            <div class=" mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-neutral-200">
                    Edit User
                </h2>

                <form action={{ route('users.update', $user->id) }} method="POST"
                    class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @csrf
                    @method('PUT')
                    <div>

                        <div
                            class="py-6 first:pt-0 last:pb-0 first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                            <label for="name" class="inline-block text-sm font-medium dark:text-white">
                                Name
                            </label>

                            <div class="mt-2 space-y-3">
                                <input id="name" type="text" name="name"
                                    class="py-2 px-3 pe-11 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="User Name" min="8" value="{{ old('name') ?? $user->name }}"
                                    required>

                            </div>

                            @error('name')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div
                            class="py-6 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                            <label for="email" class="inline-block text-sm font-medium dark:text-white">
                                Email
                            </label>

                            <div class="mt-2 space-y-3">
                                <input id="email" type="email" name="email"
                                    class="py-2 px-3 pe-11 block w-full border-gray-200 text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="User Email" value="{{ old('email') ?? $user->email }}" required>

                            </div>

                            @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div
                            class="py-6 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                            <label for="role" class="inline-block text-sm font-medium dark:text-white">
                                Role
                            </label>

                            <div class="mt-2 space-y-3">
                                <select name="role" value="{{ old('role') ?? $user->role }}" required
                                    class="py-2 px-3 pe-9 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                    <option value="" class="text-gray-200" disabled>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value={{ $role->name }} @selected($role->id == $user->roles->pluck('id')->first())>{{ $role->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            @error('role')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div
                            class="py-6 first:pt-0 last:pb-0  first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                            <label for="role" class="inline-block text-sm font-medium dark:text-white">
                                Permissions
                            </label>

                            <div class="grid grid-cols-2 gap-2 mt-2">
                                @foreach ($permissions as $permission)
                                    <div>
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"  @checked($user->permissions->contains('name', $permission->name))
                                            id="permission_{{ $permission->id }}"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                        <label class="ms-2 text-sm font-medium text-gray-700"
                                            for="permission_{{ $permission->id }}">{{ $permission->display_name }}</label>
                                    </div>
                                @endforeach
                            </div>

                            @error('permissions')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-x-2">
                            <button type="input"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                Save User
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
