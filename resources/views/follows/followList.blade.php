@extends('layouts.login')

@section('content')

@foreach($users as $user)

<tr>
  <td><img class="image-circle" src="{{ asset('images/' . $user->images ) }}" alt="ユーザーアイコン"></td>
  <td>{{ $user->username}}</td>
</tr>

@endforeach


@endsection
