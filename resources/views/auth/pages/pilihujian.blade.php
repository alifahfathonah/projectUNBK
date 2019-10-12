@if(@count($cekmtujian) > 0)
{!! "<option selected>--Pilih--</option>" !!}
@foreach($cekmtujian as $mataujian)
{!! "<option value='$mataujian->mt_pelajaran'>$mataujian->mt_pelajaran</option>" !!}
@endforeach
@else
{!! "<option selected>- Data Tidak Ada, Pilih Yang Lain -</option>" !!}
@endif
