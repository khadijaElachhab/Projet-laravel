<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-900">
                {{ __('Mes Projets') }}
            </h2>
            <a href="{{ route('projects.create') }}" 
               class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-md transition-all duration-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                {{ __('Ajouter') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 rounded-md border border-green-200">
                    <p class="text-green-800 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        {{ session('success') }}
                    </p>
                </div>
            @endif

            @if($projects->count() > 0)
                <div class="grid grid-cols-1 gap-6 @if($projects->count() === 1) md:grid-cols-1 lg:grid-cols-1 @else md:grid-cols-2 lg:grid-cols-3 @endif justify-items-center">
                    @foreach($projects as $project)
                        <div class="bg-white rounded-lg p-6 border border-gray-200 shadow hover:border-yellow-400 transition-all duration-300 @if($projects->count() === 1) mx-auto @endif">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-bold text-gray-900 group-hover:text-yellow-700">{{ $project->title }}</h3>
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('projects.edit', $project) }}" 
                                       class="p-2 text-gray-500 hover:text-yellow-700 hover:bg-yellow-50 rounded-md transition-all duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-md transition-all duration-200"
                                                onclick="return confirm('Are you sure you want to delete this project?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                            <p class="text-gray-700 mb-4 text-sm leading-relaxed">{{ $project->description }}</p>
                            
                            <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                                <a href="{{ route('projects.show', $project) }}" 
                                   class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-md transition-all duration-200 text-sm font-medium">
                                    Voir plus détails
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-lg p-8 border border-gray-200 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Aucun projet</h3>
                    <p class="text-gray-700 mb-6">Inscrivez-vous pour commencer</p>
                    <a href="{{ route('projects.create') }}" 
                       class="inline-flex items-center px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-md transition-all duration-200 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        {{ __('Ajouter un projet') }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout> 