@extends('adminlte::page')
@section('title', 'Listagem da categoria')

@section('content_header')
    <h1>Categoria: <b>{{$category->title}}</b></h1>
    
@endsection

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detalhes da categoria</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p><strong>ID:</strong> {{$category->id}}</p><hr>
              <p><strong>Nome:</strong> {{$category->title}}</p><hr>
              <p><strong>URL:</strong> {{$category->url}}</p><hr>
              <p><strong>Descrição:</strong> {{$category->description}}</p><hr>
              <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Deletar</button>
              </form>
            </div>
            <!-- /.card-body -->
            
          </div>
        </div>
      </div>      
    </div>
@endsection