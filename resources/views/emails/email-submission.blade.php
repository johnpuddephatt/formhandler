@php
  $message = $formData['message'] ?? '';
  unset($formData['_subject']);
  unset($formData['message']);
  unset($formData['_redirect']);
  unset($formData['_replyto']);
  unset($formData['_honey']);
  unset($formData['file']);
  unset($formData['submit']);
  unset($formData['cc']);
  unset($formData['g-recaptcha-response']);
@endphp

@component('mail::message')

# New message received

@foreach ($formData as $key => $value)
@if (is_array($value) && (substr($key, 0, 9) === 'fieldset_'))
## {{ $key }}

@foreach ($value as $key2 => $value2)
**{{ $key2 }}:** {{ is_array($value2) ? implode($value2,', ') : $value2 }}

@endforeach
@else
**{{ $key }}:** {{ is_array($value) ? implode($value,', ') : $value }}

@endif

@endforeach

@if($message)
@component('mail::panel')
## Message
{{ $message }}
@endcomponent
@endif

Thanks!

@endcomponent
