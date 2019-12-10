<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;

class PrestamosController extends Controller
{
    public function listaPrestamos()
    {
        $prestamos = Prestamo::all(['id','user_id','libro_id','entrega','devolucion']);
        if(empty($prestamos)){
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
        }elseif(!$req->entrega){
            $response['error_msg'] = 'Entrega is required';
        }elseif(!$req->devolucion){
            $response['error_msg'] = 'Devolucion is required';
        }else{
            try{
                $prestamos->user_id = $req->input('user_id');
                $prestamos->libro_id = $req->input('libro_id');
                $prestamos->entrega = $req->input('entrega');
                $prestamos->devolucion = $req->input('devolucion');
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
        $response = array('error_code' => 404, 'error_msg' => 'Libro '.$id.' not found');
        $prestamos = Prestamos::find($id);
        if(!empty($prestamos)){
            $dataOk = true;
            $error_msg = "";
            if(empty($req->user_id)){
                $dataOk = false;
                $error_msg = "User can't be empty";
            }else{
                $prestamos->user_id = $req->user_id;
            }
            if(empty($req->libro_id)){
                $dataOk = false;
                $error_msg = "Libro can't be empty";
            }else{
                $prestamos->libro_id = $req->libro_id;
            }
            if(empty($req->entrega)){
                $dataOk = false;
                $error_msg = "Entrega can't be empty";
            }else{
                $prestamos->entrega = $req->entrega;
            }
            if(empty($req->devolucion)){
                $dataOk = false;
                $error_msg = "Devolución can't be empty";
            }else{
                $prestamos->devolucion = $req->devolucion;
            }
            if(!$dataOk){
                $response = array('error_code' => 400, 'error_msg' => $error_msg);
            }else{
                try{
                    $prestamos->user_id = $req->input('user_id');
                    $prestamos->libro_id = $req->input('libro_id') ;
                    $prestamos->entrega = $req->input('entrega');
                    $prestamos->devolucion = $req->input('devolucion');
                    $prestamos->save();
                    $response = array('error_code' => 200, 'error_msg' => '');
                }catch(\Exception $e){
                    $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
                }
            }
        }
        return response()->json($response);
    }

    public function deletePrestamo($id)
    {
        $response = array('error_code' => 404, 'error_msg' => 'Prestamo '.$id.' not found');
        $prestamos = Prestamo::find($id);
        if(!empty($prestamos)){
            try{
                    $prestamos->delete();
                    $response = array('error_code' => 200, 'error_msg' => '');
                }catch(\Exception $e){
                    $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
                }
        }
    }

}
