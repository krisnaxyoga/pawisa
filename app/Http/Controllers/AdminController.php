<?php

/**
 * Codekop Toko Online
 *
 * @link       https://www.codekop.com/
 * @version    1.0.1
 * @copyright  (c) 2021
 *
 * File      : AdminController.php
 * Web Name  : Toko Online
 * Developer : Fauzan Falah
 * E-mail    : fauzancodekop@gmail.com / fauzan1892@codekop.com
 *
 *
 **/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Kategori;
use App\Models\AgendaKegiatan;
use App\Models\User;
use App\Models\Anggota;
use Carbon\Carbon;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'Admin Toko'
        ];
        return view('contents.admin.home', $data);
    }

    // produk
    public function agenda_kegiatan(Request $request)
    {
        $reqsearch = $request->get('search');
        $produkdb = AgendaKegiatan::leftJoin('kategori', 'agenda_kegiatan.id_kategori', '=', 'kategori.id')
            ->select('kategori.nama_kategori', 'agenda_kegiatan.*')
            ->when($reqsearch, function ($query, $reqsearch) {
                $search = '%' . $reqsearch . '%';
                return $query->whereRaw('nama_kategori like ? or nama like ?', [
                    $search, $search
                ]);
            });
        $data = [
            'title'     => 'Data Produk',
            'kategori'  => Kategori::All(),
            'produk'    => $produkdb->latest()->paginate(5),
            'request'   => $request
        ];
        return view('contents.admin.agenda_kegiatan', $data);
    }

    public function edit_agenda_kegiatan(Request $request)
    {
        $data = [
            'edit' => AgendaKegiatan::findOrFail($request->get('id')),
            'kategori' => Kategori::All(),
        ];
        return view('components.admin.agenda_kegiatan.edit', $data);
    }

    // data proses produk
    public function create_agenda_kegiatan(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            "id_kategori"   => "required",
            "gambar"        => "required|image|max:1024",
            "nama"   => "required",
            "jenis_kegiatan"     => "required",
            "jumlahview"    => "required",
        ]);

        if ($validator->passes()) {

            $image = $request->file('gambar');
            $input['imagename'] = 'produk_' . time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = storage_path('app/public/gambar');
            $image->move($destinationPath, $input['imagename']);

            AgendaKegiatan::insert([
                'id_kategori'   => $request->get("id_kategori"),
                'gambar'        => $input['imagename'],
                'nama'   => $request->get("nama"),
                'jenis_kegiatan'     => $request->get("jenis_kegiatan"),
                'jumlahview'    => $request->get("jumlahview"),
                'tgl_kegiatan' => $request->get('tglkegiatan'),
                'created_at'    => date('Y-m-d H:i:s'),
            ]);
            return redirect()->back()->with("success", " Berhasil Insert Data ! ");
        } else {
            return redirect()->back()->withErrors($validator)->with("failed", " Gagal Insert Data ! ");
        }
    }

    public function update_agenda_kegiatan(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            "id"            => "required",
            "id_kategori"   => "required",
            "nama"   => "required",
            "jenis_kegiatan"     => "required",
            "jumlahview"    => "required",
        ]);

        if ($validator->passes()) {
            $produkdb = AgendaKegiatan::findorFail($request->get('id'));
            if ($request->file('gambar')) {
                $validator = \Validator::make($request->all(), [
                    "gambar" => "required|image|max:1024",
                ]);
                if ($validator->passes()) {
                    $image = $request->file('gambar');
                    $input['imagename'] = 'produk_' . time() . '.' . $image->getClientOriginalExtension();

                    $destinationPath = storage_path('app/public/gambar');
                    $image->move($destinationPath, $input['imagename']);
                    $gambar = $input['imagename'];
                } else {
                    return redirect()->back()->withErrors($validator)->with("failed", " Gagal Update Data ! ");
                }
            } else {
                $gambar = $produkdb->gambar;
            }

            $produkdb->update([
                'id_kategori'   => $request->get("id_kategori"),
                'gambar'        => $gambar,
                'nama'   => $request->get("nama"),
                'jenis_kegiatan'     => $request->get("jenis_kegiatan"),
                'jumlahview'    => $request->get("jumlahview"),
                'tgl_kegiatan' => $request->get('tglkegiatan'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]);

            return redirect()->back()->with("success", " Berhasil Update Data Produk " . $request->get("nama") . ' !');
        } else {
            return redirect()->back()->withErrors($validator)->with("failed", " Gagal Update Data ! ");
        }
    }

    public function delete_agenda_kegiatan(Request $request, $id)
    {
        $produk = AgendaKegiatan::findOrFail($id);
        $produk->delete();
        return redirect()->back()->with("success", " Berhasil Delete Data Produk ! ");
    }

    // kategori
    public function kategori(Request $request)
    {
        if (!empty($request->get('id'))) {
            $edit = Kategori::findOrFail($request->get('id'));
        } else {
            $edit = '';
        }

        $data = [
            'title'     => 'Data Kategori',
            'kategori'  => Kategori::paginate(5),
            'edit'      => $edit,
            'request'   => $request
        ];
        return view('contents.admin.kategori', $data);
    }

    // data proses kategori
    public function create_kategori(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            "nama_kategori" => "required",
        ]);
        if ($validator->passes()) {
            Kategori::insert([
                'nama_kategori' => $request->get("nama_kategori"),
                'created_at'    => date('Y-m-d H:i:s'),
            ]);
            return redirect()->back()->with("success", " Berhasil Insert Data ! ");
        } else {
            return redirect()->back()->withErrors($validator)->with("failed", " Gagal Insert Data ! ");
        }
    }

    public function update_kategori(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            "id"            => "required",
            "nama_kategori" => "required",
        ]);
        if ($validator->passes()) {
            Kategori::findOrFail($request->get('id'))->update([
                'nama_kategori' => $request->get("nama_kategori"),
                'update_at' => date('Y-m-d H:i:s'),
            ]);
            return redirect()->back()->with("success", " Berhasil Update Data ! ");
        } else {
            return redirect()->back()->withErrors($validator)->with("failed", " Gagal Update Data ! ");
        }
    }


    public function delete_kategori(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->back()->with("success", " Berhasil Delete Data ! ");
    }

    // profil
    public function profil(Request $request)
    {
        $data = [
            'title' => 'Data Produk',
            'edit' => User::findOrFail(auth()->user()->id),
            'request' => $request
        ];
        return view('contents.admin.profil', $data);
    }
    public function report(){
        $data = Anggota::all();
        // dd($data);
        return view('contents.admin.report',compact('data'));
    }
    public function cetak(Request $request){

        // dd($request->date);
        if(!$request->date && $request->type){
            $data = Anggota::all();
        }else{
            $data = Anggota::whereDate('created_at',$request->date)->where('baga',$request->type)->get();
        }
        // dd($data);
        return view('contents.admin.cetak',compact('data'));
    }
    // data proses profil
    public function update_profil(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            "name"                  => "required",
            "email"                 => "required",
            "password"              => "required|min:6",
            "password_confirmation" => "required|min:6",
        ]);

        if ($validator->passes()) {
            if ($request->get("password") == $request->get("password_confirmation")) {
                User::findOrFail(auth()->user()->id)->update([
                    'name'          => $request->get("name"),
                    'email'         => $request->get("email"),
                    'phone'         => $request->get("phone"),
                    'address'       => $request->get("address"),
                    'password'      => Hash::make($request->get("password")),
                    'updated_at'    => date('Y-m-d H:i:s'),
                ]);
                return redirect()->back()->with("success", " Berhasil Update Data ! ");
            } else {
                return redirect()->back()->with("failed", "Confirm Password Tidak Sama !");
            }
        } else {
            return redirect()->back()->withErrors($validator)->with("failed", " Gagal Update Data ! ");
        }
    }
}
