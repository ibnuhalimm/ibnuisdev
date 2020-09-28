<div {{ $attributes->merge([
    'class' => 'w-11/12 md:'. $width .' px-8 py-6 bg-white mt-20 mx-auto rounded-md'
]) }}>
    {{ $slot }}
</div>