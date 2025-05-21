<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profil de {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- User Info Section --}}
            <div class="glass-card bg-white dark:bg-gray-800 dark:bg-gradient-to-br dark:from-purple-800/20 dark:to-indigo-900/20 backdrop-filter backdrop-blur-lg border border-gray-200 dark:border-white/10 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $user->name }}</h3>
                @if($user->title)
                    <p class="text-lg text-gray-700 dark:text-gray-300 mb-4">{{ $user->title }}</p>
                @endif
                <p class="text-gray-800 dark:text-gray-200 leading-relaxed">{{ $user->bio }}</p>
            </div>

            {{-- Projects and Skills Section --}}
            <div class="glass-card bg-white dark:bg-gray-800 dark:bg-gradient-to-br dark:from-purple-800/20 dark:to-indigo-900/20 backdrop-filter backdrop-blur-lg border border-gray-200 dark:border-white/10 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Projects Section --}}
                    <div>
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Projets</h4>
                        @if($user->projects->count() > 0)
                            <div class="space-y-4">
                                @foreach ($user->projects as $project)
                                    <div class="border-b border-gray-200 dark:border-white/10 pb-4 last:border-b-0">
                                        <h5 class="font-bold text-gray-900 dark:text-white">{{ $project->title }}</h5>
                                        @if($project->link)
                                            <a href="{{ $project->link }}" class="text-indigo-600 dark:text-indigo-400 text-sm hover:underline">{{ $project->link }}</a>
                                        @endif
                                        <p class="text-gray-700 dark:text-gray-300 text-sm mt-1">{{ $project->description }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-400 dark:text-gray-500 text-sm">Aucun projet à afficher.</p>
                        @endif
                    </div>

                    {{-- Skills Section --}}
                    <div>
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Compétences</h4>
                        @if($user->skills->count() > 0)
                            <div class="flex flex-wrap gap-3">
                                @foreach ($user->skills as $skill)
                                    <span class="bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 text-sm font-medium px-3 py-1 rounded-full">{{ $skill->name }} ({{ $skill->level }}%)</span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-400 dark:text-gray-500 text-sm">Aucune compétence à afficher.</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Download CV Button --}}
            <div class="text-center mt-8">
                <a href="{{ route('pdf.generate', $user->username) }}" class="glass-button bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-6 py-3 rounded-lg text-lg font-semibold shadow-lg hover:from-purple-700 hover:to-indigo-700 transition-all duration-300">
                    Télécharger mon CV
                </a>
            </div>
        </div>
    </div>
</x-app-layout> 