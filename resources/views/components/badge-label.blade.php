@switch($color)
    @case('red')
        <span class="py-1 px-2 bg-red-200 text-red-600 text-xs rounded-md">
            {!!  $slot !!}
        </span>
        @break
    @case('orange')
        <span class="py-1 px-2 bg-orange-200 text-orange-600 text-xs rounded-md">
            {!!  $slot !!}
        </span>
        @break
    @case('yellow')
        <span class="py-1 px-2 bg-yellow-200 text-yellow-600 text-xs rounded-md">
            {!!  $slot !!}
        </span>
        @break
    @case('green')
        <span class="py-1 px-2 bg-green-200 text-green-600 text-xs rounded-md">
            {!!  $slot !!}
        </span>
        @break
    @case('blue')
        <span class="py-1 px-2 bg-blue-200 text-blue-600 text-xs rounded-md">
            {!!  $slot !!}
        </span>
        @break
    @default
        <span class="py-1 px-2 bg-gray-200 text-gray-600 text-xs rounded-md">
            {!!  $slot !!}
        </span>
@endswitch