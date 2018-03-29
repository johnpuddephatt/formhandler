@extends('layouts.app')

@section('content')
  <div class="container">

    <h3>Submissions</h3>

    <table class="table table-striped">
      <thead>
      <tr><th>Date</th><th>Name</th><th>Subject</th><th>Email</th><th>Raw</th></tr>
      </thead>
      <tbody>
        @foreach ($submissions as $submission)
          <tr><td>{{ $submission->created_at }}</td><td>{{ $submission->name }}</td><td>{{ $submission->_subject }}</td><td>{{ $submission->email }}</td><td><a href="#" data-toggle="modal" data-target="#modal-{{$submission->id}}">View raw</a></td></tr>
        @endforeach
      </tbody>
    </table>

    {{ $submissions->links() }}

    @foreach ($submissions as $submission)
      <div id="modal-{{$submission->id}}" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <pre>{{ json_encode(json_decode($submission->form_data_raw), JSON_PRETTY_PRINT) }}</pre>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection