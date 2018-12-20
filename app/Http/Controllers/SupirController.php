<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supir;
use App\User;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use Session;

class SupirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supirs = Supir::all();
        foreach ($supirs as $supir) {
            $supirs->view_hidangan = [
                'href' => 'api/v1/supir/' . $supir->id,
                'method' => 'GET'
            ];
        }
        $response =  $supirs;

        return response()->json($response,200);
    }

    public function indexSupir(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {

            $supirs = Supir::select(['id', 'nama_supir']);

            return Datatables::of($supirs)
            ->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'nama_supir', 'name' => 'nama_supir', 'title' => 'Nama Supir']);

        return view('supir.index')->with(compact('html'));
    }
    public function indexPetugas(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {

            $user = User::select(['id', 'name']);

            return Datatables::of($user)
            ->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Nama Petugas']);

        return view('petugas.index')->with(compact('html'));
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
    }
}
