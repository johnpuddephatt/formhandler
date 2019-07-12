@extends('layouts.app')

@section('content')
  <div class="container">

    <h2>Submission</h2>
    {{-- @php print("<pre>".print_r(json_decode($submission->form_data_raw),true)."</pre>") @endphp --}}
    @foreach (json_decode($submission->form_data_raw) as $key => $value)
      @if (is_array($value) && (substr($key, 0, 9) === 'fieldset_'))
        <h3>{{ $key }}</h3>
        <table>
          @foreach ($value as $key2 => $value2)
            <tr><td><strong>{{ $key2 }}</strong></td><td>{{ is_array($value2) ? implode($value2,', ') : $value2 }}</td></tr>
          @endforeach
        </table>
      @else
        <strong>{{ $key }}:</strong> {{ is_array($value) ? implode($value,', ') : $value }}
      @endif
    @endforeach
  </div>
@endsection