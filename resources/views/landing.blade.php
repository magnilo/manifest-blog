
<x-site-layout :title="'Home'">
  <!-- Hero Section -->
  <div class="relative pt-20 pb-32 flex flex-col items-center text-center">
    
    <!-- Decorative Blobs -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-10 left-1/4 w-96 h-96 bg-brand-200/50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        <div class="absolute top-10 right-1/4 w-96 h-96 bg-secondary-200/50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-1/3 w-96 h-96 bg-pink-200/50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-600 text-xs font-semibold uppercase tracking-wide mb-8">
        <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
        Laravel Starter Kit v1.0
    </div>

    <h1 class="max-w-4xl mx-auto text-5xl md:text-7xl font-extrabold tracking-tight text-slate-900 leading-tight mb-6">
      Bangun Ide Besarmu <br class="hidden md:block" />
      <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 via-secondary-500 to-brand-600 bg-300% animate-gradient">
        Lebih Cepat & Elegan
      </span>
    </h1>
    
    <p class="max-w-2xl mx-auto text-lg md:text-xl text-gray-500 mb-10 leading-relaxed">
      Template starter pack lengkap dengan autentikasi, dashboard, dan desain premium berbasis Tailwind CSS. Fokus pada kodemu, bukan setup awal.
    </p>

    <div class="flex flex-col sm:flex-row items-center gap-4">
      @auth
        <a href="{{ route('dashboard') }}" 
           class="px-8 py-4 rounded-full bg-slate-900 text-white font-bold text-lg hover:bg-slate-800 transition shadow-xl hover:shadow-2xl hover:-translate-y-1 transform duration-300">
           Masuk Dashboard
        </a>
      @else
        <a href="{{ route('register') }}" 
           class="px-8 py-4 rounded-full bg-gradient-to-r from-brand-600 to-secondary-600 text-white font-bold text-lg hover:opacity-90 transition shadow-xl shadow-brand-500/30 hover:shadow-brand-500/50 hover:-translate-y-1 transform duration-300">
           Mulai Sekarang
        </a>
        <a href="{{ route('login') }}" 
           class="px-8 py-4 rounded-full bg-white text-slate-700 border border-gray-200 font-bold text-lg hover:bg-gray-50 transition shadow-sm hover:shadow-md">
           Login
        </a>
      @endauth
    </div>
  </div>

  <!-- Features Section -->
  <div class="py-24 bg-brand-50/30 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-white -skew-x-12 z-0 opacity-50"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="text-center mb-16">
        <h2 class="text-base font-semibold text-brand-600 uppercase tracking-wide">Features</h2>
        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-slate-900 sm:text-4xl">
          Everything you need to build faster
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Feature 1 -->
        <div class="group p-8 bg-surface-50 rounded-3xl border border-brand-100 hover:border-brand-200 hover:shadow-xl hover:shadow-brand-500/10 transition-all duration-300">
            <div class="w-14 h-14 bg-brand-100 rounded-2xl flex items-center justify-center text-brand-600 mb-6 group-hover:scale-110 transition-transform duration-300">
          <svg class="w-7 h-7 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
        </div>
        <h3 class="text-xl font-bold text-slate-900 mb-3">Autentikasi Lengkap</h3>
        <p class="text-gray-500 leading-relaxed">
            Sistem login, register, dan reset password sudah siap pakai. Dibangun di atas Laravel Breeze yang aman.
        </p>
      </div>

      <!-- Card 2 -->
      <div class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-xl shadow-gray-200/50 hover:shadow-2xl hover:shadow-brand-500/10 transition-all duration-300 hover:-translate-y-1">
        <div class="w-14 h-14 rounded-2xl bg-secondary-50 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
           <svg class="w-7 h-7 text-secondary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" /></svg>
        </div>
        <h3 class="text-xl font-bold text-slate-900 mb-3">UI Premium</h3>
        <p class="text-gray-500 leading-relaxed">
            Desain modern dengan font Google "Outfit", warna custom, dan komponen yang responsif di semua perangkat.
        </p>
      </div>

      <!-- Card 3 -->
      <div class="group p-8 rounded-3xl bg-white border border-gray-100 shadow-xl shadow-gray-200/50 hover:shadow-2xl hover:shadow-brand-500/10 transition-all duration-300 hover:-translate-y-1">
        <div class="w-14 h-14 rounded-2xl bg-pink-50 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
           <svg class="w-7 h-7 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
        </div>
        <h3 class="text-xl font-bold text-slate-900 mb-3">Siap Produksi</h3>
        <p class="text-gray-500 leading-relaxed">
            Struktur kode bersih, routing yang terorganisir, dan konfigurasi aset yang sudah dioptimalkan.
        </p>
      </div>
    </div>
  </div>

  <style>
    @keyframes blob {
      0% { transform: translate(0px, 0px) scale(1); }
      33% { transform: translate(30px, -50px) scale(1.1); }
      66% { transform: translate(-20px, 20px) scale(0.9); }
      100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
      animation: blob 7s infinite;
    }
    .animation-delay-2000 {
      animation-delay: 2s;
    }
    .animation-delay-4000 {
      animation-delay: 4s;
    }
  </style>
</x-site-layout>
