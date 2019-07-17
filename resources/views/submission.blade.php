@extends('layouts.app')

@section('content')
  <div class="container">

    <h2>Submission</h2>
    {{-- @php print("<pre>".print_r(json_decode($submission->form_data_raw),true)."</pre>") @endphp --}}
    @php $fields = json_decode($submission->form_data_raw, true) @endphp
    @php unset($fields['g-recaptcha-response']) @endphp
    @php unset($fields['tabs']) @endphp

    @foreach ($fields as $key => $value)
      @if (is_array($value) && (substr($key, 0, 9) === 'fieldset_'))
        <fieldset class="card mt-4 mb-4">
          <div class="card-header">{{ ucfirst(str_replace('fieldset_','',$key)) }}</div>
          <table class="table table-striped mb-0">
            @foreach ($value as $key2 => $value2)
              <tr>
                <td>
                  <strong>{{ucfirst(str_replace('_','',$key2))}}</strong>
                </td>
                <td>
                  @if(is_array($value2))
                    @foreach ($value2 as $key3 => $value3)
                      <strong>{{ucfirst(str_replace('_','',$key3))}}:</strong> {{$value3 }}<br/>
                    @endforeach
                  @else
                    {{ $value2 }}
                  @endif
                </td>
              </tr>
            @endforeach
          </table>
        </fieldset>
      @else
        <p><strong>{{ucfirst(str_replace('_','',$key))}}:</strong> {{ is_array($value) ? implode($value,', ') : $value }}</p>
      @endif
    @endforeach
  </div>
@endsection