@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Account Type') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="type" name="type">
                                  <option value="customer">Customer</option>
                                  <option value="runner">Runner</option>
                                  <option value="manager">Manager</option>
                                  <option value="cook">Cook</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="business_name" class="col-md-4 col-form-label text-md-right">{{ __('Business Name') }}</label>

                            <div class="col-md-6">
                                <input id="business_name" type="text" class="form-control" name="business_name" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="business_city" class="col-md-4 col-form-label text-md-right">{{ __('Business City') }}</label>

                            <div class="col-md-6">
                                <input id="business_city" type="text" class="form-control" name="business_city" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="business_state" class="col-md-4 col-form-label text-md-right">{{ __('Business State') }}</label>

                            <div class="col-md-6">
                                <input id="business_state" type="text" class="form-control" name="business_state" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="business_zip" class="col-md-4 col-form-label text-md-right">{{ __('Business Zip') }}</label>

                            <div class="col-md-6">
                                <input id="business_zip" type="text" class="form-control" name="business_zip" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="business_country" class="col-md-4 col-form-label text-md-right">{{ __('Business Country') }}</label>

                            <div class="col-md-6">
                                <input id="business_country" type="text" class="form-control" name="business_country" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="business_fee" class="col-md-4 col-form-label text-md-right">{{ __('Business Fee') }}</label>

                            <div class="col-md-6">
                                <input id="business_fee" type="text" class="form-control" name="business_fee" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
