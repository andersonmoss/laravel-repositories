@csrf
<div class="card-body">
  <div class="form-group">
    <label for="title">Título</label>
    <input type="text" value="{{$category->title ?? old('title')}}" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="url">Url</label>
    <input type="text" value="{{$category->url ?? old('url')}}" class="form-control" id="url" name="url">
  </div>
  <div class="form-group">
    <label for="description">Descrição</label>
    <input type="text" value="{{$category->description ?? old('description')}}" class="form-control" id="description" name="description">
  </div>
</div>
<div class="card-footer">
  <button type="submit" class="btn btn-primary">Salvar</button>
</div>