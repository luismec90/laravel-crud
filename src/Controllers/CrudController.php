<?php namespace Montoya\Crud\Controllers;

use App\Http\Controllers\Controller;

class CrudController extends Controller
{
    public function index()
    {
        return view('crud::index');
    }
}