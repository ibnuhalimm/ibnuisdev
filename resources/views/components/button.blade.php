@switch($color)
    @case('red')
        <button {{ $attributes->merge([
            'class' => 'inline-flex px-5 py-2 uppercase text-center bg-red-500 hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 outline-none focus:outline-none'
        ]) }} >
            {{ $slot }}
        </button>
        @break
    @case('orange')
        <button {{ $attributes->merge([
            'class' => 'inline-flex px-5 py-2 uppercase text-center bg-orange-500 hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 outline-none focus:outline-none'
        ]) }} >
            {{ $slot }}
        </button>
        @break
    @case('yellow')
        <button {{ $attributes->merge([
            'class' => 'inline-flex px-5 py-2 uppercase text-center bg-yellow-500 hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 outline-none focus:outline-none'
        ]) }} >
            {{ $slot }}
        </button>
        @break
    @case('green')
        <button {{ $attributes->merge([
            'class' => 'inline-flex px-5 py-2 uppercase text-center bg-green-500 hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 outline-none focus:outline-none'
        ]) }} >
            {{ $slot }}
        </button>
        @break
    @case('blue')
        <button {{ $attributes->merge([
            'class' => 'inline-flex px-5 py-2 uppercase text-center bg-blue-500 hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 outline-none focus:outline-none'
        ]) }} >
            {{ $slot }}
        </button>
        @break
    @case('ib-three')
        <button {{ $attributes->merge([
            'class' => 'inline-flex px-5 py-2 uppercase text-center bg-ib-three hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 outline-none focus:outline-none'
        ]) }} >
            {{ $slot }}
        </button>
        @break
    @default
        <button {{ $attributes->merge([
            'class' => 'inline-flex px-5 py-2 uppercase text-center bg-gray-500 hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 outline-none focus:outline-none'
        ]) }} >
            {{ $slot }}
        </button>
@endswitch