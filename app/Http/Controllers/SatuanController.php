<?php

namespace App\Http\Controllers;

use App\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class SatuanController extends Controller
{
    public function index()
    {
        return view('master.satuan.index');
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nama_satuan' => 'required',
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
                $satuan = new Satuan([
                    'nama_satuan' => $request->get('nama_satuan'),
                    'keterangan' => $request->get('keterangan'),
                ]);
                $satuan->save();
                $success_output = '<div class="alert alert-success" role="alert">Data Inserted</div>';
            }

            if ($request->get('button_action') == "update") {
                $satuan = Bahan::find($request->get('id'));
                $satuan->nama_satuan = $request->get('nama_satuan');
                $satuan->keterangan = $request->get('keterangan');
                $satuan->save();
                $success_output = '<div class="alert alert-success" role="alert">Data Updated</div>';
            }
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );
        echo json_encode($output);
    }

    public function destroy($id)
    {
        $satuan = Satuan::find($id);
    	$satuan->delete();
    }

    public function getdata()
    {
        // $bahan = Bahan::select('id', 'nama_bahan', 'stok_minimal', 'satuan_id', 'status')->where('status', 1)->with('satuan');
        $satuan = Satuan::all();
        return DataTables::of($satuan)
            ->addColumn('action', function ($data) {
                return '<a href="#" class="btn btn-sm btn-primary edit" id="' . $data->id . '"><i class="fa fa-edit"></i> Edit</a> <a href="#" class="btn btn-sm btn-danger delete" id="' . $data->id . '"><i class="fa fa-trash"></i> Delete</a>';
            })->make(true);
    }

    public function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $satuan = Satuan::find($id);
        $output = array(
            'nama_satuan' => $satuan->nama_bahan,
            'keterangan' => $satuan->stok_minimal,
        );
        echo json_encode($output);
    }
}
