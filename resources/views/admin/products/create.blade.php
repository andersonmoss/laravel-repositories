@extends('adminlte::page')
@section('title', 'Cadastrar novo produto')

@section('content_header')
    <h1>Cadastrar novo produto</h1>
    
@endsection

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          @include('admin.products.includes.alerts')
          <div class="card card-primary">
            
            <form role="form" action="{{route('products.store')}}" method="POST">
              @csrf
              @include('admin.products._partials.form')
            </form>
          </div>
        </div>
      </div>      
    </div>
@endsection