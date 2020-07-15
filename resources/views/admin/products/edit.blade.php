@extends('adminlte::page')
@section('title', 'Editar produto')

@section('content_header')
    <h1>Editar produto</h1>
    
@endsection

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          @include('admin.products.includes.alerts')
          <div class="card card-primary">
            
            <form role="form" action="{{route('products.update', $product->id)}}" method="POST">
              @method('put')
              @include('admin.products._partials.form')
            </form>
          </div>
        </div>
      </div>      
    </div>
@endsection