@extends('layouts.app')

@section('dashboard')
    Dashboard
    <small>Admin</small>
@endsection

@section('breadcrumb')
    <li><a href="{{ url('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3 id='suhu'>{{$supir}}</h3>

          <p>Jumlah Supir</p>
        </div>
        <div class="icon">
          <i class="fas fa-radiation-alt"></i>
        </div>
        <a href="{{route('supir.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3 id='lampu'>{{$bus}}<sup style="font-size: 20px"></sup></h3>

          <p>Jumlah Bus</p>
        </div>
        <div class="icon">
          <i class="fas fa-bus"></i>
        </div>
        <a href="{{route('bus.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3 id='pintu'>{{$petugas}}</h3>

          <p>Jumlah Petugas</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="{{route('petugas.indexPetugas')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    {{-- <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3 id='pintu'>{{$kecepatan}}</h3>

                <p>Bus Aktif</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-bar"></i>
              </div>
              <a href="{{route('kecepatan.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}
    <!-- ./col -->
    {{--  <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3 id='kipas'>0</h3>

          <p>Kipas</p>
        </div>
        <div class="icon">
          <i class="fas fa-wind"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>  --}}
@endsection
