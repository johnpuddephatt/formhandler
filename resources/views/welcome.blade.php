@extends('layouts.app')

@section('content')

  <div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/zXE32nJQ" method="post">


      <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" placeholder="name">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" type="email" name="email" placeholder="email">
      </div>
      <div class="form-group">
        <label for="name">Subject</label>
        <input class="form-control" type="text" name="_subject" placeholder="subject">
      </div>


      <input type="text" name="_honey" value="" style="display:none">
      <input type="text" name="_redirect" value="http://www.msn.com">

      <input type="file" name="file">


      <div class="form-group">
        <label for="message">Body</label>
        <textarea class="form-control" name="message"></textarea>
      </div>

      {!! Captcha::display() !!}

      <input class="btn btn-primary" type="submit" value="Send" name="submit">

    </form>

  </div>
@endsection