<?php

namespace App\Http\Controllers;

use App\Bahan;
use App\Satuan;
use Illuminate\Http\Request;
use DataTables;
use Validator;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data =  Datatables::of(Bahan::all())->make(true);
        // return view('master.bahan.index', compact('data'));
        $satuan = Satuan::all();
        return view('master.bahan.index', compact('satuan'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'nama_bahan' => 'required',
            'stok_minimal' => 'required',
            'satuan_id' => 'required',
        ]);

        $error_array = array();
        $success_output = '';
        if($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {
            if($request->get('button_action') == "insert"){
                $bahan = new Bahan([
                    'nama_bahan' => $request->get('nama_bahan'),
                    'stok_minimal' => $request->get('stok_minimal'),
                    'satuan_id' => $request->get('satuan_id'),
                ]);
                $bahan->save();
                $success_output = '<div class="alert alert-success" role="alert">Data Inserted</div>' ;
            }

            if($request->get('button_action') == "update"){
                $bahan = Bahan::find($request->get('id'));
                $bahan->nama_bahan = $request->get('nama_bahan');
                $bahan->stok_minimal = $request->get('stok_minimal');
                $bahan->satuan_id = $request->get('satuan_id');
                $bahan->save();
                $success_output = '<div class="alert alert-success" role="alert">Data Updated</div>' ;

            }
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );
        echo json_encode($output);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahan = Bahan::find($id);
    	$bahan->delete();
    }

    // public function json()
    // {
    //     return DataTables::of(Bahan::all())->make(true);
    // }

    public function getdata()
    {
        // $bahan = Bahan::select('id', 'nama_bahan', 'stok_minimal', 'satuan_id', 'status')->where('status', 1)->with('satuan');
        $bahan = Bahan::with('satuan')->get();
        return DataTables::of($bahan)
            ->addColumn('action', function($data)
            {
                return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$data->id.'"><i class="fa fa-edit"></i> Edit</a> <a href="#" class="btn btn-sm btn-danger delete" id="'.$data->id.'"><i class="fa fa-trash"></i> Delete</a>';
            })->make(true);
    }

    public function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $bahan = Bahan::find($id);
        $output = array(
            'nama_bahan' => $bahan->nama_bahan,
            'stok_minimal' => $bahan->stok_minimal,
            'satuan_id' => $bahan->satuan_id,
        );
        echo json_encode($output);
    }
}
