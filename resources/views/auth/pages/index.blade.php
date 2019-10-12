@extends('auth.template')
@section('mainadmin')
@include('auth.pages.include.contentHeader')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form action="{{ url('/home') }}" method="post">
        @csrf
        <select class="form-control" name="periode"  onchange="this.form.submit()" required>
        <option value="">--pilih periode--</option>
        @foreach($periode as $periode)
        <option value="{{ $periode->id_periode }}" {{ $click == $periode->id_periode ? 'selected' : '' }}>{{ $periode->judul_periode }}</option>
        @endforeach
      </select>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
<div class="row">
	<div class="col-md-12">
          <!-- BAR CHART -->
          <br>
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik IPA</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart-ipa" style="height: 350px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <div class="col-md-12">
         
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Grafik IPS</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart-ips" style="height: 350px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
</div>

@endsection