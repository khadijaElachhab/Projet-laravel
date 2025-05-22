<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    <div class="py-4 dark:bg-[#161e2e] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
            <div class="grid grid-cols-1 gap-4">
                <!-- Statistiques -->
                <div class="bg-white rounded-full p-4 flex flex-row items-center justify-between shadow border border-gray-100 min-h-[180px]">
                    <div class="flex items-center gap-2">
                        <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                        </svg>
                        <div>
                            <span class="text-2xl font-extrabold text-gray-900">{{ $projects->count() }}</span>
                            <div class="text-gray-700 text-sm font-medium">Projets</div>
                        </div>
                    </div>
                    <a href="{{ route('projects.index') }}" class="mt-2 px-3 py-1 bg-green-500 hover:bg-green-600 rounded-lg transition-colors duration-200 text-gray-900 hover:text-gray-700 text-xs font-medium">Voir</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
