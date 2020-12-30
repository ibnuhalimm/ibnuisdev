@component('mail::message')
## Hi bro,
You got new message

-----

{{ $data->name . ' <' . $data->email . '>' }} <br><br>

{!! $data->message !!}

-----

@component('mail::button', ['url' => 'mailto:' . $data->email])
Reply Email
@endcomponent

@endcomponent
