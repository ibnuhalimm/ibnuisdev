<div {{ $attributes->merge([
    'class' => 'w-full overflow-auto'
]) }}>
    <table class="w-full">
        {{ $slot }}
    </table>
</div>