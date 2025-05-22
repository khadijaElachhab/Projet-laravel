<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Profil') }}
        </h2>
    </x-slot>

    <div class="py-6 bg-gray-100">
        <div class="max-w-7xl mx-auto px-2">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Carte 1 : Modifier nom/email -->
                <div class="bg-white shadow rounded-lg p-4 flex flex-col border border-gray-200">
                    <h3 class="text-base font-semibold text-gray-900 mb-2">Modifier le profil</h3>
                    <form method="POST" action="{{ route('profile.update') }}" class="space-y-2">
                        @csrf
                        @method('PATCH')
                        <div>
                            <label for="name" class="block text-xs font-medium text-gray-700">Nom</label>
                            <input id="name" name="name" type="text" class="mt-1 block w-full rounded-md border-yellow-200 text-xs px-2 py-1 focus:border-yellow-500 focus:ring-yellow-500" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                            @error('name')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-xs font-medium text-gray-700">Email</label>
                            <input id="email" name="email" type="email" class="mt-1 block w-full rounded-md border-yellow-200 text-xs px-2 py-1 focus:border-yellow-500 focus:ring-yellow-500" value="{{ old('email', auth()->user()->email) }}" required>
                            @error('email')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="username" class="block text-xs font-medium text-gray-700">Nom d'utilisateur</label>
                            <input id="username" name="username" type="text" class="mt-1 block w-full rounded-md border-yellow-200 text-xs px-2 py-1 focus:border-yellow-500 focus:ring-yellow-500" value="{{ old('username', auth()->user()->username) }}" required>
                            @error('username')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Title Field --}}
                        <div>
                            <label for="title" class="block text-xs font-medium text-gray-700">Titre</label>
                            <input id="title" name="title" type="text" class="mt-1 block w-full rounded-md border-yellow-200 text-xs px-2 py-1 focus:border-yellow-500 focus:ring-yellow-500" value="{{ old('title', auth()->user()->title) }}">
                            @error('title')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Bio Field --}}
                        <div>
                            <label for="bio" class="block text-xs font-medium text-gray-700">Bio</label>
                            <textarea id="bio" name="bio" class="mt-1 block w-full rounded-md border-yellow-200 text-xs px-2 py-1 focus:border-yellow-500 focus:ring-yellow-500">{{ old('bio', auth()->user()->bio) }}</textarea>
                            @error('bio')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex items-center gap-2 mt-2">
                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-yellow-600 focus:outline-none focus:border-yellow-700 focus:ring focus:ring-yellow-200 active:bg-yellow-700 disabled:opacity-25 transition">Enregistrer</button>
                        </div>
                    </form>
                </div>

                <!-- Carte 2 : Changer le mot de passe -->
                <div class="bg-white shadow rounded-lg p-4 flex flex-col border border-gray-200">
                    <h3 class="text-base font-semibold text-gray-900 mb-2">Changer  le mot de passe</h3>
                    <form method="POST" action="{{ route('profile.password') }}" class="space-y-2">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="current_password" class="block text-xs font-medium text-gray-700">Mot de passe actuel</label>
                            <input id="current_password" name="current_password" type="password" class="mt-1 block w-full rounded-md border-yellow-200 text-xs px-2 py-1 focus:border-green-500 focus:ring-green-500">
                            @error('current_password')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block text-xs font-medium text-gray-700">Nouveau mot de passe</label>
                            <input id="password" name="password" type="password" class="mt-1 block w-full rounded-md border-yellow-200 text-xs px-2 py-1 focus:border-green-500 focus:ring-green-500">
                            @error('password')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-xs font-medium text-gray-700">Confirmer le mot de passe</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-md border-yellow-200 text-xs px-2 py-1 focus:border-green-500 focus:ring-green-500">
                        </div>
                        <div class="flex items-center gap-2 mt-2">
         
                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-yellow-600 focus:outline-none focus:border-yellow-700 focus:ring focus:ring-yellow-200 active:bg-yellow-700 disabled:opacity-25 transition">Changer</button>
                        </div>
                    </form>
                </div>

                <!-- Carte 3 : Supprimer le compte -->
                <div class="bg-white shadow rounded-lg p-4 flex flex-col border border-gray-200">
                    <h3 class="text-base font-semibold text-red-600 mb-2">Supprimer le compte</h3>
                    <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');" class="space-y-2">
                        @csrf
                        @method('DELETE')
                        <div>
                            <label for="delete_password" class="block text-xs font-medium text-gray-700 mb-1">Le mot de passe</label>
                            <input id="delete_password" name="password" type="password" class="block w-full rounded-md border-yellow-200 text-xs px-2 py-1 focus:border-red-500 focus:ring-red-500" required>
                            @error('userDeletion.password')
                                <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex items-center gap-2 mt-2">
                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-700 disabled:opacity-25 transition">Supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
