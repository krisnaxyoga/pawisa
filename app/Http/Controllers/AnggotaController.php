<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Pendaftaran;

use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($baga)
    {
        return view('auth.register',compact('baga'));
    }

    public function indexlist()
    {
        $data = Anggota::all();
        return view('contents.admin.anggota',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Anggota();
        return view('contents.admin.anggotaform',compact('model'));
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
            // dd($request->hasFile('gambar'))
            if ($request->hasFile('gambar')) {
                $image = $request->file('gambar');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $filename);
                // dd($filename);
                // Lakukan hal lain yang diperlukan, seperti menyimpan nama file dalam database
            }
           
            $image = "/images/".$filename;

            $data = new Anggota();
            $data->nama = $request->name;
            $data->telp = $request->telp;
            $data->alamat = $request->alamat;
            $data->jenis_kelamin = $request->jeniskelamin;
            $data->jurusan = $request->jurusan;
            $data->prodi = $request->prodi;
            $data->baga = $request->baga;
            $data->gambar = $image;

            $data->save();

            $pen = new Pendaftaran();
            $pen->id_anggota = $data->id;
            $pen->id_jabatan = 0;
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
        $model = Anggota::find($id);
        return view('contents.admin.anggotaform',compact('model'));
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

            $data = Anggota::find($id);
            $data->nama = $request->name;
            $data->telp = $request->telp;
            $data->alamat = $request->alamat;
            $data->jenis_kelamin = $request->jeniskelamin;
            $data->jurusan = $request->jurusan;
            $data->prodi = $request->prodi;
            $data->baga = $request->baga;
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
        $post = Anggota::find($id);

        $post->delete();
        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }
}
