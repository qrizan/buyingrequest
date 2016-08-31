@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Permintaan Belum Direspon</div>

                <div class="panel-body">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Email</th>
								<th>Time Expired</th>
								<th>Time Deadline</th>			
							</tr>
						</thead>
					<tbody>
					@foreach($allrequests as $r)
						<tr>
							<td>{{ $r->email }}</td>
							<td>{{ $r->expired }}</td>
							<td>{{ $r->deadline }}</td>			
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