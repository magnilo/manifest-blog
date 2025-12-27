<x-site-layout :title="$post->title">
    <!-- Hero / Header -->
    <div class="relative py-16 bg-white overflow-hidden">
         <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full pointer-events-none -z-10">
            <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-brand-50/50 rounded-full mix-blend-multiply filter blur-3xl opacity-60"></div>
        </div>

        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto">
                <h1>
                    <span class="block text-base text-center text-brand-600 font-semibold tracking-wide uppercase">{{ $post->category->name ?? 'Update' }}</span>
                    <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ $post->title }}</span>
                </h1>
                <div class="mt-6 flex items-center justify-center gap-4 text-gray-500 text-sm">
                    <div class="flex items-center gap-2">
                         @if($post->user->avatar)
                            <img class="h-6 w-6 rounded-full object-cover" src="{{ asset('storage/' . $post->user->avatar) }}" alt="">
                        @endif
                        <span>{{ $post->user->name }}</span>
                    </div>
                    <span>&bull;</span>
                    <time>{{ $post->created_at->format('M d, Y') }}</time>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Image -->
    @if($post->image)
        <div class="relative">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <img class="w-full h-auto rounded-3xl shadow-2xl object-cover max-h-[500px]" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            </div>
        </div>
    @endif

    <!-- Content -->
    <div class="relative px-4 sm:px-6 lg:px-8 py-16 bg-white">
        <div class="prose prose-lg prose-indigo mx-auto text-gray-500">
             {!! nl2br(e($post->content)) !!}
        </div>
        
        <div class="max-w-prose mx-auto mt-12 pt-8 border-t border-gray-100 text-center">
            <a href="{{ route('blog.index') }}" class="text-brand-600 hover:text-brand-700 font-medium">
                &larr; Back to all posts
            </a>
        </div>
    </div>
</x-site-layout>
