<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                {{ $project->title }}
            </h2>
            <a href="{{ route('projects.index') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-all duration-200 flex items-center gap-2">
                Retour à la liste
            </a>
        </div>
    </x-slot>

    <div class="py-8 sm:px-6 lg:px-8 dark:bg-[#161e2e]">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-xl p-8 px-8 border border-gray-100 dark:border-gray-700 shadow">
            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-2">Description</h3>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ $project->description }}</p>
            </div>
            <div class="flex justify-between items-center mt-8">
                <span class="text-gray-500 dark:text-gray-400 text-sm">Créé le {{ $project->created_at->format('d/m/Y') }}</span>
                <a href="{{ route('projects.edit', $project) }}" class="px-4 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-900 dark:text-gray-100 rounded-lg transition-all duration-200 text-sm font-medium">Modifier</a>
            </div>
        </div>
    </div>
</x-app-layout> 