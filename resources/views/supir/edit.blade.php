@extends('layouts.app')

@section('dashboard')
Supir
   <small>Ubah Supir</small>
@endsection

@section('breadcrumb')
   <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
   <li><a href="{{ url('/supir') }}">Supir</a></li>
   <li class="active">Ubah Supir</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah Supir</h3>
                </div>
                <!-- /.box-header -->
                {!! Form::model($supir, ['url' => route('supir.update', $supir->id), 'method' => 'put']) !!}
                    @include('supir._form')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
