@extends('layout')

@section('title', 'Servicio | ' . $servicio->titulo)

@section('content')
@auth
    <h2>DETALLE</h2>
    <tr>
        <td colspan="4" style="text-align: center;">
            <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-primary" style="margin-right: 10px;">Editar</a>
            <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Eliminar</button>
            </form>
        </td>
    </tr>
@endauth
    <table class="table table-bordered">
    <tr>
        <th>Título</th>            
        <th>Descripción</th>
        <th>Fecha Creación</th>
    </tr>
        
    <tr>
        <td>
            {{ $servicio->titulo }}
        </td>
        <td>
            {{ $servicio->descripcion }}
        </td>
        <td>
             {{ $servicio->created_at->diffForHumans() }}
        </td>
    </tr>
    </table>
   

@endsection