@extends('layouts.nemesys')

@section('title','PCD - Nova atividade')

@include('partials.snackbar-header')

@section('script')
    <script src="{{ asset('js/submit_confirm.js') }}"></script>
@endsection

@section('nav-logo','black')

@section('nav-items')
@endsection

@section('content')
@include('partials.snackbar-body')

            
    <div class="display-4 mt-3">Novo Registro</div>

<!--                    <form class="form-horizontal" method="POST" action="{{ route('register') }}"> -->
        <form method="POST" action="{{ route('registerAdmin.store') }}">

            {{ csrf_field() }}

            <div class="row mt-5 justify-content-center">
                    <div class="col-4 text-left form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="lead">Nome</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                        
                    </div>

                    <div class="w-100"></div>

                    <div class="col-4 text-left form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="lead">E-Mail Address</label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>


<!--                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
-->


                        <div class="w-100"></div>

                        <div class="form-group col-4 text-left"
                            
                            <label class="lead">Cargo </label>

                            <select class="form-control" name="cargo">
                            @foreach ($cargos as $cargo)
                                <option>{{ $cargo->nome }}</option>
                            @endforeach
                            </select>
                        </div>

                        <!--<div class="col-8 form-check">
                            <input type="checkbox" class="form-check-input" name="direx" id="check">
                            <label class="form-check-label" for="check">Membro Direx?</label>
                        </div>
                        

                        <div class="col-2"></div>

                        -->

                        <div class="col-12 mt-3 form-group">
                            
                                <button type="submit" class="btn btn-lg btn-dark">
                                    Registrar
                                </button>
                        </div>
                    </form>
@endsection
