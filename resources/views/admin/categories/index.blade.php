@extends('adminlte::page')
@section('title', 'Listagem categorias')

@section('content_header')
          <h1>Categorias <a href="{{route('categories.create')}}" class="btn btn-success btn-sm">Adicionar</a> </h1>
@endsection

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">
          <div class="card">
            <div class="card-header">
              <form class="form-inline" action="{{route('categories.search')}}" method="POST">
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
              @include('admin.categories.includes.alerts')
              <table class="table table-bordered">
                <thead>                  
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Titulo</th>
                    <th>Url</th>
                    <th>Descrição</th>
                    <th width='200px'>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                  <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->url}}</td>
                    <td>{{$category->description}}</td>
                    <td>
                      <a href="{{route('categories.edit', $category->id)}}">Editar</a> |
                      <a href="{{route('categories.show', $category->id)}}">Visualizar</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              @if (isset($search))
                {!! $categories->appends(['search'=>$search])->links() !!}
              @else
                {!! $categories->links() !!}
              @endif
            </div>
          </div>
        </div>
      </div>      
    </div>
@endsection