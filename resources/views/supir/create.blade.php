 @extends('layouts.app')

@section('dashboard')
   Supir
   <small>Tambah Supir</small>
@endsection

@section('breadcrumb')
   <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
   <li><a href="{{ url('/admin/Supirs') }}">Supir</a></li>
   <li class="active">Tambah Supir</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Supir</h3>
                </div>
                <!-- /.box-header -->
                {!! Form::open(['url' => route('supir.store'), 'method' => 'post']) !!}
                    @include('supir._form')
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
