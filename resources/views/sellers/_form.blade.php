<div class="form-group {!! $errors->has('deskripsi') ? 'has-error' : '' !!}">
	{!! Form::label('deskripsi', 'Deskripsi Produk') !!}
	{!! Form::textarea('deskripsi', $showrequest->deskripsi, ['class'=>'form-control']) !!}
	{!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('deadline') ? 'has-error' : '' !!}">
	{!! Form::label('deadline', 'Deadline penyediaan barang') !!}
	{!! Form::text('deadline', $showrequest->deadline, ['class'=>'form-control datepicker']) !!}
	{!! $errors->first('deadline', '<p class="help-block">:message</p>') !!}					
</div>					

<div class="form-group {!! $errors->has('deskripsi') ? 'has-error' : '' !!}">
	{!! Form::label('comment', 'Komentar') !!}
	{!! Form::textarea('comment', null, ['class'=>'form-control','rows' => 3]) !!}
	{!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
</div>

