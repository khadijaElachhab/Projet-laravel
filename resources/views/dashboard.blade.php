<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
            <div class="space-y-0.5">
                <h2 class="font-bold text-xl text-gray-900 dark:text-gray-100 leading-tight tracking-tight">{{ Auth::user()->name }}</h2>
                @if(Auth::user()->title)
                    <div class="text-gray-700 dark:text-gray-300 text-base font-medium">{{ Auth::user()->title }}</div>
                @endif
            </div>
            @if(Auth::user()->username)
                <div class="flex gap-2 mt-2 md:mt-0">
                    <a href="{{ route('profile.show', Auth::user()->username) }}" 
                       class="inline-flex items-center px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm transition-all duration-200 shadow">
                        Profil public
                    </a>
                    <a href="{{ route('pdf.generate', Auth::user()->username) }}" 
                       class="inline-flex items-center px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-900 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-100 rounded-lg text-sm transition-all duration-200 shadow">
                        Télécharger mon CV
                    </a>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-4 dark:bg-[#161e2e] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Statistiques -->
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4 flex flex-col items-center shadow border border-gray-100 dark:border-gray-700 min-h-[180px] justify-center">
                    <div class="flex items-center gap-2 mb-1">
                        <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 014-4h4a4 4 0 014 4v2" /></svg>
                        <span class="text-2xl font-extrabold text-gray-900 dark:text-gray-100">{{ $projects->count() }}</span>
                    </div>
                    <div class="text-gray-700 dark:text-gray-300 text-sm font-medium">Projets</div>
                    <a href="{{ route('projects.index') }}" class="mt-2 px-3 py-1 bg-indigo-50 hover:bg-indigo-100 dark:bg-indigo-900 dark:hover:bg-indigo-800 rounded-lg transition-colors duration-200 text-indigo-700 dark:text-indigo-300 text-xs font-medium">Voir tous</a>
                </div>
                <!-- Projets récents -->
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow border border-gray-100 dark:border-gray-700 min-h-[180px] flex flex-col">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">Projets récents</h3>
                        <a href="{{ route('projects.create') }}" class="px-3 py-1 bg-indigo-600 hover:bg-indigo-700 rounded-lg text-white text-xs font-medium">Ajouter</a>
                    </div>
                    @if($projects->count() > 0)
                        <div class="space-y-2">
                            @foreach($projects->sortByDesc('created_at')->take(3) as $project)
                                <div class="bg-gray-50 dark:bg-gray-900 rounded p-2 flex flex-col border border-gray-100 dark:border-gray-700">
                                    <div class="flex justify-between items-center">
                                        <span class="font-semibold text-gray-900 dark:text-gray-100 text-sm">{{ $project->title }}</span>
                                        <a href="{{ route('projects.show', $project) }}" class="text-indigo-600 dark:text-indigo-300 hover:underline text-xs">Détails</a>
                                    </div>
                                    <span class="text-gray-500 dark:text-gray-400 text-xs">{{ $project->created_at->format('d/m/Y') }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-400 dark:text-gray-500 text-xs text-center py-4">Aucun projet</p>
                    @endif
                </div>
                <!-- Compétences -->
                <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow border border-gray-100 dark:border-gray-700 min-h-[180px] flex flex-col">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">Compétences</h3>
                        <a href="{{ route('skills.create') }}" class="px-3 py-1 bg-green-600 hover:bg-green-700 rounded-lg text-white text-xs font-medium">Ajouter</a>
                    </div>
                    @if($skills->count() > 0)
                        <div class="space-y-2">
                            @foreach($skills->sortByDesc('level')->take(3) as $skill)
                                <div class="bg-green-50 dark:bg-green-900 rounded p-2 flex flex-col border border-green-100 dark:border-green-800">
                                    <div class="flex justify-between items-center">
                                        <span class="text-green-900 dark:text-green-200 font-semibold text-sm">{{ $skill->name }}</span>
                                        <span class="text-green-700 dark:text-green-300 text-xs font-medium">{{ $skill->level }}%</span>
                                    </div>
                                    <div class="w-full bg-green-100 dark:bg-green-800 rounded-full h-1 mt-1">
                                        <div class="bg-gradient-to-r from-green-400 to-green-600 dark:from-green-500 dark:to-green-300 h-1 rounded-full" style="width: {{ $skill->level }}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-400 dark:text-gray-500 text-xs text-center py-4">Aucune compétence</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
