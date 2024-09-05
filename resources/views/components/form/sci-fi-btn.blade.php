@props(['route', 'label' => 'Login', 'lg' => false, 'submit' => false])

@if ($submit)
    <button type="submit" {{ $attributes->merge([
        'class' => 'block',
    ]) }}>
        <svg width="{{ $lg ? '180' : '140' }}" height="{{ $lg ? '60' : '50' }}" viewBox="0 0 134 50" fill="none"
            xmlns="http://www.w3.org/2000/svg" class="group" preserveAspectRatio="xMidYMid meet">
            <path
                d="M1 22.9072V48C1 48.5523 1.44772 49 2 49H121.15C121.496 49 121.817 48.8213 121.999 48.5274L132.85 31.05C132.948 30.8916 133 30.7089 133 30.5225V7C133 6.44772 132.552 6 132 6H15.5788C15.2862 6 15.0082 6.12818 14.8182 6.35075L1.23942 22.258C1.08489 22.439 1 22.6692 1 22.9072Z"
                fill="#181B1A" stroke="#474E4B"
                class="group-hover:fill-logoColor transition-colors duration-100 ease-in" />
            <path
                d="M1 17.9072V43C1 43.5523 1.44772 44 2 44H121.15C121.496 44 121.817 43.8213 121.999 43.5274L132.85 26.05C132.948 25.8916 133 25.7089 133 25.5225V2C133 1.44772 132.552 1 132 1H15.5788C15.2862 1 15.0082 1.12818 14.8182 1.35075L1.23942 17.258C1.08489 17.439 1 17.6692 1 17.9072Z"
                fill="#181B1A" stroke="#474E4B"
                class="group-hover:fill-logoColor transition-colors duration-100 ease-in" />
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#14E785"
                class="group-hover:fill-[#0C0C0C] group-active:fill-[#0C0C0C] group-focus:fill-[#0C0C0C] "
                font-size="16px" font-family="Arial, sans-serif">
                {{ $label }}
            </text>
        </svg>
    </button>
@else
    <a href="{{ $route }}" {{ $attributes->merge([
        'class' => 'w-[180px] block',
    ]) }}>
        <svg width="{{ $lg ? '180' : '140' }}" height="{{ $lg ? '80' : '50' }}" viewBox="0 0 134 50" fill="none"
            xmlns="http://www.w3.org/2000/svg" class="group">
            <path
                d="M1 22.9072V48C1 48.5523 1.44772 49 2 49H121.15C121.496 49 121.817 48.8213 121.999 48.5274L132.85 31.05C132.948 30.8916 133 30.7089 133 30.5225V7C133 6.44772 132.552 6 132 6H15.5788C15.2862 6 15.0082 6.12818 14.8182 6.35075L1.23942 22.258C1.08489 22.439 1 22.6692 1 22.9072Z"
                fill="#181B1A" stroke="#474E4B"
                class="group-hover:fill-darkTextHover-600 transition-colors duration-100 ease-in" />
            <path
                d="M1 17.9072V43C1 43.5523 1.44772 44 2 44H121.15C121.496 44 121.817 43.8213 121.999 43.5274L132.85 26.05C132.948 25.8916 133 25.7089 133 25.5225V2C133 1.44772 132.552 1 132 1H15.5788C15.2862 1 15.0082 1.12818 14.8182 1.35075L1.23942 17.258C1.08489 17.439 1 17.6692 1 17.9072Z"
                fill="#181B1A" stroke="#474E4B"
                class="group-hover:fill-darkTextHover-600 transition-colors duration-100 ease-in" />
            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#14E785"
                class="group-hover:fill-[#0C0C0C] group-active:fill-[#0C0C0C] group-focus:fill-[#0C0C0C] "
                font-size="16px" font-family="Arial, sans-serif">
                {{ $label }}
            </text>
        </svg>
    </a>
@endif
