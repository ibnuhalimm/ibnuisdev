<a {{ $attributes->merge([
    'class' => 'px-5 py-2 text-center text-'. $color .' mx-1 my-1 outline-none focus:outline-none'
]) }}>
    {{ $slot }}
</a>