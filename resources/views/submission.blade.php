@extends('layouts.app')

@section('content')
  <div class="container">

    <h3>Submission</h3>
    @php print("<pre>".print_r(json_decode($submission->form_data_raw),true)."</pre>") @endphp
  </div>
@endsection