@extends('layouts.app')

@section('dashboard')
Kategori
   <small>Ubah Bus</small>
@endsection

@section('breadcrumb')
   <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
   <li><a href="{{ url('/bus') }}">Bus</a></li>
   <li class="active">Ubah Bus</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ubah Bus</h3>
                </div>
                <!-- /.box-header -->
                {!! Form::model($bus, ['url' => route('bus.update', $bus->id), 'method' => 'put']) !!}
                    @include('bus._form')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
