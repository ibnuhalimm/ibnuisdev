@switch($size)
    @case('small')
        <div {{ $attributes->merge([
            'class' => 'w-11/12 md:w-1/4 px-8 py-6 bg-white mt-20 mx-auto rounded-md'
        ]) }}>
            {{ $slot }}
        </div>
        @break
    @case('medium')
        <div {{ $attributes->merge([
            'class' => 'w-11/12 md:w-1/2 px-8 py-6 bg-white mt-20 mx-auto rounded-md'
        ]) }}>
            {{ $slot }}
        </div>
        @break
    @case('large')
        <div {{ $attributes->merge([
            'class' => 'w-11/12 md:w-3/4 px-8 py-6 bg-white mt-20 mx-auto rounded-md'
        ]) }}>
            {{ $slot }}
        </div>
        @break
    @default
        <div {{ $attributes->merge([
            'class' => 'w-11/12 md:w-1/3 px-8 py-6 bg-white mt-20 mx-auto rounded-md'
        ]) }}>
            {{ $slot }}
        </div>
@endswitch