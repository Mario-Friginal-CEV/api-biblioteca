<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;

class PrestamosController extends Controller
{
    public function listaPrestamos()
    {
        $perstamos = Prestamo::all(['id','user_id','libro_id','entrega','devolcion']);
        if($prestamos = null){
            $prestamos = array('error_code' => 400, 'error_msg' => 'Not found');
        }else{
           return response()->json($prestamos);
        }
    }

    public function addPrestamo(Request $req)
    {
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        $prestamos = new Prestamo;

        if(!$req->user_id){
            $response['error_msg'] = 'User is required';
        }elseif(!$req->libro_id){
            $response['error_msg'] = 'Libro is required';
        }else{
            try{
                $prestamos->user_id = $req->input('user_id');
                $prestamos->libro_id = $req->input('libro_id') ;
                $prestamos->save();
                $response = array('error_code' => 200, 'error_msg' => '');
                }
                catch(\Exception $e)
                {
                $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
            }
        }
        return response()->json($response);
    }

    public function updatePrestamo(Request $request,$id)
    {
        $prestamos = Prestamos::find($id);
        $prestamos->user_id = $req->input('user_id');
        $prestamos->libro_id = $req->input('libro_id') ;
        $prestamos->save();
    }

    public function deletePrestamo($id)
    {
        $prestamos = Prestamo::find($id);
        $prestamos->delete();
    }


}
