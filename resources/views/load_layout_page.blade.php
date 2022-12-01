<!--load ./layouts/app.blade.php file -->
@extends('layouts.app')

<!--input someting in layoutpage's content section -->
@section('content')
    <p>this page is load with blade layout setting</p></br>
    <p>{{$time}}</p>
@endsection