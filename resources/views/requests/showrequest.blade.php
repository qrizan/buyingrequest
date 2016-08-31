@extends('layouts.app')
@section('content')
<div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Permintaan</div>

                <div class="panel-body">
	   				<div class="row">                
						@if (isset($showrequest->image) && $showrequest->image !== '')
						<div class="col-md-3">
							<div class="thumbnail">
								<img src="{{ url('/image/' . $showrequest->image) }}" class="img-rounded">
							</div>
						</div>
						@endif                
						<div class="col-md-9">
							<table class="table">
								<tr>
									<th>Email</th>
									<td>  :  </td>
									<td>{{ $showrequest->email }}</td>								
								</tr>
								<tr>
									<th>Time Expired</th>
									<td>  :  </td>								
									<td>{{ $showrequest->expired }}</td>								
								</tr>							
								<tr>
									<th>Time Deadline</th>
									<td>  :  </td>
									<td>{{ $showrequest->deadline }}</td>								
								</tr>														
							</table>
							<b>Deskripsi</b>
							<p>{{ $showrequest->deskripsi }}</p>
						</div>
	    			</div>

	    			<div class="row">
	    				<div class="col-md-12">
	    					<a href="{{ route('respondrequest.nego', $showrequest->id)}}" class="btn btn-primary btn-sm btn-warning">Negosiasi</a>
	    					<a href="{{ route('respondrequest.report', $showrequest->id)}}" class="btn btn-primary btn-sm btn-danger">Laporkan</a>
	    					<a href="{{ URL::previous() }}" class="btn btn-sm btn-default pull-right">Cancel</a>		    	
	    				</div>
	    			</div>
                </div>
            </div>
        </div>
</div>
@stop