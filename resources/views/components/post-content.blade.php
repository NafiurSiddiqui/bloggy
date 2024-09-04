@props([
    'post',
    'editPage' => false,
    'previousPost' => null,
    'nextPost' => null,
    'categories' => null,
    'recentPosts' => null,
    'comment' => null,
    'reply' => null,
])
{{-- @dd($comment) --}}
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
    <section class="p-6 mb-10 sm:px-16 max-w-6xl space-y-6 flex flex-col justify-center items-center lg:px-20">
        <article class="mt-12 lg:w-4/5">
            <div class="space-y-4">
                <div class="mb-10">
                    <h1 class="font-bold text-3xl lg:text-4xl dark:text-zinc-200 ">
                        {{ $post->title }}
                    </h1>
                    <div class="mt-4">
                        <x-labels.category :category="$post->category" />
                        <x-labels.subcategory :category="$post->category" :subcategory="$post->subcategory" />
                    </div>

                    <x-post-cards.author :post="$post" />
                </div>


                <div class="max-w-full md:h-[70vh] aspect-[16/9] relative">
                    <img src="/storage/{{ $post->thumbnail }}" alt="{{ $post->thumbnail_alt_txt }}"
                        class=" w-full h-full  object-cover">
                    <x-post-cards.img-overlay />
                </div>
            </div>

            <div class="post-body text-lg my-8 dark:text-zinc-200">
                @if ($editPage)
                    <div class="text-lg my-8 dark:text-zinc-200">
                        <x-form.back-to-post-btn :post="$post" />
                        {!! $post->body !!}
                    </div>
                @endif
                {!! $post->body !!}
            </div>
        </article>


        <div class="flex flex-col lg:w-4/5 ">
            {{-- Pagination --}}
            @if (!$editPage)
                <div class="my-8">
                    <ul class="flex justify-between">
                        <li class="box-border  w-1/2 lg:w-2/5 p-1 mr-2 group">
                            @if ($previousPost)
                                <a href="/post/{{ $previousPost->slug }}">
                                    {{-- fontawesome previous btn --}}
                                    <div
                                        class="italic mb-2 text-sm text-left dark:text-darkText-100/70 dark:hover:text-darkTextHover-600  transition-all duration-200 ease-in-out">
                                        <i class="fa-solid fa-chevron-left"></i>
                                        Previous
                                    </div>
                                    <span
                                        class="font-semibold dark:text-darkText-100/70 dark:hover:text-darkTextHover-600  transition-all duration-200 ease-in-out text-left">{{ $previousPost->title }}
                                    </span>
                                </a>
                            @endif
                        </li>
                        <li class="box-border w-1/2 lg:w-2/5 p-1 group">
                            @if ($nextPost)
                                <a href="/post/{{ $nextPost->slug }}">

                                    <div
                                        class="italic mb-2 text-sm text-right dark:text-darkText-100/70 dark:hover:text-darkTextHover-600  transition-all duration-200 ease-in-out">
                                        <i class="fa-solid fa-chevron-right"></i>
                                        Next
                                    </div>
                                    <span
                                        class="font-semibold dark:text-darkText-100/70 dark:hover:text-darkTextHover-600  transition-all duration-200 ease-in-out inline-block text-right">{{ $nextPost->title }}
                                    </span>
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>

                {{-- Share --}}
                {{-- if NOT edit page --}}
                <div class="py-4 my-5 ">
                    <div>
                        <div class="flex items-end ">
                            <span class="font-bold text-emerald-100 text-lg">Share</span>
                            <div class="">
                                <x-icons.share-icon class="opacity-90" />
                            </div>
                        </div>
                        <x-hr class="bg-gray-400" />
                    </div>
                    <div class="flex items-center justify-center">
                        <div class="flex justify-between items-center w-3/5 lg:w-[15rem]">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/post/' . $post->slug) }}"
                                target="_blank" rel="noopener noreferrer nofollow" class="group">
                                <x-icons.facebook
                                    class="transition-colors dark:fill-darkText-100/50 dark:group-hover:fill-darkTextHover-600" />

                            </a>

                            <a href="https://twitter.com/intent/tweet?url={{ url('/post/' . $post->slug) }}"
                                target="_blank" rel="noopener noreferrer nofollow" class="group">
                                <x-icons.twitter-x
                                    class="transition-colors dark:fill-darkText-100/50 dark:group-hover:fill-darkTextHover-600" />
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?url= {{ url('/post/' . $post->slug) }}"
                                target="_blank" rel="noopener noreferrer nofollow" class="group">

                                <x-icons.linkedin
                                    class="transition-colors dark:fill-darkText-100/50 dark:group-hover:fill-darkTextHover-600" />
                            </a>

                        </div>

                    </div>
                </div>
            @endif
            {{-- Comments --}}
            <section class="flex flex-col justify-center mt-10 space-y-4 w-full h-full">
                <div class="w-full md:w-4/5 lg:w-3/5 space-y-4 ">
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
                <section class="flex flex-col justify-center mt-10 space-y-4 w-full">
                    <div class="w-full space-y-4 px-2 bg-white dark:bg-darkPostCard py-4 rounded-xl">
                        <div class="flex flex-col justify-center items-center">
                            <h1 class="text-2xl font-bold dark:text-zinc-300">Browse by Category
                            </h1>
                            <x-hr class="bg-gray-400" />
                        </div>

                        @if ($categories->isNotEmpty())
                            @foreach ($categories as $category)
                                <x-labels.category :category="$category" />
                            @endforeach
                        @endif

                    </div>
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


    </section>
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
