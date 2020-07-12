@extends('adminlte::page')
@section('title', 'Editar categoria')

@section('content_header')
    <h1>Editar categoria</h1>
    
@endsection

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          @include('admin.categories.includes.alerts')
          <div class="card card-primary">
            
            <form role="form" action="{{route('categories.update', $category->id)}}" method="POST">
              @method('put')
              @include('admin.categories._partials.form')
            </form>
          </div>
        </div>
      </div>      
    </div>
@endsection