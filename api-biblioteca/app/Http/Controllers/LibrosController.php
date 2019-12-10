<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use App\Prestamo;

class LibrosController extends Controller
{
    //

    public function listaLibros()
    {
        $libros = Libro::all(['id','Titulo','Autor','Genero','Sinopsis']);
        if(empty($libros)){
            $libros = array('error_code' => 400, 'error_msg' => 'Not found');
        }else{
            return response()->json($libros);
        }
    }

    public function addLibro(Request $req)
    {
        $response = array('error_code' => 400, 'error_msg' => 'Error inserting info');
        $libros = new Libro;

        if(!$req->Titulo){
            $response['error_msg'] = 'Titulo is required';
        }
        elseif(!$req->Autor)
        {
            $response['error_msg'] = 'Autor is required';
        }
        elseif(!$req->Genero)
        {
            $response['error_msg'] = 'Genero is required';
        }
        elseif(!$req->Sinopsis)
        {
            $response['error_msg'] = 'Sinopsis is required';
        }
        else
        {
            try{
                $libros->Titulo = $req->input('Titulo');
                $libros->Autor = $req->input('Autor') ;
                $libros->Genero = $req->input('Genero');
                $libros->Sinopsis = $req->input('Sinopsis');
                $libros->save();
                $response = array('error_code' => 200, 'error_msg' => '');
                }
                catch(\Exception $e)
                {
                $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
            }
        }
        return response()->json($response);
    }

    public function updateLibro(Request $req,$id)
    {
        $response = array('error_code' => 404, 'error_msg' => 'Libro '.$id.' not found');
        $libros = Libro::find($id);
        if(!empty($libros)){
            $dataOk = true;
            $error_msg = "";
            if(empty($req->Titulo)){
                $dataOk = false;
                $error_msg = "Titulo can't be empty";
            }else{
                $libros->Titulo = $req->Titulo;
            }
            if(empty($req->Autor)){
                $dataOk = false;
                $error_msg = "Autor can't be empty";
            }else{
                $libros->Autor = $req->Autor;
            }

            if(empty($req->Genero)){
                $dataOk = false;
                $error_msg = "Genero can't be empty";
            }else{
                $libros->Genero = $req->Genero;
            }
            if(empty($req->Sinopsis)){
                $dataOk = false;
                $error_msg = "Sinopsis can't be empty";
            }else{
                $libros->Sinopsis = $req->Sinopsis;
            }
            if(!$dataOk){
                $response = array('error_code' => 400, 'error_msg' => $error_msg);
            }else{
                try{
                    $libros->Titulo = $req->input('Titulo');
                    $libros->Autor = $req->input('Autor') ;
                    $libros->Genero = $req->input('Genero');
                    $libros->Sinopsis = $req->input('Sinopsis');
                    $libros->save();
                    $response = array('error_code' => 200, 'error_msg' => '');
                }catch(\Exception $e){
                    $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
                }
            }
        }
        return response()->json($response);
    }

    public function deleteLibro($id)
    {
        $response = array('error_code' => 404, 'error_msg' => 'Libro '.$id.' not found');
        $libros = Libro::find($id);
        $prestamo = Prestamo::where('libro_id', $id)->whereNull('devolucion')->get();
        if(!empty($libros)){
            //Comprobar que el libro no este prestado
            if(empty($prestamo)){
                $response = array('error_code' => 400, 'error_msg' => "Libro ".$id." can't be deleted");
            }else{
                try{
                    $libros->delete();
                    $response = array('error_code' => 200, 'error_msg' => '');
                }catch(\Exception $e){
                    $response = array('error_code' => 500, 'error_msg' => $e->getMessage());
                }
            }
        }
        return response()->json($response);
    }

    public function filtroAutor($autor)
    {
        $response = array('error_code' => 404, 'error_msg' => 'Autor '.$autor.' not found');
        $response = Libro::where('autor', $autor)->get();
        return response()->json($response);
    }

    public function filtroGenero($genero)
    {
        $response = array('error_code' => 404, 'error_msg' => 'Genero '.$genero.' not found');
        $response = Libro::where('genero', $genero)->get();
        return response()->json($response);
    }
}
