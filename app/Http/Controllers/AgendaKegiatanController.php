<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\AgendaKegiatan;
use Illuminate\Support\Facades\Validator;

class AgendaKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AgendaKegiatan::all();
        return view('contents.admin.agenda',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new AgendaKegiatan();
        $kategori = Kategori::all();
        return view('contents.admin.agendaform',compact('model','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namakegiatan' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048', // maksimal 5MB
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors())
                ->withInput($request->all());
        } else {
            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $filename);

                // Lakukan hal lain yang diperlukan, seperti menyimpan nama file dalam database
            }
            $image = "/images/".$filename;

            $data = new AgendaKegiatan();
            $data->id_kategori = $request->id_kategori;
            $data->nama = $request->namakegiatan;
            $data->tgl_kegiatan = $request->tanggalkegiatan;
            $data->jumlahview = '0';
            $data->jenis_kegiatan = $request->jeniskegiatan;
            $data->deskripsi = $request->deskripsi;
            $data->gambar = $image;

            $data->save();

            return redirect()
                ->route('agenda.index')
                ->with('message', 'Data berhasil disimpan.');
        }
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
