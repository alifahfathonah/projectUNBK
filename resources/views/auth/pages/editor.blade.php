@extends('auth.template')
@section('mainadmin')
<div class="">
  <div class="row">
    
    <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Editor</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <textarea  id="ckeditor" class="ckeditor"></textarea>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </div>
</div>
@endsection