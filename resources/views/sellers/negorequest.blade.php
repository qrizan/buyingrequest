@extends('layouts.app')
@section('content')
	{!! Form::open(['route' => 'negorequest.store']) !!}
		@include('sellers._form')
		{!! Form::hidden('request_id', $showrequest->id) !!}
	{!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}	
	{!! Form::close() !!}
@stop