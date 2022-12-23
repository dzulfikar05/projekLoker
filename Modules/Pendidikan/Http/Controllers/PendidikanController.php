<?php

namespace Modules\Pendidikan\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB; 

use DataTables;

class PendidikanController extends Controller
{
    public function index()
    {
        return view('main::index',[
			'title' => 'Pendidikan',
			'content' => view('pendidikan::index')
		]);
        // return view('pendidikan::index');
    }

    public function initTable(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('tb_pendidikan')->where([
                    ['pendidikan_active', 1], 
                ])->get()->toArray();
            // print_r($data); exit;
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $id = $row->pendidikan_id;
                           $btn = '<div >
                                        <a href="#" onclick="onEdit(this)" data-id="'.$id.'" title="Edit Data" class="btn btn-warning btn-sm"><i class="align-middle fa fa-pencil fw-light text-dark"> </i></a>
                                        <a href="#" onclick="onDelete(this)" data-id="'.$id.'" title="Delete Data" class="btn btn-danger btn-sm"><i class="align-middle fa fa-trash fw-light"> </i></a>
                                </div>
                                ';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('pendidikan.index');
    }

    public function edit(Request $request){
        $id = $request->input('pendidikan_id');

        $operation = DB::table('tb_pendidikan')->where('pendidikan_id', $id)->get()->toArray();
        return $operation;
    }
    
    public function store(Request $request){
        $response=[];

        
        $data = [
            'pendidikan_id'             => uniqid(),
            'pendidikan_kode'           => $request->input('pendidikan_kode'),
            'pendidikan_nama'           => $request->input('pendidikan_nama'),
            'pendidikan_active'         => 1,
            'pendidikan_created_at'     => date('Y-m-d H:i:s') 
        ];

        
        $operation = DB::table('tb_pendidikan')->insert($data);

        if($operation == 1){
            $response['success'] = true;
            $response['title'] = 'Success';
            $response['message'] = 'Berhasil Menambahkan Data';
        }else{
            $response['success'] = false;
            $response['title'] = 'Failed';
            $response['message'] = 'Gagal Mengubah Data!';
        }

        return $response;
    }

    public function update(Request $request)
    {
        $response=[];

        $data = [
            'pendidikan_id'             => $request->input('pendidikan_id'),
            'pendidikan_kode'           => $request->input('pendidikan_kode'),
            'pendidikan_nama'           => $request->input('pendidikan_nama'),
            // 'pendidikan_active'         => $request->input('pendidikan_active'),
            'pendidikan_updated_at'     => date('Y-m-d H:i:s')
        ];

        $operation = DB::table('tb_pendidikan')->where('pendidikan_id', $data['pendidikan_id'])->update($data);

        if($operation == 1){
            $response['success'] = true;
            $response['title'] = 'Success';
            $response['message'] = 'Berhasil Mengubah Data!';
        }else{
            $response['success'] = false;
            $response['title'] = 'Failed';
            $response['message'] = 'Gagal Mengubah Data!';
        }
        return $response;
    }

    public function destroy(Request $request){
        $response = [];
        $id = $request->input('pendidikan_id');

        // $data = [
        //     'pendidikan_deleted_at' => date('Y-m-d H:i:s'),
        //     'pendidikan_active' => null
        // ];
        $operation = DB::table('tb_pendidikan')->where('pendidikan_id', $id)->delete();

        if($operation == 1){
            $response['success'] = true;
            $response['title'] = 'Success';
            $response['message'] = 'Berhasil Mengubah Data!';
        }else{
            // print_r('halo');exit;
            $response['success'] = false;
            $response['title'] = 'Failed';
            $response['message'] = 'Gagal Mengubah Data!';
        }

        return $response;
        // print_r($operation);
    }

    public function combobox(){
        $operation = DB::table('tb_pendidikan')->where('pendidikan_active', 1)->get()->toArray();
        return $operation;
    }
}
