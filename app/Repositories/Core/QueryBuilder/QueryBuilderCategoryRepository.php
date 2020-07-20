<?php

namespace App\Repositories\Core\QueryBuilder;

use DB;
use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class QueryBuilderCategoryRepository extends BaseEloquentRepository implements CategoryRepositoryInterface{

    protected $table = 'categories';

    public function search($search) {
        $categories = $this->tb
                ->where('title', 'LIKE', "%%{$search}%%")
                ->orWhere('url', 'LIKE', "%%{$search}%%")
                ->orWhere('description', 'LIKE', "%%{$search}%%")
                ->orderBy('id', 'desc')
                ->paginate(5);
        return $categories;
    }
}