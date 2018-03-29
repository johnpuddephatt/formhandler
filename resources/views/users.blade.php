@extends('layouts.app')

@section('content')
  <div class="container">
    <h3>Registered email addresses</h3>
    <p>Addresses listed below are registered destinations. The code given can be used in the form action in place of the email address to keep email addresses private and reduce spam.</p>
    <table class="table table-striped">
      <thead>
        <tr><th>Email address</th><th>Code</th><th>Submissions</th></tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr><td>{{ $user->email }}</td><td>{{ Hashids::encode( $user->id ) }}</td><td><a href="/admin/users/{{ Hashids::encode($user->id ) }}">View {{$user->submissions_count}} emails</a></td></tr>
        @endforeach
      </tbody>
    </table>
    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-newuser">Add user</button>
    <div id="modal-newuser" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <form class="form" action="{{ url('/admin/users/add') }}" method="post">
          <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add new user</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="newpassword" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" name="submit" value="Add" class="btn btn-primary form-control">
          </div>
        </div>
        </form>
      </div>
    </div>
</div>
@endsection