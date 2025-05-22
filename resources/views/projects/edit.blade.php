<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900">
                {{ __('Modifier le projet') }}
            </h2>
            
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg p-8 border border-gray-200 shadow">
                <form method="POST" action="{{ route('projects.update', $project) }}" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="space-y-2">
                        <x-input-label for="title" :value="__('Titre')" class="text-gray-700 text-lg font-medium" />
                        <x-text-input id="title" 
                                    name="title" 
                                    type="text" 
                                    class="mt-1 block w-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-md" 
                                    :value="old('title', $project->title)" 
                                    placeholder="Enter your project title"
                                    required 
                                    autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div class="space-y-2">
                        <x-input-label for="description" :value="__('Description')" class="text-gray-700 text-lg font-medium" />
                        <textarea id="description" 
                                name="description" 
                                class="mt-1 block w-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-md" 
                                rows="6" 
                                placeholder="Describe your project..."
                                required>{{ old('description', $project->description) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div class="flex items-center gap-4 pt-4">
                        <button type="submit" 
                                class="px-6 py-3 bg-green-500 hover:bg-green-600 text-gray-900 rounded-md transition-all duration-200 flex items-center gap-2 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            {{ __('Modifier') }}
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 