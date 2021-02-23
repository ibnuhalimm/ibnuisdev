<div class="flex flex-col md:flex-row items-center mb-6">
    <label class="block w-full @if ($size == 'large') xl:w-1/4 @else xl:w-1/3 @endif text-gray-700 md:text-right md:px-3 mb-2 md:mb-0 md:pt-2">
        {!! $text !!}

        @if ($required == 'true')
            <span class="text-red-600">*</span>
        @endif
    </label>
    <div class="w-full @if ($size == 'large') xl:w-3/4 @else xl:w-2/3 @endif xl:px-3">
        <div class="w-full @if ($size == 'large') xl:w-11/12 @else xl:w-2/3 @endif">
            {{ $slot }}
        </div>
    </div>
</div>