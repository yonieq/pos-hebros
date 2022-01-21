<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Setting;
use Illuminate\Http\Request;
use PDF;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelanggan.index');
    }

    public function data()
    {
        $pelanggan = Pelanggan::orderBy('kode_pelanggan')->get();

        return datatables()
            ->of($pelanggan)
            ->addIndexColumn()
            ->addColumn('select_all', function ($barang) {
                return '
                    <input type="checkbox" name="id_pelanggan[]" value="'. $barang->id_pelanggan .'">
                ';
            })
            ->addColumn('kode_pelanggan', function ($pelanggan) {
                return '<span class="label label-success">'. $pelanggan->kode_pelanggan .'<span>';
            })
            ->addColumn('aksi', function ($pelanggan) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('pelanggan.update', $pelanggan->id_pelanggan) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`'. route('pelanggan.destroy', $pelanggan->id_pelanggan) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi', 'select_all', 'kode_pelanggan'])
            ->make(true);
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
        $pelanggan = Pelanggan::latest()->first() ?? new Pelanggan();
        $kode_pelanggan = (int) $pelanggan->kode_pelanggan +1;

        $pelanggan = new Pelanggan();
        $pelanggan->kode_pelanggan = tambah_nol_didepan($kode_pelanggan, 5);
        $pelanggan->nama = $request->nama;
        $pelanggan->telepon = $request->telepon;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::find($id);

        return response()->json($pelanggan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id)->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();

        return response(null, 204);
    }

    public function cetakPelanggan(Request $request)
    {
        $datapelanggan = collect(array());
        foreach ($request->id_pelanggan as $id) {
            $pelanggan = Pelanggan::find($id);
            $datapelanggan[] = $pelanggan;
        }

        $datapelanggan = $datapelanggan->chunk(2);
        $setting    = Setting::first();

        $no  = 1;
        $pdf = PDF::loadView('pelanggan.cetak', compact('datapelanggan', 'no', 'setting'));
        $pdf->setPaper(array(0, 0, 566.93, 850.39), 'potrait');
        return $pdf->stream('pelanggan.pdf');
    }
}
