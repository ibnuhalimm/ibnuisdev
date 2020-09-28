<button {{ $attributes->merge([
    'class' => 'px-5 py-2 uppercase text-center bg-'. $color .' hover:bg-opacity-75 text-white rounded-md shadow-md mx-1 my-1 outline-none focus:outline-none'
]) }} >
    {{ $slot }}
</button>