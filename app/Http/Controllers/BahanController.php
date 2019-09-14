<?php

namespace App\Http\Controllers;

use App\Bahan;
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
        return view('master.bahan.index');
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
        $validation = Validator::make($request->all(), [
            'nama_bahan' => 'required',
            'stok_minimal' => 'required',
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
                    'status' => 1
                ]);
                $bahan->save();
                $success_output = '<div class="alert alert-success swalDefaultSuccess">Data Inserted</div>' ;
            }

            if($request->get('button_action') == "update"){
                $bahan = Bahan::find($request->get('id'));
                $bahan->nama_bahan = $request->get('nama_bahan');
                $bahan->stok_minimal = $request->get('stok_minimal');
                $bahan->save();
                $success_output = '<div class="alert alert-success swalDefaultSuccess">Data Updated</div>' ;

            }
        }
        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );
        echo json_encode($output);
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

    public function json()
    {
        return DataTables::of(Bahan::all())->make(true);
    }

    public function getdata()
    {
        $bahan = Bahan::select('id', 'nama_bahan', 'stok_minimal', 'status');
        return DataTables::of($bahan)
            ->addColumn('action', function($data)
            {
                return '<a href="#" class="btn btn-sm btn-primary edit" id="'.$data->id.'"><i class="fa fa-edit"></i> Edit</a>';
            })->make(true);
    }

    public function fetchdata(Request $request)
    {
        $id = $request->input('id');
        $bahan = Bahan::find($id);
        $output = array(
            'nama_bahan' => $bahan->nama_bahan,
            'stok_minimal' => $bahan->stok_minimal
        );
        echo json_encode($output);
    }
}
