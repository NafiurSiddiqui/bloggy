@props([
    'post',
    'editPage' => false,
    'previousPost' => null,
    'nextPost' => null,
    // 'categories' => null,
    'recentPosts' => null,
    'comment' => null,
    'reply' => null,
])

{{-- This layout is shared between - show-post, edit-comment, edit-reply --}}

<x-app-layout>
    {{-- if NOT edit-page --}}
    @if (!$editPage)
        <x-slot:head>
            <title>{{ $post->meta_title ?? $post->title }}</title>
            <meta name="description" content="{{ $post->meta_description ?? $post->description }}">
            {{-- essential social media og tags --}}
            <meta property="og:title" content="{{ $post->og_title ?? $post->title }}">
            <meta property="og:description"
                content="{{ $post->description ?? 'Get the latest news on web3, cybersecurity, programming!' }}">
            <meta property="og:image"
                content="{{ is_null($post->og_thumbnail) ? $post->thumbnail : $post->og_thumbnail }}" />
            <meta property="og:url" content="{{ url('/post/' . $post->slug) }}" />
            <meta property="og:type" content="article" />
            <meta property="og:image:width" content="400" />
            <meta property="og:image:height" content="300" />
            <meta property="og:image:alt" content="{{ $post->thumbnail_alt_txt }}" />
        </x-slot:head>
    @endif
    {{-- endif --}}
    <div class="space-y-6 mb-6 flex flex-col justify-center items-center lg:px-20">
        <div class="md:w-[90%] lg:w-4/5">
            <article class="my-4 ">
                <div class="space-y-4">
                    <div class="mb-10 mt-6">
                        <h1 class="font-semibold text-3xl text-lightText-700 lg:text-4xl dark:text-zinc-200 font-text">
                            {{ $post->title }}
                        </h1>
                        <div class="mt-6 mb-4 flex space-x-2 space-y-2 items-end flex-wrap">
                            <x-labels.category :category="$post->category" />
                            <x-labels.subcategory :category="$post->category" :subcategory="$post->subcategory" />
                        </div>

                        <div class="flex justify-between items-center">
                            <x-post-cards.author :post="$post" />

                            @if (Auth::user()?->role === 'admin')
                                <x-text-link href="/admin/post/{{ $post->slug }}/edit" class="font-semibold text-lg">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </x-text-link>
                            @endif
                        </div>
                    </div>


                    <div class="max-w-full md:h-[70vh]  relative">
                        <div class="h-full">
                            {{ $post->getFirstMedia('thumbnails')
                                ?->img()->attributes(['alt' => "$post->thumbnail_alt_txt", 'class' => 'w-full h-full object-contain']) }}
                        </div>
                        <x-post-cards.img-overlay />
                    </div>
                </div>
                <div class="post-body font-text text-lg text-lightText-800 my-8 dark:text-zinc-200">
                    @if ($editPage)
                        <div class="text-lg my-8 dark:text-zinc-200 ">
                            <x-form.back-to-post-btn :post="$post" />
                            {!! $post->body !!}
                        </div>
                    @endif
                    {!! $post->body !!}
                </div>
            </article>
            <div class="flex flex-col">
                {{-- Pagination --}}
                @if (!$editPage)
                    <nav class="my-8" aria-label="post navigation">
                        <ul class="flex justify-between">
                            <li class="box-border  w-1/2 lg:w-2/5 p-1 mr-2 group">
                                {{-- @dd($previousPost) --}}

                                @if ($previousPost)
                                    @php
                                        $previousPostUrl = "/post/{$previousPost->slug}/";

                                        if (session()->has('cameFromCategoriesURL')) {
                                            $previousPostUrl = $previousPostUrl . "?category={$post->category->slug}";
                                        }

                                        if (session()->has('cameFromSubCategoriesURL')) {
                                            $previousPostUrl =
                                                $previousPostUrl . "?subcategory={$post->subcategory->slug}";
                                        }

                                    @endphp

                                    <a href="{{ $previousPostUrl }}" class="opacity-70 hover:opacity-100">
                                        {{-- fontawesome previous btn --}}
                                        <div
                                            class="italic mb-2 text-sm text-left dark:text-darkText-100/70 dark:hover:text-darkTextHover-600 text-lightText transition-all duration-200 ease-in-out">
                                            <i class="fa-solid fa-chevron-left text-lightText-600"></i>
                                            Previous
                                        </div>
                                        <span
                                            class="font-semibold dark:text-darkText-100/70 dark:hover:text-darkTextHover-600 hover:text-emerald-500 hoverTextEffect hover:underline text-lightText-700   transition-all duration-200 ease-in-out text-left">{{ $previousPost->title }}
                                        </span>
                                    </a>
                                @endif
                            </li>
                            <li class="box-border w-1/2 lg:w-2/5 p-1 group">
                                @if ($nextPost)
                                    @php
                                        $nextPostUrl = "/post/{$nextPost->slug}/";

                                        if (session()->has('cameFromCategoriesURL')) {
                                            $nextPostUrl = $nextPostUrl . "?category={$post->category->slug}";
                                        }

                                        if (session()->has('cameFromSubCategoriesURL')) {
                                            $nextPostUrl = $nextPostUrl . "?subcategory={$post->subcategory->slug}";
                                        }

                                    @endphp
                                    <a href="{{ $nextPostUrl }}" class="opacity-70 hover:opacity-100">

                                        <div
                                            class="italic mb-2 text-sm text-right dark:text-darkText-100/70 text-lightText  dark:hover:text-darkTextHover-600
                                         transition-all duration-200 ease-in-out">
                                            <i class="fa-solid fa-chevron-right text-lightText-600"></i>
                                            Next
                                        </div>
                                        <span
                                            class="font-semibold dark:text-darkText-100/70 dark:hover:text-darkTextHover-600 hover:text-emerald-500 hoverTextEffect hover:underline text-lightText-700 transition-all duration-200 ease-in-out block text-right">{{ $nextPost->title }}
                                        </span>
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </nav>
                    {{-- Share --}}
                    <section class="py-4 my-5">
                        <div>
                            <div class="flex items-end ">
                                <span class="font-bold text-lightText-500 dark:text-emerald-100 text-lg">Share</span>
                                <div class="">
                                    <x-icons.share-icon class="opacity-90" />
                                </div>
                            </div>
                            <x-hr />
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="flex justify-between items-center w-3/5 lg:w-[15rem]">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/post/' . $post->slug) }}"
                                    target="_blank" rel="noopener noreferrer nofollow" class="group">
                                    <x-icons.facebook
                                        class="transition-colors dark:fill-darkText-100/50 dark:group-hover:fill-darkTextHover-600 fill-lightText-400 group-hover:fill-emerald-400 " />

                                </a>

                                <a href="https://twitter.com/intent/tweet?url={{ url('/post/' . $post->slug) }}"
                                    target="_blank" rel="noopener noreferrer nofollow" class="group">
                                    <x-icons.twitter-x
                                        class="transition-colors dark:fill-darkText-100/50 dark:group-hover:fill-darkTextHover-600 fill-lightText-400 group-hover:fill-emerald-400" />
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?url= {{ url('/post/' . $post->slug) }}"
                                    target="_blank" rel="noopener noreferrer nofollow" class="group">

                                    <x-icons.linkedin
                                        class="transition-colors dark:fill-darkText-100/50 dark:group-hover:fill-darkTextHover-600 fill-lightText-400 group-hover:fill-emerald-400" />
                                </a>

                            </div>

                        </div>
                    </section>
                @endif
                {{-- Comments --}}
                <section class="flex flex-col justify-center mt-10  w-full h-full" aria-label="comments">
                    <div class="w-full md:w-4/5 lg:w-3/5 ">
                        @if ($reply)
                            <x-reply-form :post="$post" :comment="$comment" :reply="$reply" editable />
                        @else
                            <x-comment-form :post="$post" :comment="$editPage ? $comment : null"
                                btn-label="{{ $editPage ? 'Update' : 'Post' }}" :editable="$editPage" />
                        @endif
                        {{ $postComment }}
                    </div>
                </section>
                @if (!$editPage)
                    {{-- take 8 recent posts and browse by category --}}
                    <section class="flex flex-col justify-center mt-10 space-y-4 w-full"
                        aria-label="Browse by categories">
                        <x-browse-by-category />
                    </section>

                    <section aria-label="Recent Posts">
                        <div class="w-full  space-y-4 ">
                            <div class="flex flex-col justify-center items-center">
                                <h1 class="text-2xl font-bold text-zinc-600 dark:text-zinc-300">Recent Posts
                                </h1>
                                <x-hr class="bg-gray-400" />
                            </div>

                            @foreach ($recentPosts as $post)
                                <x-post-cards.card-x :post="$post" />
                            @endforeach

                        </div>

                    </section>
                @endif
            </div>
        </div>
    </div>
    </x-layout>


    <script>
        // Table of Content generator
        const postBody = document.querySelector('.post-body');
        let postBodyContents = postBody.children;
        let headings = [];
        let headingCounter = 0;


        // generate table of content
        // set a Table of contents on postBody
        let toc = document.createElement('div');
        toc.classList.add('table-of-contents', 'border', 'py-4', 'mb-8', 'bg-biege-100', 'rounded-md', 'px-3', 'w-fit',
            'text-zinc-700');
        toc.innerHTML = '<p class="underline font-semibold text-gray-600">Table of Contents</p>';
        postBody.prepend(toc);
        // set a <ul> on toc
        let tocList = document.createElement('ul');
        toc.appendChild(tocList);

        //Set Ids on each h3s
        for (let index = 0; index < postBodyContents.length; index++) {
            let isHeading = postBodyContents[index].tagName == 'H3';

            if (isHeading) {
                headingCounter++;
                postBodyContents[index].setAttribute('id', `heading-${headingCounter}`);
                // set a <li> on tocList
                let tocListItem = document.createElement('li');
                tocList.appendChild(tocListItem);
                // set a <a> on tocListItem
                let tocListItemAnchor = document.createElement('a');
                tocListItemAnchor.setAttribute('href', `#heading-${headingCounter}`);
                tocListItemAnchor.innerHTML = `${postBodyContents[index].innerHTML}`;
                tocListItem.appendChild(tocListItemAnchor);

            }
        }

        if (headingCounter === 0) {
            toc.remove();
        }
    </script>
