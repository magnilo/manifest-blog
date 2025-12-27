<x-site-layout title="Contact Us">
    <div class="relative overflow-hidden pt-16 pb-20 lg:pt-24 lg:pb-28">
         <!-- Decorative Blobs -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none -z-10">
            <div class="absolute top-20 right-0 w-[500px] h-[500px] bg-brand-200/30 rounded-full mix-blend-multiply filter blur-3xl opacity-60 animate-blob"></div>
            <div class="absolute top-40 left-0 w-[500px] h-[500px] bg-secondary-200/30 rounded-full mix-blend-multiply filter blur-3xl opacity-60 animate-blob animation-delay-2000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl md:text-6xl mb-4">
                    Get in <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-secondary-600">Touch</span>
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
                    Have questions or want to work together? We'd love to hear from you.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
                <!-- Contact Info -->
                <div class="space-y-8 mt-4">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 flex items-center justify-center w-12 h-12 rounded-2xl bg-brand-100 text-brand-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Email Us</h3>
                            <p class="mt-1 text-gray-500">just.storage00@gmail.com</p>
                            <p class="text-gray-500">support@manifest.com</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 flex items-center justify-center w-12 h-12 rounded-2xl bg-secondary-100 text-secondary-600">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Visit Us</h3>
                            <p class="mt-1 text-gray-500">123 Creative Studio, Design Street</p>
                            <p class="text-gray-500">Jakarta, Indonesia</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl shadow-gray-200/50 border border-white/50 p-8 sm:p-10">
                    <form method="post" action="{{ route('contact.submit') }}" class="space-y-6">
                        @csrf
                        
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-white/50" placeholder="Your Name" required />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-white/50" placeholder="you@example.com" required />
                        </div>

                        <div>
                            <x-input-label for="message" :value="__('Message')" />
                            <textarea name="message" id="message" rows="4" class="mt-1 block w-full border-gray-200 focus:border-brand-500 focus:ring-brand-500 rounded-xl shadow-sm px-4 py-3 placeholder-gray-400 bg-white/50" placeholder="Tell us about your project..."></textarea>
                        </div>

                        <button type="submit" class="w-full inline-flex justify-center items-center px-6 py-4 bg-gradient-to-r from-brand-600 to-secondary-600 border border-transparent rounded-xl font-bold text-white tracking-widest hover:opacity-90 active:opacity-100 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-brand-500/30">
                            Send Message
                        </button>

                         @if (session('ok'))
                            <div class="mt-4 p-4 rounded-xl bg-green-50 text-green-700 text-sm font-medium flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                {{ session('ok') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>
