<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use App\Business;
use App\Http\Resources\BusinessResource;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $businesses = QueryBuilder::for(Business::class)
                  ->allowedFilters('name','city','state','zip')
                  ->get();
        return response()->json(BusinessResource::collection($businesses));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $business = Business::create($request->all());
        return response()->json(new BusinessResource($business));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $business = Buiness::findOrFail($id);
        return response()->json(new BusinessResource($business));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $business = Business::findOrFail($id);
        $business->fill($request->all())->save();
        return response()->json(new BusinessResource($business));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Business::destroy($id);
    }
}
