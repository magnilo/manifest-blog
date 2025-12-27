<x-site-layout title="About Us">
    <div class="relative overflow-hidden pt-16 pb-20 lg:pt-24 lg:pb-28">
        <!-- Decorative Background -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none -z-10">
            <div class="absolute top-[-10%] right-[-10%] w-[600px] h-[600px] bg-brand-100/50 rounded-full mix-blend-multiply filter blur-3xl opacity-60 animate-blob"></div>
            <div class="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] bg-secondary-100/50 rounded-full mix-blend-multiply filter blur-3xl opacity-60 animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mx-auto max-w-3xl">
                <h1 class="text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl md:text-6xl mb-6">
                    We are <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-secondary-600">Manifest</span>.
                </h1>
                <p class="mt-4 text-xl text-gray-500 leading-relaxed">
                    A creative team dedicated to building digital experiences that matter. We combine modern technology with stunning design to bring ideas to life.
                </p>
            </div>

            <!-- Mission Section -->
            <div class="mt-20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-tr from-brand-600 to-secondary-600 rounded-3xl transform rotate-3 opacity-20"></div>
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Team working" class="relative rounded-3xl shadow-2xl transform -rotate-2 hover:rotate-0 transition duration-500 object-cover h-96 w-full">
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-slate-900 mb-6">Our Mission</h2>
                        <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                            We believe that great software shouldn't just function—it should inspire. Our mission is to democratize premium web design and powerful functionality, making it accessible to creators and businesses everywhere.
                        </p>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            Founded in 2024, Manifest has grown from a small side project into a comprehensive platform for modern web development.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-24">
                <h2 class="text-3xl font-bold text-center text-slate-900 mb-12">Meet the Team</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Team Member 1 -->
                    <div class="bg-white/60 backdrop-blur-lg rounded-2xl p-6 border border-white/50 shadow-lg text-center group hover:bg-white/80 transition">
                        <div class="w-24 h-24 mx-auto bg-brand-100 rounded-full flex items-center justify-center mb-4 text-brand-600 text-2xl font-bold group-hover:scale-110 transition-transform">
                            A
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">Alex Doe</h3>
                        <p class="text-brand-600 font-medium mb-3">Lead Designer</p>
                        <p class="text-gray-500 text-sm">Obsessed with pixels, gradients, and user interfaces that feel like magic.</p>
                    </div>

                    <!-- Team Member 2 -->
                    <div class="bg-white/60 backdrop-blur-lg rounded-2xl p-6 border border-white/50 shadow-lg text-center group hover:bg-white/80 transition">
                        <div class="w-24 h-24 mx-auto bg-secondary-100 rounded-full flex items-center justify-center mb-4 text-secondary-600 text-2xl font-bold group-hover:scale-110 transition-transform">
                            J
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">Jane Smith</h3>
                        <p class="text-secondary-600 font-medium mb-3">Senior Developer</p>
                        <p class="text-gray-500 text-sm">Architecting robust systems and writing clean, scalable code.</p>
                    </div>

                    <!-- Team Member 3 -->
                    <div class="bg-white/60 backdrop-blur-lg rounded-2xl p-6 border border-white/50 shadow-lg text-center group hover:bg-white/80 transition">
                         <div class="w-24 h-24 mx-auto bg-purple-100 rounded-full flex items-center justify-center mb-4 text-purple-600 text-2xl font-bold group-hover:scale-110 transition-transform">
                            M
                        </div>
                        <h3 class="text-xl font-bold text-slate-900">Mike Ross</h3>
                        <p class="text-purple-600 font-medium mb-3">Product Manager</p>
                        <p class="text-gray-500 text-sm">Ensuring we deliver the right features to the right people at the right time.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>
