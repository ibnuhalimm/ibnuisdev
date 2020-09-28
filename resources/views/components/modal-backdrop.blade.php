<div {{ $attributes->merge([
    'class' => 'w-full h-full fixed inset-0 bg-gray-900 bg-opacity-75 z-50'
]) }}>
    {{ $slot }}
</div>