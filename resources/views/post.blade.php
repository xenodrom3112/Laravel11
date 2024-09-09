<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
<main class="pt-8 pb-16 sm:pl-8 lg:pt-16 lg:pb-20 s  bg-white bg-opacity-20 dark:bg-gray-900 antialiased shadow-md">
    <div class="flex px-0 max-w-screen-xl">
        <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-2 lg:mb-4 not-format">
                <address class="flex flex-col items-start mb-5 not-italic">
                    <a href="/posts" class="text-blue-500 text-sm my-3 pb-5 hover:underline">&laquo; Back to Posts</a>
                    <div class="inline-flex items-center text-sm text-gray-900 dark:text-white">
                        <img class="mr-4 lg:w-16 lg:h-16 rounded-full sm:w-14 sm:h-14" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                        <div>
                            <a href="/posts?author={{ $post->author->username }}" rel="author" class="lg:text-xl sm:text-base font-bold text-gray-900 dark:text-white mb-2 hover:underline">{{ $post->author->name }}</a>
                            <p class="text-base text-gray-500 dark:text-gray-400 mb-2">{{ $post->created_at->format('j F Y') }}</p>
                            <a href="/posts?category={{ $post->category->slug }}" class="bg-{{ $post->category->color }}-100 text-{{ $post->category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800 hover:bg-red-400 hover:text-red-800">
                                {{ $post->category->nama_kategori }}
                            </a>
                        </div>
                    </div>
                </address>
                <h1 class="mb-4 text-3xl sm:text-2xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
            </header>
            <p class="sm:text-balance lg:text-pretty">{{$post->body}}</p>
        </article>
    </div>
</main>
</x-layout>