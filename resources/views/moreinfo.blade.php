@extends('Layout')

@section('content')
 <h2>More information</h2>
  @foreach($info as $key => $value)
    {{$key.'='. $value}}<br>
  @endforeach
@endsection