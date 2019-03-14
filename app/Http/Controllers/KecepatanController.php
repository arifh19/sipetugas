<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecepatan;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use Session;
class KecepatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        $kecepatans = Kecepatan::where('status',1)->with('supir')->with('bus')->get();
        // if ($request->ajax()) {

        //     $kecepatans = Penumpang::with('supir')->with('bus');

        //     return Datatables::of($kecepatans)
        //     ->addColumn('action', function($kecepatan) {
        //         return view('datatable._grafik', [
        //             'model'             => $supir,
        //             'form_url'          => route('supir.destroy', $kecepatan->id),
        //             'edit_url'          => route('supir.edit', $kecepatan->id),
        //             // 'view_url'          => route('bus.show', $bus->id),
        //             'confirm_message'    => 'Yakin mau menghapus ' . $kecepatan->nama_supir . '?'
        //         ]);
        //     })->make(true);
        // }

        // $html = $htmlBuilder
        // ->addColumn(['data' => 'supir.nama_supir', 'name' => 'supir.nama_supir', 'title' => 'Nama Supir'])
        // ->addColumn(['data' => 'bus.plat_nomer', 'name' => 'nama_supir', 'title' => 'Nama Supir'])
        // ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => true, 'searchable' => true]);


        return view('kecepatan.index')->with(compact('kecepatans'));
    }
    public function indexApi()
    {
        $kecepatans = Kecepatan::all();

        $response =  $kecepatans;

        return response()->json($response,200);
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
            'status' => 'required',
            'bus_id' => 'required',
            'supir_id' => 'required',

        ]);
        $supir = Supir::find($request->input('supir_id'));
        $bus = Bus::find($request->input('bus_id'));
        $supir->status = $request->input('status');
        $bus->status = $request->input('status');
        $bus->save();
        $supir->save();


        if($kecepatan->save()){
            $message = [
                'bus' => $bus,
                'supir' => $supir,
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
