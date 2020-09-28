<textarea {{ $attributes->merge([
    'class' => 'shadow border rounded-md appearance-none py-2 px-3 text-gray-600 leading-tight focus:outline-none text-md w-full -mb-2'
]) }}>{!! $slot !!}</textarea>