<?php
/**
 * Created by PhpStorm.
 * User: melo
 * Date: 27/07/2018
 * Time: 10:46
 */
?>

@extends('layouts.email')

@section('content')
    Olá,

    <h1 style="color: purple;">{{ $user }}</h1>

    <p> Informamos que você recebeu uma advertência, de acordo com as normas internas acordadas explicitamente no documento que rege o <strong>Programa de Controle Disciplinar </strong> da <strong>Emakers Júnior</strong>.</p>

    <h4 class="text-muted"> Informações da advertência: </h4>

    <span><strong>Advertência:</strong> {{  $advertenciaNome  }}</span>
    <br>
    <!-- TODO: Adicionar pontuação referente à advertencia recebida -->
    <span><strong>Data:</strong> {{  $advertencia->data  }}</span>
    <br>
    <span><strong>Hora:</strong> {{  $advertencia->hora  }}</span>
    <br>
    <span><strong>Descrição:</strong> {{  $advertencia->descricao  }}</span>

    <!-- TODO: Exibir quantos pontos o usuário possui atualmente (com a advertencia atual) -->

    <!-- TODO: Falar sobre recurso -->

@endsection


