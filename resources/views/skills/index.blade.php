<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                {{ __('Skills') }}
            </h2>
            <a href="{{ route('skills.create') }}" class="glass-button px-4 py-2 rounded-md">
                {{ __('Add Skill') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($skills->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($skills as $skill)
                        <div class="glass-card p-6 glass-card-hover">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $skill->name }}</h3>
                                <span class="text-gray-700 dark:text-white">{{ $skill->level }}%</span>
                            </div>
                            
                            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4">
                                <div class="bg-indigo-500 h-2.5 rounded-full" style="width: {{ $skill->level }}%"></div>
                            </div>

                            <div class="flex justify-between items-center">
                                <span class="text-gray-500 dark:text-gray-400 text-sm">{{ $skill->created_at->format('M d, Y') }}</span>
                                <div class="flex gap-2">
                                    <a href="{{ route('skills.edit', $skill) }}" class="glass-button px-3 py-1 text-sm rounded-md text-gray-900 dark:text-gray-100">
                                        Edit
                                    </a>
                                    <form action="{{ route('skills.destroy', $skill) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="glass-button px-3 py-1 text-sm rounded-md text-gray-900 dark:text-gray-100" onclick="return confirm('Are you sure you want to delete this skill?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="glass-card p-6 text-center">
                    <p class="text-gray-700 dark:text-gray-300 mb-4">No skills yet. Start by adding your first skill!</p>
                    <a href="{{ route('skills.create') }}" class="glass-button px-4 py-2 rounded-md inline-block text-gray-900 dark:text-white">
                        {{ __('Add Your First Skill') }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout> 