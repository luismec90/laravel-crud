<?php

namespace App\Http\Controllers;

use App\upperEntity;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class upperEntityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lowerPluralEntity = upperEntity::paginate(20);

        return view('lowerPluralEntity.index', compact('lowerPluralEntity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            stringRules
        ],[
            stringMessages
        ]);

        upperEntity::create($request);


        Session::flash('flash_message', 'upperEntity successfully added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lowerEntity = upperEntity::findOrFail($id);

        return view('lowerPluralEntity.show',compact('lowerEntity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lowerEntity = upperEntity::findOrFail($id);

        $this->validate($request, [
            stringRules
        ],[
            stringMessages
        ]);

        $lowerEntity->update($request);

        Session::flash('flash_message', 'upperEntity successfully added!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lowerEntity = upperEntity::findOrFail($id);

        $lowerEntity->delete();

        Session::flash('flash_message', 'upperEntity successfully deleted!');

        return redirect()->route('lowerPluralEntity.index');
    }
}
