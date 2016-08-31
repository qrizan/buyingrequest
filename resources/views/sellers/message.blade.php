@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Kirim pesan penawaran ke seller</div>

                <div class="panel-body">
					<div class="form-group {!! $errors->has('message') ? 'has-error' : '' !!}">
                        {!! Form::open(['route' => 'negorequest.store']) !!}
                            {!! Form::textarea('message', NULL, ['class'=>'form-control']) !!}
                            {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
                            <br/>
                            {!! Form::submit('Send Message', ['class'=>'btn btn-primary']) !!}    
                            {!! link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-default']) !!}
                        {!! Form::close() !!}

					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop