@props(['user', 'lg' => false, 'sm' => false, 'xs' => false, 'featured' => false, 'noBorder' => false])

@if ($user->avatar)
    @if ($lg)
        <div class="rounded-full border-2 w-36 h-36 bg-center bg-no-repeat bg-cover"
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
        <x-user-no-avatar :featured="$featured" :noBorder="$noBorder" lg />
    @elseif($sm)
        <x-user-no-avatar :featured="$featured" :noBorder="$noBorder" sm />
    @else
        <x-user-no-avatar :featured="$featured" :noBorder="$noBorder" />
    @endif
@endif
