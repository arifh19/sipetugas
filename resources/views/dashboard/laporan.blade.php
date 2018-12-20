@extends('layouts.app')

@section('dashboard')
   Laporan
   <small>Daftar Laporan</small>
@endsection

@section('breadcrumb')
   <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
   <li class="active">Laporan</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
            <div class="callout callout-success">
              <h4>Selamat Datang di SIKOMATIK</h4>

              <p>Sistem Informasi Manajemen Proposal</p>
              
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                 <div class="box-header with-border">
                    <h3 class="box-title">Riwayat Penilaian Laporan</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                <!-- /.box-header -->
                <div class="box-body">
                    {{-- <p> --}}
                        {{-- <a class="btn btn-success" href="{{ url('/admin/proposals/create') }}">Tambah</a> --}}
                        {{-- <a class="btn btn-warning" href="{{ url('/admin/export/books') }}">Export</a> --}}
                    {{-- </p> --}}
                    @if (App\Proposal::where('user_id',Auth::user()->id)->count() == 0)
                                Tidak ada Laporan yang diinputkan
                    @else
                    {!! $html->table(['class' => 'table w3-responsive w3-table-all']) !!}
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('scripts')
    {!! $html->scripts() !!}
@endsection
