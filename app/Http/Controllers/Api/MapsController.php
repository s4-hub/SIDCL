<?php

namespace App\Http\Controllers\Api;

use App\Perusahaanbinaan;
use Illuminate\Http\Request;
use App\Http\Resources\DatasCollection;
use App\Http\Resources\DatasItem;
use App\Http\Controllers\Controller;

class MapsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DatasCollection(Perusahaanbinaan::get());
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
        $this->validate($request, Perusahaanbinaan::rules(false));
        if (!Perusahaanbinaan::create($request->all())) {
            return [
                'message' => 'Bad Request',
                'code' => 400,
            ];
        } else {
            return [
                'message' => 'OK',
                'code' => 200,
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perusahaanbinaan  $perusahaanbinaan
     * @return \Illuminate\Http\Response
     */
    public function show(Perusahaanbinaan $perusahaanbinaan)
    {
        return new DatasItem($perusahaanbinaan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perusahaanbinaan  $perusahaanbinaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perusahaanbinaan $perusahaanbinaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perusahaanbinaan  $perusahaanbinaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perusahaanbinaan $perusahaanbinaan)
    {
        $this->validate($request, Perusahaanbinaan::rules(true, $perusahaanbinaan->id));
        if (!$perusahaanbinaan->update($request->all())) {
            return [
                'message' => 'Bad Request',
                'code' => 400,
            ];
        } else {
            return [
                'message' => 'OK',
                'code' => 201,
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perusahaanbinaan  $perusahaanbinaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perusahaanbinaan $perusahaanbinaan)
    {
        if ($perusahaanbinaan->delete()) {
            return [
                'message' => 'OK',
                'code' => 204,
            ];
        } else {
            return [
                'message' => 'Bad Request',
                'code' => 400,
            ];
        }
    
    }
}
