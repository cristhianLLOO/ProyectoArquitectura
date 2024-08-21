    @extends('base_user')
    @section('estilo')
    <link rel="stylesheet" href="css/style_pago.css">
    @endsection
    @section('titulo')
    <title>Devolucion</title>
    @endsection
    @section('principal')
    <div class="box">
        <div class="formas_pago">
            <h1 class="pago__titulo">¿Como quieres pagar?</h1>
            <a href="#">
                <div class="forma_pago">
                    <p>Mercado Credito</p>
                </a>
            </div>
            <a href="#">
                <div class="forma_pago">
                    <p>MasterCard Credito</p>
                </a>
            </div>
            <a href="#">
                <div class="forma_pago">
                    <p>MasterCard Debito</p>
                </a>
            </div>
            <a href="#">
                <div class="forma_pago">
                    <p>Nueva Tarjeta de credito</p>
                </a>
            </div>
            <a href="#">
                <div class="forma_pago">
                    <p>Nueva tarjeta de debito</p>
                </a>
            </div>
        </div>
    </div>
    @endsection