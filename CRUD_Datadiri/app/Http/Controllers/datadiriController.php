<?php

namespace App\Http\Controllers;

use App\Models\datadiri;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class datadiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = datadiri::where('nim', 'like', "%$katakunci%")
            ->orwhere('nama', 'like', "%$katakunci%")
            ->orwhere('jurusan', 'like', "%$katakunci%")
            ->orwhere('programstudi', 'like', "%$katakunci%")
            ->orwhere('matakuliah', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data = datadiri::orderBy('nim', 'desc')->paginate($jumlahbaris);
        }
        return view('datadiri.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('datadiri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nim',$request->nim);
        Session::flash('nama',$request->nama);
        Session::flash('jurusan',$request->jurusan);
        Session::flash('programstudi',$request->programstudi);
        Session::flash('matakuliah',$request->matakuliah);

        $request->validate([
            'nim'=>'required|numeric|unique:datadiri,nim',
            'nama'=>'required',
            'jurusan'=>'required',
            'programstudi'=>'required',
            'matakuliah'=>'required',
        ],[
            'nim.required'=>'NIM wajib diisi',
            'nim.numeric'=>'Nim wajib dalam angka',
            'nim.unique'=>'Nim yang diisikan sudah ada dalam database',
            'nama.required'=>'Nama wajib diisi',
            'jurusan.required'=>'Jurusan wajib diisi',
            'programstudi.required'=>'Program Studi wajib diisi',
            'matakuliah.required'=>'Matakuliah wajib diisi',
        ]);

        $data = [
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'jurusan'=>$request->jurusan,
            'programstudi'=>$request->programstudi,
            'matakuliah'=>$request->matakuliah,
        ];
        datadiri::create($data);
        return redirect()->to('datadiri')->with('success', 'Berhasil menambahkan data');
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
        $data = datadiri::where('nim',$id)->first();
        return view('datadiri.edit')->with('data', $data);
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
        $request->validate([
            'nama'=>'required',
            'jurusan'=>'required',
            'programstudi'=>'required',
            'matakuliah'=>'required',
        ],[
            'nama.required'=>'Nama wajib diisi',
            'jurusan.required'=>'Jurusan wajib diisi',
            'programstudi.required'=>'Program Studi wajib diisi',
            'matakuliah.required'=>'Matakuliah wajib diisi',
        ]);

        $data = [
            'nama'=>$request->nama,
            'jurusan'=>$request->jurusan,
            'programstudi'=>$request->programstudi,
            'matakuliah'=>$request->matakuliah,
        ];
        datadiri::where('nim',$id)->update($data);
        return redirect()->to('datadiri')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        datadiri::where('nim', $id)->delete();
        return redirect()->to('datadiri')->with('success', 'Berhasil delete data');
    }
}
