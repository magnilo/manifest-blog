<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <link rel="icon" href="{{ asset('logo.svg') }}" type="image/svg+xml">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>{{ isset($title) ? $title . ' - Manifest' : 'Manifest' }}</title>
</head>
<body class="font-sans antialiased bg-gradient-to-br from-brand-50/50 via-white to-secondary-50/50 text-slate-900 selection:bg-brand-500 selection:text-white">
  <header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 w-full bg-white/80 backdrop-blur-md border-b border-gray-100/50">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
      <a href="{{ url('/') }}" class="flex items-center gap-2 group">
        <img src="{{ asset('logo.svg') }}" alt="Logo" class="w-8 h-8 rounded-lg shadow-md group-hover:scale-110 transition-transform duration-300">
        <span class="font-extrabold text-2xl tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-secondary-600 group-hover:opacity-80 transition">
          Manifest<span class="text-brand-600">.</span>
        </span>
      </a>

      <nav class="hidden md:flex items-center gap-8 font-medium text-sm text-gray-600">
        <a class="hover:text-brand-600 transition-colors" href="{{ route('blog.index') }}">Blog</a>
        <a class="hover:text-brand-600 transition-colors" href="{{ route('about') }}">About</a>
        <a class="hover:text-brand-600 transition-colors" href="{{ route('contact') }}">Contact</a>

        <div class="flex items-center gap-3 pl-4 border-l border-gray-200">
          @auth
            <a class="px-5 py-2.5 rounded-full bg-brand-600 text-white hover:bg-brand-700 transition shadow-lg shadow-brand-500/30 text-xs font-bold uppercase tracking-wide"
               href="{{ route('dashboard') }}">Dashboard</a>
          @else
            <a class="hover:text-brand-600 transition-colors" href="{{ route('login') }}">Log in</a>
            <a class="px-5 py-2.5 rounded-full bg-brand-600 text-white hover:bg-brand-700 transition shadow-lg shadow-brand-500/30 text-xs font-bold uppercase tracking-wide"
               href="{{ route('register') }}">Start Now</a>
          @endauth
        </div>
      </nav>
      
      <!-- Mobile menu button (simple implementation) -->
      <button class="md:hidden p-2 text-gray-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
      </button>
    </div>
  </header>

  <main class="min-h-screen">
    {{ $slot }}
  </main>

  <footer class="bg-white border-t border-gray-200 mt-auto">
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-1">
                    <a href="/" class="flex items-center gap-2 mb-4">
                        <img src="{{ asset('logo.svg') }}" alt="Logo" class="w-8 h-8 rounded-lg">
                        <span class="font-bold text-xl tracking-tight text-slate-900">
                            Manifest<span class="text-brand-600">.</span>
                        </span>
                    </a>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Empowering creators with modern tools and stunning designs. Built for the future of web development.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-semibold text-slate-900 mb-4">Company</h3>
                    <ul class="space-y-3 text-sm text-gray-500">
                        <li><a href="{{ route('about') }}" class="hover:text-brand-600 transition">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-brand-600 transition">Contact</a></li>
                        <li><a href="#" class="hover:text-brand-600 transition">Careers</a></li>
                        <li><a href="#" class="hover:text-brand-600 transition">Partners</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div>
                    <h3 class="font-semibold text-slate-900 mb-4">Resources</h3>
                    <ul class="space-y-3 text-sm text-gray-500">
                        <li><a href="#" class="hover:text-brand-600 transition">Blog</a></li>
                        <li><a href="#" class="hover:text-brand-600 transition">Documentation</a></li>
                        <li><a href="#" class="hover:text-brand-600 transition">Community</a></li>
                        <li><a href="#" class="hover:text-brand-600 transition">Help Center</a></li>
                    </ul>
                </div>

                <!-- Newsletter (Placeholder) -->
                <div>
                    <h3 class="font-semibold text-slate-900 mb-4">Stay Updated</h3>
                    <p class="text-sm text-gray-500 mb-4">Subscribe to our newsletter for the latest updates.</p>
                    <form class="flex gap-2">
                        <input type="email" placeholder="Enter email" class="w-full rounded-lg border-gray-200 text-sm focus:ring-brand-500 focus:border-brand-500">
                        <button type="button" class="bg-brand-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-brand-700 transition">
                            Go
                        </button>
                    </form>
                </div>
            </div>

            <div class="border-t border-gray-100 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-400">
                    &copy; {{ date('Y') }} Manifest. All rights reserved.
                </p>
                <div class="flex gap-6 text-gray-400">
                     <a href="#" class="hover:text-gray-600 transition"><span class="sr-only">Twitter</span><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg></a>
                     <a href="#" class="hover:text-gray-600 transition"><span class="sr-only">GitHub</span><svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"/></svg></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
