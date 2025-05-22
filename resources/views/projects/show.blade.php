<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900">
                {{ $project->title }}
            </h2>
            
        </div>
    </x-slot>

    <div class="py-8 sm:px-6 lg:px-8 bg-gray-100">
        <div class="max-w-2xl mx-auto bg-white rounded-lg p-8 px-8 border border-gray-200 shadow">
            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Description</h3>
                <p class="text-gray-700 leading-relaxed">{{ $project->description }}</p>
            </div>
            <div class="flex justify-between items-center mt-8">
                <span class="text-gray-500 text-sm">Créé le {{ $project->created_at->format('d/m/Y') }}</span>
                <a href="{{ route('projects.edit', $project) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-md transition-all duration-200 text-sm font-medium">Modifier</a>
            </div>
        </div>
    </div>
</x-app-layout> 