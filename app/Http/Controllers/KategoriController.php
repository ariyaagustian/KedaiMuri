<?php

namespace App\Http\Controllers;

use App\KategoriMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.kategoriMenu.index');
    }


    //Store Data
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nama_kategori' => 'required',
            'keterangan' => 'required',
        ]);

        $error_array = array();
        $success_output = '';
        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {
            if ($request->get('button_action') == "insert") {
                $kategori = new KategoriMenu([
                    'nama_kategori' => $request->get('nama_kategori'),
                    'keterangan' => $request->get('keterangan'),
                    'status' => 1
                ]);
                $kategori->save();
                $success_output = '<div class="alert alert-success" role="alert">Data Inserted</div>';
            }

            if ($request->get('button_action') == "update") {
                $kategori = KategoriMenu::find($request->get('id'));
                $kategori->nama_kategori = $request->get('nama_kategori');
                $kategori->keterangan = $request->get('keterangan');
                $kategori->save();
                $success_output = '<div class="alert alert-success" role="alert">Data Updated</div>';
            }
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );
        echo json_encode($output);
    }


    //Destroy Data
    public function destroy($id)
    {
        $kategori = KategoriMenu::findOrFail($id);
        $kategori->status = 0;
        $kategori->save();
    }


    //Get Data
    public function getdata()
    {
        $kategori = KategoriMenu::select('id', 'nama_kategori', 'keterangan', 'status')->where('status', 1);
        return DataTables::of($kategori)
            ->addColumn('action', function ($data) {
                return '<a href="#" class="btn btn-sm btn-primary edit" id="' . $data->id . '"><i class="fa fa-edit"></i> Edit</a> <a href="#" class="btn btn-sm btn-danger delete" id="' . $data->id . '"><i class="fa fa-trash"></i> Delete</a>';
            })->make(true);
    }


    //Fetch Data
    public function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $kategori = KategoriMenu::find($id);
        $output = array(
            'nama_kategori' => $kategori->nama_kategori,
            'keterangan' => $kategori->keterangan
        );
        echo json_encode($output);
    }
}
