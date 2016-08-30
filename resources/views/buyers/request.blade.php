@extends('layouts.app')
@section('content')
	{!! Form::open(['route' => 'buyingrequest.store', 'files' => true]) !!}
		@include('buyers._form')
	{!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}	
	{!! Form::close() !!}
@stop