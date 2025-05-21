<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Modifier la compétence</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <form method="POST" action="{{ route('skills.update', $skill) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <x-input-label for="name" :value="'Nom de la compétence'" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name', $skill->name) }}" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="level" :value="'Niveau (0-100)'" />
                        <input type="range" id="level" name="level" min="0" max="100" value="{{ old('level', $skill->level) }}" 
                               class="block mt-1 w-full" required
                               oninput="this.nextElementSibling.value = this.value">
                        <output class="text-gray-700 dark:text-gray-300">{{ old('level', $skill->level) }}%</output>
                        <x-input-error :messages="$errors->get('level')" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>Enregistrer</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 