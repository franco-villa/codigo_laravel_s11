<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Servicio;
use App\Http\Requests\CreateServicioRequest;

class ServiciosController extends Controller
{

    public function __construct(){
        //$this->middleware('auth')->only('create','edit');
        $this->middleware('auth')->except('index','show');
    }

    public function index()
    {
        $servicios = Servicio::orderBy('titulo','asc')->simplePaginate(2);
        return view('servicios', compact('servicios'));
    }

    public function show($id){        

        return view('show',[
            'servicio' =>  Servicio::find($id)
        ]);       
    }

    public function create(){        
        return view('create',[
            'servicio' => new Servicio
        ]);       
    }

    public function store(CreateServicioRequest $request){        
        Servicio::create($request->validated());
        return redirect()->route('servicios.index')->with('estado','El servicio fue creado correctamente');         
    }

    public function edit(Servicio $servicio){        
        return view('edit',[
            'servicio' => $servicio
        ]);       
    }

    public function update(Servicio $id, CreateServicioRequest $request ){        
        
        $id->update($request->validated());

        return redirect()->route('servicios.show',$id)->with('estado','El servicio fue actualizado correctamente');
    }
    
    public function destroy(Servicio $servicio){        
        $servicio->delete();
        return redirect()->route('servicios.index')->with('estado','El servicio fue eliminado correctamente');;        
    }
    // public function servicios(){
    //     $servicios = DB::table('servicios')->get();
    //     return view('servicios', compact('servicios'));
    // }
}
