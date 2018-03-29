@php
  unset($formData['_subject']);
  unset($formData['_redirect']);
  unset($formData['_honey']);
  unset($formData['submit']);
  unset($formData['cc']);
@endphp

@component('mail::message')

# New message received

@foreach ($formData as $key => $value)
@component('mail::panel')
## {{ $key }}

{{ $value }}
@endcomponent
@endforeach

Thanks!

@endcomponent

