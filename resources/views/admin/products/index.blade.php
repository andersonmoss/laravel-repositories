@extends('adminlte::page')
@section('title', 'Listagem Produtos')

@section('content_header')
          <h1>Produtos <a href="{{route('products.create')}}" class="btn btn-success btn-sm">Adicionar</a> </h1>
@endsection

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">
          <div class="card">
            <div class="card-header">
              <form class="form-inline" action="{{route('products.search')}}" method="POST">
                @csrf
                
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" name="search" type="text" placeholder="Pesquisar">                 
                </div>
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </form>

              @if (isset($search))
                  <p>Resultados para: <strong>{{$search}}</strong></p>
              @endif

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @include('admin.products.includes.alerts')
              <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Titulo</th>
                    <th>Url</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th width='200px'>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                  <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->url}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->category->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>
                      <a href="{{route('products.edit', $product->id)}}">Editar</a> |
                      <a href="{{route('products.show', $product->id)}}">Visualizar</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              @if (isset($search))
                {!! $products->appends(['search'=>$search])->links() !!}
              @else
                {!! $products->links() !!}
              @endif
            </div>
          </div>
        </div>
      </div>      
    </div>
@endsection