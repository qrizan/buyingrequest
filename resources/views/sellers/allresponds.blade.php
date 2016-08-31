@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Semua Permintaan Yang Di Laporkan</div>

                <div class="panel-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Email</th>
								<th>Time Expired</th>
								<th>Time Deadline</th>	
								<th>#</th>		
							</tr>
						</thead>
					<tbody>
					@foreach($allresponds as $r)
						<tr>
							<td>{{ $r->email }}</td>
							<td>{{ $r->expired }}</td>
							<td>{{ $r->deadline }}</td>		
							<td>
								<a href="{{ route('respondrequest.show', $r->id)}}" class="btn btn-primary btn-sm">View</a>
							</td>								
						</tr>
					@endforeach
					</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop