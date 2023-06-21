<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Validator;
class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jabatan::all();
        return view('contents.admin.jabatan',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Jabatan();
        return view('contents.admin.jabatanform',compact('model'));
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
            'name' => 'required'
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

            $data = new Jabatan();
            $data->nama = $request->name;
            $data->kategori = $request->kategori;
            $data->telp = $request->telp;
            // $data->alamat = $request->alamat;
            $data->jenis_kelamin = $request->jeniskelamin;
            $data->jurusan = $request->jurusan;
            $data->prodi = $request->prodi;
            $data->gambar = $image;

            $data->save();

            $pen = new Pendaftaran();
            $pen->id_anggota = 0;
            $pen->id_jabatan = $data->id;
            $pen->save();

            return redirect()
                ->route('success')
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
        $model = Jabatan::find($id);
        return view('contents.admin.jabatanform',compact('model'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required'
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
                $imagew = "/images/".$filename;
            }else{
                $imagew = $request->gambarw;
            }

            $data = Jabatan::find($id);
            $data->nama = $request->name;
            $data->kategori = $request->kategori;
            $data->telp = $request->telp;
            // $data->alamat = $request->alamat;
            $data->jenis_kelamin = $request->jeniskelamin;
            $data->jurusan = $request->jurusan;
            $data->prodi = $request->prodi;
            $data->gambar = $imagew;

            $data->save();

            return redirect()
                ->route('success')
                ->with('message', 'Data berhasil disimpan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Jabatan::find($id);

        $post->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }
}
