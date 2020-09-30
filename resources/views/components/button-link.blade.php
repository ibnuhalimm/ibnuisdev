@switch('red')
    @case('red')
        <a {{ $attributes->merge([
            'class' => 'px-5 py-2 text-center text-red-500 mx-1 my-1 outline-none focus:outline-none'
        ]) }}>
            {{ $slot }}
        </a>
        @break
    @case('orange')
        <a {{ $attributes->merge([
            'class' => 'px-5 py-2 text-center text-orange-500 mx-1 my-1 outline-none focus:outline-none'
        ]) }}>
            {{ $slot }}
        </a>
        @break
    @case('yellow')
        <a {{ $attributes->merge([
            'class' => 'px-5 py-2 text-center text-yellow-500 mx-1 my-1 outline-none focus:outline-none'
        ]) }}>
            {{ $slot }}
        </a>
        @break
    @case('green')
        <a {{ $attributes->merge([
            'class' => 'px-5 py-2 text-center text-green-500 mx-1 my-1 outline-none focus:outline-none'
        ]) }}>
            {{ $slot }}
        </a>
        @break
    @case('blue')
        <a {{ $attributes->merge([
            'class' => 'px-5 py-2 text-center text-blue-500 mx-1 my-1 outline-none focus:outline-none'
        ]) }}>
            {{ $slot }}
        </a>
        @break
    @case('ib-three')
        <a {{ $attributes->merge([
            'class' => 'px-5 py-2 text-center text-ib-three mx-1 my-1 outline-none focus:outline-none'
        ]) }}>
            {{ $slot }}
        </a>
        @break
    @default
        <a {{ $attributes->merge([
            'class' => 'px-5 py-2 text-center text-gray mx-1 my-1 outline-none focus:outline-none'
        ]) }}>
            {{ $slot }}
        </a>
@endswitch