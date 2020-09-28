<tr {{ $attributes->merge([
    'class' => 'border border-t-0 border-r-0 border-b border-l-0 border-solid border-gray-300'
]) }}>
    {{ $slot }}
</tr>