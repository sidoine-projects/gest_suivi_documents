@component('mail::message')
# Introduction

The body of your message.
{{-- 
@component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

__Name:__ {{ $lead->name }}<br>
__Subject:__ {{ $lead->subject }}<br>
__Email:__ {{ $lead->email }}<br>
__Phone:__ {{ $lead->phone }}<br>
__Preferred:__ {{ $lead->preferred }}<br>

__Message__<br>
{{ $lead->message }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
