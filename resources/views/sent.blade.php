@extends('layouts.app')

@section('content')
  Form sent!

  <table class="table">
    @foreach ($formData as $key => $value)
      <tr>
        <td>{{ $key }}</td>
        <td>
        @if (is_array($value))
          {{ trim(implode($value, ", "), ", ") }}
        @else
          {{ $value }}
        @endif
        </td>
      </tr>
    @endforeach
  </table>

@endsection