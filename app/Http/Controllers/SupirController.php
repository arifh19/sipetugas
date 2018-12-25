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
    public function indexApi()
    {
        $supirs = Supir::leftJoin('kecepatans', 'supirs.id', '=', 'kecepatans.supir_id')
                ->where('status','!=',1)
                ->select('supirs.id', 'supirs.nama_supir', 'supirs.created_at','supirs.updated_at')
                ->get();
        foreach ($supirs as $supir) {
            $supirs->view_hidangan = [
                'href' => 'api/v1/supir/' . $supir->id,
                'method' => 'GET'
            ];
        }
        $response =  $supirs;

        return response()->json($response,200);
    }

    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {

            $supirs = Supir::select(['id', 'nama_supir']);

            return Datatables::of($supirs)
            ->addColumn('action', function($supir) {
                return view('datatable._action', [
                    'model'             => $supir,
                    'form_url'          => route('supir.destroy', $supir->id),
                    'edit_url'          => route('supir.edit', $supir->id),
                    // 'view_url'          => route('bus.show', $bus->id),
                    'confirm_message'    => 'Yakin mau menghapus ' . $supir->nama_supir . '?'
                ]);
            })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'nama_supir', 'name' => 'nama_supir', 'title' => 'Nama Supir'])
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => true, 'searchable' => true]);


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
        return view('supir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_supir' => 'required:supirs'
        ],
        [
            'nama_supir.required' => 'Nama Supir masih kosong',
        ]);

        $supir = Supir::create($request->all());

        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Berhasil menyimpan $supir->nama_supir"
        ]);

        return redirect()->route('supir.index');
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
        $supir = Supir::find($id);

        return view('supir.edit')->with(compact('supir'));
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
        $this->validate($request, [
            'nama_supir' => 'required:supirs'
        ], [
            'nama_supir.required' => 'Nama Supir masih kosong',
        ]);

        $supir = Supir::find($id);

        $supir->update($request->only('nama_supir'));

        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Berhasil mengubah $supir->nama_supir"
        ]);

        return redirect()->route('supir.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Supir::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Supir berhasil dihapus"
        ]);

        return redirect()->route('supir.index');
    }
}
