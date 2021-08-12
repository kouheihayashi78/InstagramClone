@extends('layouts.auth')

@include('navbar')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
    サインアウト<br/>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
</form>
<p>このページは仮のトップページです。</p>
<a href="#" class="btn btn-primary">仮のボタンです</a>
@endsection