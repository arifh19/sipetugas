<div class="box-body">
    <div class="form-group has-feedback{{ $errors->has('plat_nomer') ? ' has-error' : '' }}">
     {!! Form::label('plat_nomer', 'Plat Nomor') !!}

    {!! Form::text('plat_nomer', null, ['class' => 'form-control', 'placeholder' => 'Plat Nomor']) !!}
    {!! $errors->first('plat_nomer', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group has-feedback{{ $errors->has('kapasitas') ? ' has-error' : '' }}">
        {!! Form::label('kapasitas', 'Kapasitas') !!}

       {!! Form::text('kapasitas', null, ['class' => 'form-control', 'placeholder' => 'Kapasitas']) !!}
       {!! $errors->first('kapasitas', '<p class="help-block">:message</p>') !!}
       </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
</div>
