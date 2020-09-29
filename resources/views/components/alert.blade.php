<div {{ $attributes->merge([
    'class' => 'my-2 py-3 px-4 bg-'. $color .'-200 rounded-md'
]) }} :class="{'hidden': !is_open, 'block': is_open}" x-data="{ is_open: true }">
    <div class="flex items-start justify-between">
        @if (!empty($title))
            <h6 class="text-{{ $color }}-700 font-bold mb-2">
                {{ $title }}
            </h6>
        @endif
        <button type="button" class="p-2 float-right -mt-2 text-{{ $color }}-700 hover:text-{{ $color }}-500 outline-none focus:outline-none" @click="is_open =! is_open">
            &times;
        </button>
    </div>
    <div class="text-{{ $color }}-700">
        {{ $slot }}
    </div>
</div>