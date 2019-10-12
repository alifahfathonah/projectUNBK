@extends('client.template')
@section('mainclient')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5"><br><br><br>
            <div class="card" style="border-radius: 0;">
                <div class="card-header"><h3 align="center">{{ __('User Login') }}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/client/login') }}">
                        @csrf
                        <div class=" row">
                            <label for="noujian" class="col-md-3 col-form-label text-md-right">{{ __('No Ujian') }}</label>
                            <div class="col-md-9">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="border-radius: 0;background: red;color:#fff;border:1px solid red"> <i class="fa fa-user"></i> </span>
                                     </div>
                                    <input id="noujian" style="border-radius: 0;border:1px solid red" type="text" class="form-control @error('noujian') is-invalid @enderror" name="noujian" placeholder="Enter No Ujian!" value="{{ old('noujian') }}" required >
                                </div> <!-- form-group// -->
                               

                                @error('nis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-9">
                                 <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="border-radius: 0;"> <i class="fa fa-lock"></i> </span>
                                     </div>
                                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror " name="password" required autocomplete="current-password" placeholder="Enter Password" style="border-radius: 0;">
                                </div> <!-- form-group// -->
                               

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-9 offset-md-3">
                            <button type="submit" style="border-radius: 0;" class="btn btn-success btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection