<?php

namespace App\Repositories\Core\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Core\BaseEloquentRepository;

class EloquentCategoryRepository extends BaseEloquentRepositorytRepository implements CategoryRepositoryInterfaceositoryInterface {
  
  public function entity(){
    return Category::class;
  }

  public function search($search) {
    $categories =$this->entity::where('title', 'LIKE', "%%{$search}%%")
            ->orWhere('url', 'LIKE', "%%{$search}%%")
            ->orWhere('description', 'LIKE', "%%{$search}%%")
            ->orderBy('id', 'desc')
            ->paginate(5);
    return $categories;
  }

}