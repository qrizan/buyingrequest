<div class="form-group {!! $errors->has('deskripsi') ? 'has-error' : '' !!}">
	{!! Form::label('deskripsi', 'Deskripsi Produk') !!}
	{!! Form::textarea('deskripsi', null, ['class'=>'form-control']) !!}
	{!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {!! $errors->has('image') ? 'has-error' : '' !!}">
	{!! Form::label('image', 'Upload image produk') !!}
	{!! Form::file('image') !!}
	{!! $errors->first('image', '<p class="help-block">:message</p>') !!}	
</div>	

<div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
	{!! Form::label('email', 'Email') !!}
	{!! Form::text('email', null, ['class'=>'form-control']) !!}
	{!! $errors->first('email', '<p class="help-block">:message</p>') !!}		
</div>		

<div class="form-group {!! $errors->has('phone') ? 'has-error' : '' !!}">
	{!! Form::label('phone', 'Phone') !!}
	{!! Form::text('phone', null, ['class'=>'form-control']) !!}
	{!! $errors->first('phone', '<p class="help-block">:message</p>') !!}			
</div>			

<div class="form-group {!! $errors->has('expired') ? 'has-error' : '' !!}">
	{!! Form::label('expired', 'Tanggal permintaan expired') !!}
	{!! Form::text('expired', null, ['class'=>'form-control datepicker']) !!}
	{!! $errors->first('expired', '<p class="help-block">:message</p>') !!}				
</div>			

<div class="form-group {!! $errors->has('deadline') ? 'has-error' : '' !!}">
	{!! Form::label('deadline', 'Deadline penyediaan barang') !!}
	{!! Form::text('deadline', null, ['class'=>'form-control datepicker']) !!}
	{!! $errors->first('deadline', '<p class="help-block">:message</p>') !!}					
</div>					

<div class="form-group">
	{!! Form::checkbox('agree', 1, 0, ['class' => 'field']) !!}
	<i>Buat akun otomatis jika belum terdaftar</i>
</div>					
