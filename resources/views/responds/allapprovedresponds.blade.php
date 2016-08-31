@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Semua Penawaran Yang Di Terima</div>

                <div class="panel-body">
					@foreach($allresponds as $respond)
						<div class="col-md-9">
							<blockquote>
							  <b>Deskripsi : </b>
							  <p>{{ str_limit($respond->deskripsi, $limit = 150, $end = '...') }}</p>
							  <br></br>
							  <i>Deadline : {{ $respond->deadline }}</i>
							</blockquote>
						</div>
					@endforeach
					</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop