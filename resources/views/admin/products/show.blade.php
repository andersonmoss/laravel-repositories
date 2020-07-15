@extends('adminlte::page')
@section('title', 'Listagem da produto')

@section('content_header')
    <h1>Produto: <b>{{$product->title}}</b></h1>
    
@endsection

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Detalhes da produto</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p><strong>ID:</strong> {{$product->id}}</p><hr>
              <p><strong>Nome:</strong> {{$product->title}}</p><hr>
              <p><strong>URL:</strong> {{$product->url}}</p><hr>
              <p><strong>Preço:</strong> {{$product->price}}</p><hr>
              <p><strong>Descrição:</strong> {{$product->description}}</p><hr>
              <form action="{{route('products.destroy', $product->id)}}" method="POST">
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