<x-site-layout title="Blog">
    <div class="relative pt-16 pb-20 lg:pt-24 lg:pb-28 bg-white overflow-hidden">
        <!-- Decorative Background -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none -z-10">
            <div class="absolute top-[-10%] right-[-10%] w-[600px] h-[600px] bg-brand-100/40 rounded-full mix-blend-multiply filter blur-3xl opacity-60 animate-blob"></div>
            <div class="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] bg-secondary-100/40 rounded-full mix-blend-multiply filter blur-3xl opacity-60 animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-slate-900 sm:text-4xl">
                    Latest from the <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-secondary-600">Blog</span>
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Insights, tutorials, and news from the Manifest team.
                </p>
            </div>

                @forelse($posts as $post)
                    <div class="flex flex-col rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl hover:shadow-brand-500/20 hover:-translate-y-1 transition-all duration-300 bg-white border border-gray-100 hover:border-brand-200 group">
                        <div class="flex-shrink-0 relative">
                            @if($post->image)
                                <img class="h-48 w-full object-cover" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                            @else
                                <div class="h-48 w-full bg-gradient-to-br from-brand-100 to-secondary-100 flex items-center justify-center">
                                    <svg class="h-12 w-12 text-brand-300" fill="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-brand-600">
                                    {{ $post->category->name ?? 'Article' }}
                                </p>
                                <a href="{{ route('blog.show', $post) }}" class="block mt-2">
                                    <p class="text-xl font-semibold text-slate-900 hover:text-brand-600 transition-colors">
                                        {{ $post->title }}
                                    </p>
                                    <p class="mt-3 text-base text-gray-500 line-clamp-3">
                                        {{ Str::limit(strip_tags($post->content), 100) }}
                                    </p>
                                </a>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="sr-only">{{ $post->user->name }}</span>
                                    @if($post->user->avatar)
                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . $post->user->avatar) }}" alt="">
                                    @else
                                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 font-bold">
                                            {{ substr($post->user->name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-slate-900">
                                        {{ $post->user->name }}
                                    </p>
                                    <div class="flex space-x-1 text-sm text-gray-500">
                                        <time datetime="{{ $post->created_at->format('Y-m-d') }}">
                                            {{ $post->created_at->format('M d, Y') }}
                                        </time>
                                        <span aria-hidden="true">&middot;</span>
                                        <span>{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No posts yet</h3>
                        <p class="mt-1 text-sm text-gray-500">Check back soon for new content.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-site-layout>
