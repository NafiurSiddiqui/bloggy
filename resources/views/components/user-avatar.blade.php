@props(['user', 'lg' => false, 'sm' => false, 'xs' => false])

@if ($user->avatar)

    @if ($lg)
        <div class="rounded-full border-2 w-36 h-36 bg-center bg-no-repeat bg-cover "
            style="background-image: url({{ asset('storage/' . $user->avatar) }})" aria-label="user avatar">
        </div>
    @elseif($sm)
        <div class="rounded-full border-2 w-12 h-12 bg-center bg-no-repeat bg-cover "
            style="background-image: url({{ asset('storage/' . $user->avatar) }})" aria-label="user avatar">
        </div>
    @else
        <div class="rounded-full border-2 w-10 h-10 bg-center bg-no-repeat bg-cover "
            style="background-image: url({{ asset('storage/' . $user->avatar) }})" aria-label="user avatar">
        </div>
    @endif
    {{-- @else
    @if ($lg)
        <div class="rounded-full border-2 w-36 h-36 flex justify-center items-center" aria-label="user avatar">
            <i class="fa-solid fa-user text-gray-500 w-full h-full"></i>
        </div>
    @elseif($sm)
        <div class="rounded-full border-2 w-12 h-12 flex justify-center items-center" aria-label="user avatar">
            <i class="fa-solid fa-user text-gray-500 w-12 h-6"></i>
        </div>
    @else
        <div class="rounded-full border-2 w-10 h-10 flex justify-center items-center" aria-label="user avatar">
            <i class="fa-solid fa-user text-gray-500"></i>
        </div>
    @endif --}}
@endif
