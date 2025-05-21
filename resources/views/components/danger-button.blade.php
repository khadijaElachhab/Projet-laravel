<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-900 via-purple-700 to-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:from-red-700 hover:to-purple-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
