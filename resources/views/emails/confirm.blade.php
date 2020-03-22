@component('mail::message')
# Booking Id
{{$data->booking_id}}

The body of your message.

@component('mail::button', ['url' => route('booking.cancel' , ['id' => $data->id])])
Cancel Booking
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
