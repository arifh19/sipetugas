{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message]) !!}
    <a class="btn btn-info" href="{{ $edit_url }}">Ubah</a>
    {{-- <a class="btn btn-success" href="{{ $view_url }}">Lihat</a> --}}
    {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
