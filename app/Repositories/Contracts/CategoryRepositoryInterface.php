<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface {
    public function search();
    public function productsByCategoryId($id);
}