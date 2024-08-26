<x-app-layout>
    <x-slot:head>
        <title>{{ $post->meta_title ?? $post->title }}</title>
        <meta name="description" content="{{ $post->meta_description ?? $post->description }}">
        {{-- essential social media og tags --}}
        <meta property="og:title" content="{{ $post->og_title ?? $post->title }}">
        <meta property="og:description"
            content="{{ $post->description ?? 'Get the latest news on web3, cybersecurity, programming!' }}">
        <meta property="og:image" content="{{ is_null($post->og_thumbnail) ? $post->thumbnail : $post->og_thumbnail }}" />
        <meta property="og:url" content="{{ url('/post/' . $post->slug) }}" />
        <meta property="og:type" content="article" />
        <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />
        <meta property="og:image:alt" content="{{ $post->thumbnail_alt_txt }}" />
    </x-slot:head>
    <section class="p-6 mb-10 sm:px-16 max-w-6xl space-y-6 flex flex-col justify-center items-center lg:px-20">
        <article class="mt-12 lg:w-4/5">
            <div class="space-y-4">
                <div class="mb-10">
                    <h1 class="font-bold text-3xl lg:text-4xl ">
                        {{ $post->title }}
                    </h1>
                    <div class="mt-4">
                        <x-labels.category :category="$post->category" />
                        <x-labels.subcategory :category="$post->category" :subcategory="$post->subcategory" />
                    </div>

                    <x-post-cards.author :post="$post" />
                </div>


                <div class="max-w-full md:h-[70vh] relative">
                    <img src="/storage/{{ $post->thumbnail }}" alt="{{ $post->thumbnail_alt_txt }}"
                        class="rounded-xl w-full h-full  md:object-cover">
                    <x-post-cards.img-overlay />
                </div>
            </div>

            <div class="post-body text-lg my-8">
                {!! $post->body !!}
            </div>

        </article>

        <div class="flex flex-col lg:w-4/5 ">
            <div class="my-8">
                <ul class="flex justify-between">
                    <li class="box-border  w-1/2 lg:w-2/5 p-1 mr-2 group">
                        @if ($previousPost)
                            <a href="/post/{{ $previousPost->slug }}">
                                {{-- fontawesome previous btn --}}
                                <div class="italic mb-2 text-sm text-left text-zinc-600 group-hover:text-zinc-700">
                                    <i class="fa-solid fa-chevron-left"></i>
                                    Previous
                                </div>
                                <span
                                    class="font-semibold text-zinc-600 group-hover:text-zinc-800 text-left">{{ $previousPost->title }}
                                </span>
                            </a>
                        @endif
                    </li>
                    <li class="box-border w-1/2 lg:w-2/5 p-1 group">
                        @if ($nextPost)
                            <a href="/post/{{ $nextPost->slug }}">

                                <div class="italic mb-2 text-sm text-right text-zinc-600 group-hover:text-zinc-700">
                                    <i class="fa-solid fa-chevron-right"></i>
                                    Next
                                </div>
                                <span
                                    class="font-semibold text-zinc-600 group-hover:text-zinc-800 inline-block text-right">{{ $nextPost->title }}
                                </span>
                            </a>
                        @endif
                    </li>
                </ul>
            </div>

            <div class="py-4 my-5 ">
                <div>
                    <div class="flex items-end ">
                        <span class="font-bold text-zinc-600 text-lg">Share</span>
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
                            <x-icons.facebook class="group-hover:fill-zinc-500 transition-colors" />

                        </a>

                        <a href="https://twitter.com/intent/tweet?url={{ url('/post/' . $post->slug) }}"
                            target="_blank" rel="noopener noreferrer nofollow" class="group">
                            <x-icons.twitter-x class="group-hover:fill-zinc-500 transition-colors" />
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?url= {{ url('/post/' . $post->slug) }}"
                            target="_blank" rel="noopener noreferrer nofollow" class="group">

                            <x-icons.linkedin class="group-hover:fill-zinc-500 transition-colors" />
                        </a>

                    </div>

                </div>
            </div>

            <section class="flex flex-col justify-center mt-10 space-y-4 w-full h-full">

                <div class="w-full md:w-4/5 lg:w-3/5 space-y-4 ">
                    <x-comment-form :post="$post" btn-label="Post" />

                    @foreach ($post->comments as $comment)
                        <x-post-comment :comment="$comment" :post="$post" />
                    @endforeach
                </div>

            </section>

            {{-- take 8 recent posts and browse by category --}}
            <section class="flex flex-col justify-center mt-10 space-y-4 w-full">
                <div class="w-full space-y-4  bg-white px-1 py-4 rounded-xl">
                    <div class="flex flex-col justify-center items-center">
                        <h1 class="text-2xl font-bold text-zinc-600">Browse by Category
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
                        <h1 class="text-2xl font-bold text-zinc-600">Recent Posts
                        </h1>
                        <x-hr class="bg-gray-400" />
                    </div>

                    @foreach ($recentPosts as $post)
                        <x-post-cards.card-x :post="$post" />
                    @endforeach

                </div>

            </section>
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
