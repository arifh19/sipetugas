<div class="box-body">
    <div class="form-group has-feedback{{ $errors->has('nama_supir') ? ' has-error' : '' }}">
     {!! Form::label('nama_supir', 'Nama Supir') !!}

    {!! Form::text('nama_supir', null, ['class' => 'form-control', 'placeholder' => 'Nama Supir']) !!}
    {!! $errors->first('nama_supir', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
</div>
