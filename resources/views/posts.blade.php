<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-search :posts="$posts" :categoryAll="$categoryAll"></x-search>
        <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-4 lg:px-2 md:px-4">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                {{-- Ada yang namanya forelse jadi gak usah bikin if else lagi diluar loop --}}
            @forelse ($posts as $post)    
                <article class="flex flex-col justify-between p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        {{-- Okay jadi di tailwind ini gak bisa kita bikin class dinamis harus didaftarin dulu di list pada config --}}
                        {{-- Ini kita ganti dari categories ke posts dan kirimkan categoriesnya --}}
                    <a href="/posts?category={{ $post->category->slug }}" class="bg-{{ $post->category->color }}-100 text-{{ $post->category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800 hover:bg-red-400 hover:text-red-800">
                            {{ $post->category->nama_kategori }}
                        </a>
                        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="flex flex-col justify-evenly p-0 m-0 ">
                        <h2 class="mb-3 text-2xl font-bold tracking-tight text-gray-900 dark:text-white pr-4"><a class="hover:underline " href="/posts/{{ $post->slug }}">{{ $post->title }}</a></h2>
                        <p class="mb-5 font-light text-gray-500 dark:text-gray-400 text-pretty ">{{ Str::limit($post->body, 120, '...') }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-3">
                            <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                            <span class="font-medium dark:text-white text-sm">
                                <a href="/posts?author={{ $post->author->username }}" class="hover:underline">{{ $post->author->name }}</a>
                            </span>
                        </div>
                        <a href="/posts/{{ $post->slug }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                            Read more
                            <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </article>
            @empty  
                <div class="px-4 py-4 radius-3xl border-none">
                    <p class="font-extrabold text-3xl py-8">Article Not Found!</p>
                    <a href="/posts" class="text-lg hover:underline">&laquo; Back to post</a>
                </div>    
            @endforelse
            </div>  
            
        </div>
</x-layout>