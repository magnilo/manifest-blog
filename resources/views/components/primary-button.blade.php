<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-brand-600 border border-transparent rounded-full font-bold text-xs text-white uppercase tracking-widest hover:bg-brand-700 active:bg-brand-800 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-brand-500/30 hover:shadow-brand-500/50']) }}>
    {{ $slot }}
</button>
