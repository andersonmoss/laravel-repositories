@csrf
<div class="card-body">
  <div class="form-group">
    <label for="title">Título</label>
    <input type="text" value="{{$product->title ?? old('title')}}" class="form-control" id="title" name="title">
  </div>
  <div class="form-group">
    <label for="url">Url</label>
    <input type="text" value="{{$product->url ?? old('url')}}" class="form-control" id="url" name="url">
  </div>
  <div class="form-group">
    <label for="price">Preço</label>
    <input type="float" value="{{$product->price ?? old('price')}}" class="form-control" id="price" name="price">
  </div>
  <div class="form-group">
    <label>Categoria</label>
    <select class="custom-select" name="category_id">
      <option value="">Escolha</option>
      @foreach ($categories as $category)
        <option value="{{$category->id}}" @if (isset($product->category_id) && $category->id == $product->category_id) selected  @endif>{{$category->title}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="description">Descrição</label>
    <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{$product->description ?? old('description')}}</textarea>
  </div>
</div>
<div class="card-footer">
  <button type="submit" class="btn btn-primary">Salvar</button>
</div>