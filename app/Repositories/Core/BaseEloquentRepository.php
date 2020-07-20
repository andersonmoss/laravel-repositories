<?php

namespace App\Repositories\Core;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\EntityNotDefined;

class BaseEloquentRepository implements RepositoryInterface {

  protected $entity;

  public function __construct()
  {
    $this->entity = $this->resolveEntity();
  }

  public function getAll(){
    return $this->entity->all();
  }

  public function findById($id){
    return $this->entity->find($id);
  }

  public function findWhere($column, $value){
    return $this->entity->where($column, $value)->get();
  }

  public function findWhereFirst($column, $value){
    return $this->entity->where($column, $value)->first();
  }

  public function paginate($totalPage = 10){
    return $this->entity->paginate($totalPage);
  }

  public function store(array $data){
    return $this->entity->create($data);
  }

  public function update($id, array $data){
    return $this->findById($id)->update($data);
  }

  public function delete($id){
    $this->entity->find($id)->delete();
  }

  public function with(...$relationships){
    $this->entity = $this->entity->with($relationships);

    return $this;
  }

  public function orderBy($column, $order = 'DESC'){
    $this->entity = $this->entity->orderBy($column, $order);

    return $this;
  }

  public function resolveEntity(){
    if(!method_exists($this, 'entity')) {
      throw new EntityNotDefined;
    }

    return app($this->entity());
  }



}