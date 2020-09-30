@switch($color)
    @case('red')
        <a {{ $attributes->merge([
            'class' => 'px-5 py-2 uppercase text-center bg-red-500 hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 inline-flex outline-none focus:outline-none'
        ]) }} >
            {{ $slot }}
        </a>
        @break
    @case('orange')
        <a {{ $attributes->merge([
            'class' => 'px-5 py-2 uppercase text-center bg-orange-500 hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 inline-flex outline-none focus:outline-none'
        ]) }} >
            {{ $slot }}
        </a>
        @break
    @case('yellow')
        <a {{ $attributes->merge([
            'class' => 'px-5 py-2 uppercase text-center bg-yellow-500 hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 inline-flex outline-none focus:outline-none'
        ]) }} >
            {{ $slot }}
        </a>
        @break
    @case('green')
        <a {{ $attributes->merge([
            'class' => 'px-5 py-2 uppercase text-center bg-green-500 hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 inline-flex outline-none focus:outline-none'
        ]) }} >
            {{ $slot }}
        </a>
        @break
    @case('blue')
        <a {{ $attributes->merge([
            'class' => 'px-5 py-2 uppercase text-center bg-blue-500 hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 inline-flex outline-none focus:outline-none'
        ]) }} >
            {{ $slot }}
        </a>
        @break
    @case('ib-three')
        <a {{ $attributes->merge([
            'class' => 'px-5 py-2 uppercase text-center bg-ib-three hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 inline-flex outline-none focus:outline-none'
        ]) }} >
            {{ $slot }}
        </a>
        @break
    @default
        <a {{ $attributes->merge([
            'class' => 'px-5 py-2 uppercase text-center bg-gray-500 hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 inline-flex outline-none focus:outline-none'
        ]) }} >
            {{ $slot }}
        </a>
@endswitch