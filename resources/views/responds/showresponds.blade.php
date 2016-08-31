@extends('layouts.app')
@section('content')
<div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Permintaan Direspon</div>
                <div class="panel-body">
	   				<div class="row">                             
						<div class="col-md-12">
							<blockquote>
							  <b>Deskripsi : </b>
							  <p>{{ $respond->deskripsi }}</p>
							  <b>Komentar Seller :</b>
							  <footer> {{ $respond->comment }}</footer>
							  <br></br>
							  <i>Deadline : {{ $respond->deadline }}</i>
							</blockquote>
						</div>
						<div class="col-md-9 col-md-offset-3">
							@if (Auth::user()->role == 'buyer')
								<a href="{{ route('respondrequest.approved', $respond->id)}}" class="btn btn-sm btn-primary">Terima Penawaran</a>	
								<a href="{{ route('respond.message'	)}}" class="btn btn-sm btn-warning">Kirim Pesan</a>	
							@endif
	    					<a href="{{ URL::previous() }}" class="btn btn-sm btn-default pull-right">Cancel</a>	
						</div>
	    			</div>
                </div>
            </div>
        </div>
</div>
@stop