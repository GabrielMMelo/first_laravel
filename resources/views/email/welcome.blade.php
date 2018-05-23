@extends('layouts.email')

@section('content')
Bem-vindo,

<h1 style="color: purple;">{{ $user }}</h1>

Sua senha de acesso à plataforma é: <h3>{{ $pass  }}</h3>

<br>

É <strong>altamente</strong> recomendado que altere sua senha pela plataforma!

<h4>Seja muito bem-vindo, Emaker!</h4>

@endsection

