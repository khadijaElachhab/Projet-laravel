<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                {{ __('Compétences') }}
            </h2>
            <a href="{{ route('skills.create') }}" class="glass-button px-4 py-2 rounded-md">
                {{ __('Ajouter') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($skills->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($skills as $skill)
                        <div class="bg-gray-100 rounded-md p-4 border border-gray-300 shadow-sm">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-semibold text-gray-900">{{ $skill->name }}</h3>
                            </div>
                           
                            <div class="flex justify-between items-center text-sm">
                                <div class="flex gap-2">
                                    <a href="{{ route('skills.edit', $skill) }}" class="px-3 py-1 text-sm rounded-md bg-yellow-500 hover:bg-yellow-600 text-gray-900">
                                        Modifier
                                    </a>
                                    <form action="{{ route('skills.destroy', $skill) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 text-sm rounded-md bg-red-500 hover:bg-red-600 text-gray-900" onclick="return confirm('Are you sure you want to delete this skill?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="glass-card p-6 text-center">
                    <p class="text-gray-700 dark:text-gray-300 mb-4">Aucune compétence</p>
                    <a href="{{ route('skills.create') }}" class="glass-button px-4 py-2 rounded-md inline-block text-gray-900 dark:text-white">
                        {{ __('Ajouter une compétence') }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout> 