<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;
use App\Kecepatan;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\DataTables;
use Session;
use Illuminate\Support\Facades\DB;


class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {

            $buses = Bus::select(['id', 'plat_nomer', 'kapasitas']);

            return Datatables::of($buses)
            ->addColumn('action', function($bus) {
                return view('datatable._action', [
                    'model'             => $bus,
                    'form_url'          => route('bus.destroy', $bus->id),
                    'edit_url'          => route('bus.edit', $bus->id),
                    // 'view_url'          => route('bus.show', $bus->id),
                    'confirm_message'    => 'Yakin mau menghapus ' . $bus->plat_nomer . '?'
                ]);
            })->make(true);
        }

        $html = $htmlBuilder
        ->addColumn(['data' => 'plat_nomer', 'name' => 'plat_nomer', 'title' => 'Plat Nomor'])
        ->addColumn(['data' => 'kapasitas', 'name' => 'kapasitas', 'title' => 'Kapasitas'])
        ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => true, 'searchable' => true]);

        return view('bus.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexApi()
    {
        $buses = Bus::all();


        foreach ($buses as $bus) {
            $buses->view_bus = [
                'href' => 'api/v1/bus/' . $bus->id,
                'method' => 'GET'
            ];
        }
        $response =  $buses;

        return response()->json($response,200);
    }
    public function create()
    {
        return view('bus.create');
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
            'plat_nomer' => 'required|unique:buses',
            'kapasitas' => 'required:buses'
        ], [
            'plat_nomer.required' => 'Plat Nomor masih kosong',
            'plat_nomer.unique' => 'Plat Nomor sudah ada',
            'kapasitas.required' => 'Kapasitas masih kosong',
        ]);

        $bus = Bus::create($request->all());

        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Berhasil menyimpan $bus->plat_nomer"
        ]);

        return redirect()->route('bus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bus = Bus::find($id);

        return view('bus.edit')->with(compact('bus'));
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
            'plat_nomer' => 'required|unique:buses',
            'kapasitas' => 'required:buses'
        ], [
            'plat_nomer.required' => 'Plat Nomor masih kosong',
            'plat_nomer.unique' => 'Plat Nomor sudah ada',
            'kapasitas.required' => 'Kapasitas masih kosong',
        ]);

        $bus = Bus::find($id);

        $bus->update($request->only('plat_nomer','kapasitas'));

        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Berhasil mengubah $bus->plat_nomer"
        ]);

        return redirect()->route('bus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Bus::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level" => "success",
            "icon" => "fa fa-check",
            "message" => "Bus berhasil dihapus"
        ]);

        return redirect()->route('bus.index');
    }
}
