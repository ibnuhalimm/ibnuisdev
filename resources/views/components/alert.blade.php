@switch($color)
    @case('red')
        <div {{ $attributes->merge([
            'class' => 'my-2 py-3 px-4 bg-red-200 rounded-md'
        ]) }} :class="{'hidden': !is_open, 'block': is_open}" x-data="{ is_open: true }">
            <div class="flex items-start justify-between">
                @if (!empty($title))
                    <h6 class="text-red-700 font-bold mb-2">
                        {{ $title }}
                    </h6>
                @endif
                <button type="button" class="p-2 float-right -mt-2 text-red-700 hover:text-red-500 outline-none focus:outline-none" @click="is_open =! is_open">
                    &times;
                </button>
            </div>
            <div class="text-red-700">
                {{ $slot }}
            </div>
        </div>
        @break
    @case('green')
        <div {{ $attributes->merge([
            'class' => 'my-2 py-3 px-4 bg-green-200 rounded-md'
        ]) }} :class="{'hidden': !is_open, 'block': is_open}" x-data="{ is_open: true }">
            <div class="flex items-start justify-between">
                @if (!empty($title))
                    <h6 class="text-green-700 font-bold mb-2">
                        {{ $title }}
                    </h6>
                @endif
                <button type="button" class="p-2 float-right -mt-2 text-green-700 hover:text-green-500 outline-none focus:outline-none" @click="is_open =! is_open">
                    &times;
                </button>
            </div>
            <div class="text-green-700">
                {{ $slot }}
            </div>
        </div>
        @break
    @case('blue')
        <div {{ $attributes->merge([
            'class' => 'my-2 py-3 px-4 bg-blue-200 rounded-md'
        ]) }} :class="{'hidden': !is_open, 'block': is_open}" x-data="{ is_open: true }">
            <div class="flex items-start justify-between">
                @if (!empty($title))
                    <h6 class="text-blue-700 font-bold mb-2">
                        {{ $title }}
                    </h6>
                @endif
                <button type="button" class="p-2 float-right -mt-2 text-blue-700 hover:text-blue-500 outline-none focus:outline-none" @click="is_open =! is_open">
                    &times;
                </button>
            </div>
            <div class="text-blue-700">
                {{ $slot }}
            </div>
        </div>
        @break
    @default
        <div {{ $attributes->merge([
            'class' => 'my-2 py-3 px-4 bg-gray-200 rounded-md'
        ]) }} :class="{'hidden': !is_open, 'block': is_open}" x-data="{ is_open: true }">
            <div class="flex items-start justify-between">
                @if (!empty($title))
                    <h6 class="text-gray-700 font-bold mb-2">
                        {{ $title }}
                    </h6>
                @endif
                <button type="button" class="p-2 float-right -mt-2 text-gray-700 hover:text-gray-500 outline-none focus:outline-none" @click="is_open =! is_open">
                    &times;
                </button>
            </div>
            <div class="text-gray-700">
                {{ $slot }}
            </div>
        </div>
@endswitch
