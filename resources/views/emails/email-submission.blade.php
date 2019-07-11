@php
  $message = $formData['message'];
  unset($formData['_subject']);
  unset($formData['message']);
  unset($formData['_redirect']);
  unset($formData['_honey']);
  unset($formData['file']);
  unset($formData['submit']);
  unset($formData['cc']);
  unset($formData['g-recaptcha-response']);
@endphp

@component('mail::message')

# New message received

@foreach ($formData as $key => $value)
**{{ $key }}:** {{ $value }}

@endforeach

@component('mail::panel')
## Message
{{ $message }}
@endcomponent

Thanks!

@endcomponent
