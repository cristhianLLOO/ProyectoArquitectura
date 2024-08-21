@extends('base_user')

@section('estilo')
<link rel="stylesheet" href="{{ asset('css/style_pago.css') }}">
@endsection

@section('titulo')
<title>Seleccionar Método de Pago</title>
@endsection

@section('principal')
<div class="box">
    <div class="formas_pago">
        <h1 class="pago__titulo">¿Cómo quieres pagar?</h1>
        <form action="{{ route('pago.process_payment') }}" method="POST">
            @csrf
            <div class="forma_pago">
                <label>
                    <input type="radio" name="metodo_pago" value="Mercado Credito" required>
                    <span>Mercado Credito</span>
                </label>
            </div>
            <div class="forma_pago">
                <label>
                    <input type="radio" name="metodo_pago" value="MasterCard Credito" required>
                    <span>MasterCard Crédito</span>
                </label>
            </div>
            <div class="forma_pago">
                <label>
                    <input type="radio" name="metodo_pago" value="MasterCard Debito" required>
                    <span>MasterCard Débito</span>
                </label>
            </div>
            <div class="forma_pago">
                <label>
                    <input type="radio" name="metodo_pago" value="Nueva Tarjeta de credito" required>
                    <span>Nueva Tarjeta de Crédito</span>
                </label>
            </div>
            <div class="forma_pago">
                <label>
                    <input type="radio" name="metodo_pago" value="Nueva tarjeta de debito" required>
                    <span>Nueva Tarjeta de Débito</span>
                </label>
            </div>
            <button type="submit">Realizar Pago</button>
        </form>
    </div>
</div>
@endsection
