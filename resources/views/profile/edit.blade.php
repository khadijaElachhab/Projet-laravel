<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-2">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Carte 1 : Modifier nom/email -->
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-4 flex flex-col">
                    <h3 class="text-base font-semibold text-gray-800 dark:text-gray-100 mb-2">Update Profile</h3>
                    <form method="POST" action="{{ route('profile.update') }}" class="space-y-2">
                        @csrf
                        @method('PATCH')
                        <div>
                            <label for="name" class="block text-xs font-medium text-gray-700 dark:text-gray-200">Name</label>
                            <input id="name" name="name" type="text" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 text-xs px-2 py-1 focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                            @error('name')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-xs font-medium text-gray-700 dark:text-gray-200">Email</label>
                            <input id="email" name="email" type="email" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 text-xs px-2 py-1 focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('email', auth()->user()->email) }}" required>
                            @error('email')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="username" class="block text-xs font-medium text-gray-700 dark:text-gray-200">Username</label>
                            <input id="username" name="username" type="text" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 text-xs px-2 py-1 focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('username', auth()->user()->username) }}" required>
                            @error('username')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Title Field --}}
                        <div>
                            <label for="title" class="block text-xs font-medium text-gray-700 dark:text-gray-200">Title / Job Title</label>
                            <input id="title" name="title" type="text" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 text-xs px-2 py-1 focus:border-indigo-500 focus:ring-indigo-500" value="{{ old('title', auth()->user()->title) }}">
                            @error('title')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Bio Field --}}
                        <div>
                            <label for="bio" class="block text-xs font-medium text-gray-700 dark:text-gray-200">Bio</label>
                            <textarea id="bio" name="bio" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 text-xs px-2 py-1 focus:border-indigo-500 focus:ring-indigo-500">{{ old('bio', auth()->user()->bio) }}</textarea>
                            @error('bio')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex items-center gap-2 mt-2">
                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-indigo-600 dark:bg-indigo-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-800 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-700 disabled:opacity-25 transition">Save</button>
                        </div>
                    </form>
                </div>

                <!-- Carte 2 : Changer le mot de passe -->
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-4 flex flex-col">
                    <h3 class="text-base font-semibold text-gray-800 dark:text-gray-100 mb-2">Change Password</h3>
                    <form method="POST" action="{{ route('profile.password') }}" class="space-y-2">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="current_password" class="block text-xs font-medium text-gray-700 dark:text-gray-200">Current Password</label>
                            <input id="current_password" name="current_password" type="password" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 text-xs px-2 py-1 focus:border-indigo-500 focus:ring-indigo-500">
                            @error('current_password')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block text-xs font-medium text-gray-700 dark:text-gray-200">New Password</label>
                            <input id="password" name="password" type="password" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 text-xs px-2 py-1 focus:border-indigo-500 focus:ring-indigo-500">
                            @error('password')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-xs font-medium text-gray-700 dark:text-gray-200">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 text-xs px-2 py-1 focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div class="flex items-center gap-2 mt-2">
                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-indigo-600 dark:bg-indigo-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-800 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-700 disabled:opacity-25 transition">Change</button>
                        </div>
                    </form>
                </div>

                <!-- Carte 3 : Supprimer le compte -->
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-4 flex flex-col">
                    <h3 class="text-base font-semibold text-red-600 dark:text-red-400 mb-2">Delete Account</h3>
                    <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');" class="space-y-2">
                        @csrf
                        @method('DELETE')
                        <div>
                            <label for="delete_password" class="block text-xs font-medium text-gray-700 dark:text-gray-200 mb-1">Confirm Password</label>
                            <input id="delete_password" name="password" type="password" class="block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 text-xs px-2 py-1 focus:border-red-500 focus:ring-red-500" required>
                            @error('userDeletion.password')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <p class="text-gray-700 dark:text-gray-300 text-xs">Once your account is deleted, all of its resources and data will be permanently deleted. Please be certain.</p>
                        <div class="flex items-center gap-2 mt-2">
                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-600 dark:bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-800 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-700 disabled:opacity-25 transition">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
