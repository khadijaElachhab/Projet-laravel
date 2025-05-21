<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                {{ __('Edit Project') }}
            </h2>
            <a href="{{ route('projects.index') }}" 
               class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-all duration-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                {{ __('Back to Projects') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 dark:bg-[#161e2e]">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl p-8 border border-gray-200 dark:border-gray-700">
                <form method="POST" action="{{ route('projects.update', $project) }}" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <div class="space-y-2">
                        <x-input-label for="title" :value="__('Project Title')" class="text-gray-700 dark:text-gray-300 text-lg font-medium" />
                        <x-text-input id="title" 
                                    name="title" 
                                    type="text" 
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg" 
                                    :value="old('title', $project->title)" 
                                    placeholder="Enter your project title"
                                    required 
                                    autofocus />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div class="space-y-2">
                        <x-input-label for="description" :value="__('Project Description')" class="text-gray-700 dark:text-gray-300 text-lg font-medium" />
                        <textarea id="description" 
                                name="description" 
                                class="mt-1 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg" 
                                rows="6" 
                                placeholder="Describe your project..."
                                required>{{ old('description', $project->description) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div class="flex items-center gap-4 pt-4">
                        <button type="submit" 
                                class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-all duration-200 flex items-center gap-2 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            {{ __('Update Project') }}
                        </button>
                        <a href="{{ route('projects.index') }}" 
                           class="px-6 py-3 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg transition-all duration-200 font-medium">
                            {{ __('Cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 