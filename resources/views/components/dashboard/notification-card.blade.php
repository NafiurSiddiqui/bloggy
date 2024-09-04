@props(['link' => '/admin/#', 'commentary', 'reply' => [], 'registration'])



@php

    $message = '..well,This should not be here. Need a fix here!';

    $countReply = count($reply);
    if (isset($commentary)) {
        $message = $commentary->data['message'];
        $link = '/post/' . $commentary->data['post_slug'] . '/notification/' . $commentary->id;
    }
    if ($countReply > 0) {
        $message = 'reply from an admin.';
    }

@endphp

<li class="flex text-sm border text-gray-700 bg-slate-100 border-gray-100 items-center p-4 w-[14rem] hover:bg-gray-50 dark:border-zinc-800 dark:bg-darkPage dark:text-zinc-300 dark:hover:bg-darkNavFooter dark:hover:text-zinc-200"
    {{ isset($commentary) ? 'id="' . $commentary->id . '"' : '' }}>
    <a href="{{ url($link) }}" role="link" class="notification-link"
        {{ isset($commentary) ? 'data-id="' . $commentary->id . '"' : '' }}>
        @if (isset($registration))
            You have <span class='font-bold'>{{ $registration->count() }}</span> new registration appliation pending.
        @else
            {{ $message }}
        @endif
    </a>
    {{-- <span class="w-2 h-2 flex-shrink-0 bg-blue-500 inline-block rounded-full" role="presentation"></span> --}}
</li>
