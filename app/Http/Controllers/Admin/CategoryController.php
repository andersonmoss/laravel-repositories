<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')
                            ->orderBy('id', 'desc')
                            ->paginate(5);
        
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreUpdateCategoryFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategoryFormRequest $request)
    {
        // Need to pass field by field because "query builder" doesnt verify for mass assignment
        DB::table('categories')->insert([
            'title'         => $request->title,
            'url'           => $request->url,
            'description'   => $request->description
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Cadastro realizado com sucesso!');
            //->withSuccess('Cadastrado com sucesso')
            //->withError
            //->withWarning
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        if(!$category) return redirect()->back();

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        if(!$category) return redirect()->back();

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategoryFormRequest $request, $id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        if(!$category) return redirect()->back();

        $category = DB::table('categories')->where('id', $id)->update([
            'title'         => $request->title,
            'url'           => $request->url,
            'description'   => $request->description
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('categories.index');
    }

    public function search(Request $request){
        $search = $request->search;
        $categories = DB::table('categories')
            ->where('title', 'LIKE', "%%{$search}%%")
            ->orWhere('url', 'LIKE', "%%{$search}%%")
            ->orWhere('description', 'LIKE', "%%{$search}%%")
            ->orderBy('id', 'desc')
            ->paginate(5);
        
        return view('admin.categories.index', compact('categories', 'search'));        
    }
}
