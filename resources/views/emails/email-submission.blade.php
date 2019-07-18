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
  unset($formData['tabs']);
@endphp

@component('mail::message')

# New message received

@foreach ($formData as $key => $value)
@if (is_array($value) && (substr($key, 0, 9) === 'fieldset_'))

## {{ ucfirst(str_replace('_',' ',str_replace('fieldset_','',$key))) }}

@foreach ($value as $key2 => $value2)
**{{ ucfirst(str_replace('_',' ',$key2)) }}:**
@if(is_array($value2))
@foreach ($value2 as $key3 => $value3)
**{{ucfirst(str_replace('_',' ',$key3))}}:** {{$value3 }}<br>
@endforeach
@else
{{ $value2 }}<br>
@endif
@endforeach
@else
**{{ucfirst(str_replace('_',' ',$key2))}}:** {{ is_array($value) ? implode($value,', ') : $value }}

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
