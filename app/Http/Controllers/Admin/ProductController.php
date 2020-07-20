<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProductFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->repository
                    ->orderBy('id')
                    ->with('category')
                    ->paginate();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateProductFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductFormRequest $request)
    {
        $this->repository->store($request->all());
        
        return redirect()
                    ->route('products.index')
                    ->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->repository->findById($id);
        if(!$product) return redirect()->back();

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->findById($id);
        if(!$product) return redirect()->back();

        $categories = Category::all();
        return view('admin.products.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateProductFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductFormRequest $request, $id)
    {
        $this->repository->update($id, $request->all());

        return redirect()
                    ->route('products.index')
                    ->with('success', 'Produto editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = count($this->repository->productsByCategoryId($id));
        if(count($products) > 0) {
            return redirect()
                   ->route('categories.index')
                   ->with('message', 'Não pode deletar porque existem produtos vinculados a essa categoria!');
        }

        $this->repository->delete($id);

        return redirect()
                    ->route('products.index')
                    ->with('success', 'Produto deletado com sucesso!');
    }

    public function search(Request $request){

        $search = $request->search;

        $products = $this->repository
                    ->with('category')
                    ->where('title', 'LIKE', "%%{$search}%%")
                    ->orderBy('id', 'desc')
                    ->paginate();

        return view('admin.products.index', compact(['products', 'search']));
    }
}
