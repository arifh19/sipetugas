<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penumpang;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use Session;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penumpangs = Penumpang::all();

        $response =  $penumpangs;

        return response()->json($response,200);
    }
    public function indexPenumpang(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {

            $penumpang = Penumpang::with('supir')->with('bus');

            return Datatables::of($penumpang)
            ->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'naik_pelajar', 'name' => 'naik_pelajar', 'title' => 'Pelajar Masuk'])
        ->addColumn(['data' => 'turun_pelajar', 'name' => 'turun_pelajar', 'title' => 'Pelajar Keluar'])
        ->addColumn(['data' => 'naik_umum', 'name' => 'naik_umum', 'title' => 'Umum Masuk'])
        ->addColumn(['data' => 'turun_umum', 'name' => 'turun_umum', 'title' => 'Umum Keluar'])
        ->addColumn(['data' => 'lokasi', 'name' => 'lokasi', 'title' => 'Lokasi'])
        ->addColumn(['data' => 'jumlah', 'name' => 'jumlah', 'title' => 'Jumlah Penumpang'])
        ->addColumn(['data' => 'supir.nama_supir', 'name' => 'supir.nama_supir', 'title' => 'Nama Supir'])
        ->addColumn(['data' => 'bus.plat_nomer', 'name' => 'bus.plat_nomer', 'title' => 'Plat Nomor'])
        ->addColumn(['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Waktu']);

        return view('monitoring.index')->with(compact('html'));
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
        $this->validate($request,[
            'naik_pelajar' => 'required',
            'naik_umum' => 'required',
            'turun_pelajar' => 'required',
            'turun_umum' => 'required',
            'lokasi' => 'required',
            'jumlah' => 'required',

        ]);
        $penumpang = Penumpang::create($request->except('user_id'));

        if($penumpang->save()){
            $message = [
                'penumpang' => $penumpang
            ];
            return response()->json($message,201);
        }

        $response = [
            'msg' => 'Error during creation',
        ];
        return response()->json($response,404);
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
