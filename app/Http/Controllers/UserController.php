<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
       //$permisos = $user->getAllPermissions();
       //dd(auth()->user());
       return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->nombre);
       $password = Str::random(8);
       $user = new User();
       $user->name = $request->nombre;
       $user->appaterno = $request->appaterno;
       $user->apmaterno = $request->apmaterno;
       //$user->tipo_usu = $request->roles[0];
       $user->edad = $request->edad;
       $user->peso = $request->peso;
       $user->cinta = $request->cinta;
       $user->grado = $request->grado;
       $user->email = $request->email;
       $user->telefono = $request->telefono;
       $user->password = Hash::make($password);
       $user->save();

       $user->roles()->sync($request->roles);
       return redirect()->route('users.index', $user)->with('info', 'Se guardaron los datos correctamente');

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
    public function edit(User $user)
    {
       
       $roles = Role::all();
       //$permisos = $user->getAllPermissions();
       //dd($permisos);
       return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
       $user->name = $request->nombre;
       $user->appaterno = $request->appaterno;
       $user->apmaterno = $request->apmaterno;
       $user->edad = $request->edad;
       $user->peso = $request->peso;
       $user->cinta = $request->cinta;
       $user->grado = $request->grado;
       $user->email = $request->email;
       $user->telefono = $request->telefono;
       $user->save();
        
        $user->roles()->sync($request->roles);
        return redirect()->route('users.index', $user)->with('info', 'Se guardaron los datos correctamente');
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


    /**
     * Update the specified resource in storage.
     * @brief
     * @author Gustavo Ramirez Yahuaca
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return 
     */

    public function cortar(Request $request){
        
        $id = auth()->user()->id;
        $infoUsuario = User::where('id', $id)->first();

        if($request->hasFile('archivo')) {
            // dd($request->archivo->extension());
            $extension = $request->archivo->extension();
            $dir = "public/fotos/users/"  ;
            $nombre_archivo = date('YmdHis') . Str::random(10) . '.' . $extension;
            $request->archivo->storeAs($dir, $nombre_archivo);
            $nombre_archivo = $dir . $nombre_archivo;
            $nombre_archivo = str_replace("public/", "storage/", $nombre_archivo);
            if(file_exists($infoUsuario->foto)){
                unlink($infoUsuario->foto);
             }

            $infoUsuario->foto = $nombre_archivo;
            $infoUsuario->save();

            return response()->json(['status'=>1, 'msg'=>'La imagen ha sido cargada correctamente.', 'name'=>$nombre_archivo]);

         }
         else{
            return response()->json(['status'=>0, 'msg'=>'Algo salio mal la imagen no se cargo']);
         }

    //     $dest = 'images/user_image/';
    //     if (!File::exists(public_path($dest))) {
    //          File::makeDirectory(public_path($dest),0777,true);
    //     }
    //     $file = $request->file('archivo');
    //     $nueva_foto = 'UIMG'.date('Ymd').uniqid().'.jpg';
    //     $upload = $file->move(public_path($dest), $nueva_foto);
    //     if($upload){
            
    //         $infoUsuario = User::where('id', '=', session('LoggedUser'))->first();
    //         $fotoUsuario = $infoUsuario->foto;
    //         if($fotoUsuario != ''){
    //             unlink($dest.$fotoUsuario);
    //         }

    //         $infoUsuario->foto = $nueva_foto;
    //         $infoUsuario->save();

    //         return response()->json(['status'=>1, 'msg'=>'La imagen ha sido cargada correctamente.', 'name'=>$nueva_foto]);
            
    //     }else{
    //           return response()->json(['status'=>0, 'msg'=>'Algo salio mal la imagen no se cargo']);
    //     }
      }
}
