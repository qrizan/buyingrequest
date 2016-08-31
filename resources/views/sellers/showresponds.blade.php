@extends('layouts.app')
@section('content')
<div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Permintaan Direspon</div>

                <div class="panel-body">
	   				<div class="row">                             
						<div class="col-md-9">
							@foreach($responds as $r)
								<blockquote>
								  <p>{{ $r->deskripsi }}</p>
								  <b>Komentar Seller :</b>
								  <footer> {{ $r->comment }}</footer>
								  <br></br>
								  <i>Deadline : {{ $r->deadline }}</i>
								</blockquote>							
							@endforeach
						</div>
	    			</div>
                </div>
            </div>
        </div>
</div>
@stop