<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                {{ __('Ajouter un projet') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 dark:bg-[#161e2e]">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl p-8 border border-gray-200 dark:border-gray-700">
                <form method="POST" action="{{ route('projects.store') }}" class="space-y-8">
                    @csrf

                    <div class="space-y-2">
                        <x-input-label for="title" :value="__('Project Title')" class="text-gray-700 dark:text-gray-300 text-lg font-medium" />
                        <x-text-input id="title" 
                                    name="title" 
                                    type="text" 
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg" 
                                    :value="old('title')" 
                                    placeholder="Enter le titre du projet"
                                    required 
                                    autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div class="space-y-2">
                        <x-input-label for="description" :value="__('Description du projet')" class="text-gray-700 dark:text-gray-300 text-lg font-medium" />
                        <textarea id="description" 
                                name="description" 
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg" 
                                rows="6" 
                                placeholder="Describe your project..."
                                required>{{ old('description') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div class="flex items-center gap-4 pt-4">
                        <button type="submit" 
                                class="px-6 py-3 bg-green-500 hover:bg-green-600 text-gray-900 rounded-md transition-all duration-200 flex items-center gap-2 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            {{ __('Enregistrer') }}
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 