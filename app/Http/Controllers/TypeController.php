<?php

namespace App\Http\Controllers;

use domain\Facades\TypeFacade\TypeFacade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TypeController extends Controller
{
    public function index()
    {
        return Inertia::render('Type/index');
    }

    public function all()
    {
        return TypeFacade::all();
    }

    public function store(Request $request)
    {
        return TypeFacade::store($request->all());

    }

    public function delete($type)
    {
        return TypeFacade::delete($type);
    }

    public function status($type_id)
    {
        return TypeFacade::status($type_id);
    }

    public function get(Request $request)
    {
        return TypeFacade::get($request->type_id);
    }

    public function update(Request $request, $type_id)
    {
        return TypeFacade::update($request->all(), $type_id);
    }

}
