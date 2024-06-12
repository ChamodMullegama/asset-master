<?php

namespace App\Http\Controllers;

use domain\Facades\CategoryFacade\CategoryFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Category/index');
    }

    public function all()
    {
        return CategoryFacade::all();
    }

    public function store(Request $request)
    {
        return CategoryFacade::store($request->all());

    }

    public function delete($category)
    {
        return CategoryFacade::delete($category);
    }

    public function status($category_id)
    {
        return CategoryFacade::status($category_id);
    }

    public function get(Request $request)
    {
        return CategoryFacade::get($request->category_id);
    }

    public function update(Request $request, $category_id)
    {
        return CategoryFacade::update($request->all(), $category_id);
    }
}
