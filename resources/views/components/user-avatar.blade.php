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
@else
    @if ($lg)
        <div class="rounded-full border-2 w-36 h-36 bg-center bg-no-repeat bg-cover "
            style="background-image: url(https://robohash.org/toto?set=set4)" aria-label="user avatar">
        </div>
    @elseif($sm)
        <div class="rounded-full border-2 w-12 h-12 bg-center bg-no-repeat bg-cover "
            style="background-image: url(https://robohash.org/moto?set=set4)" aria-label="user avatar">
        </div>
    @else
        <div class="rounded-full border-2 w-10 h-10 bg-center bg-no-repeat bg-cover "
            style="background-image: url(https://robohash.org/moto?set=set4)" aria-label="user avatar">
        </div>
    @endif
@endif
