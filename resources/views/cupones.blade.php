@extends('base_user')
@section('estilo')
<link rel="stylesheet" href="css/style_cupones.css">
<script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('titulo')
<title>Cupones</title>
@endsection
@section('ajustes')


@endsection
@section('principal')
<div class="box">
    <h2 class="title2">Agregar Cupones</h2>
<form action="cupones" method="post">
    @csrf
	<div class="modal-body">
    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
<input type="text"  name="name" class="mt-1 p-2 border rounded-md w-full text-black">

<label for="descuento" class="block text-sm font-medium text-gray-700">Descuento</label>
<input type="text"  name="discount" class="mt-1 p-2 border rounded-md w-full text-black">

<label for="fecha_de_vencimiento" class="block text-sm font-medium text-gray-700">Fecha de vencimiento</label>
<input type="text"  name="date" class="mt-1 p-2 border rounded-md w-full text-black">
</div>
	<div class="modal-footer">
    <input class="btn_input2" type="submit" value="Agregar">
	</div>
</div>
  </div>
  </form>
  </div>
@endsection