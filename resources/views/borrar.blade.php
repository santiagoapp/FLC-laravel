
@extends('adminlte::page')

@section('title', 'Inicio')

@section('css')
<link rel="stylesheet" href="{{asset('vendor/adminlte/vendor/fullcalendar/css/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/adminlte/vendor/fullcalendar/css/fullcalendar.print.min.css')}}">

@stop

@section('content_header')
<h1>Inicio</h1>
@stop

@section('content')

@foreach($result as $asd)
<p>{{$asd}}</p>
@endforeach

@stop

@section('js')

<script src="{{asset('vendor/adminlte/vendor/fullcalendar/js/moment.js')}}"></script>
<script src="{{asset('vendor/adminlte/vendor/fullcalendar/js/fullcalendar.min.js')}}"></script>



@stop

