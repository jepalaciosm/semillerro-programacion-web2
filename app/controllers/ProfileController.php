<?php

class ProfileController extends BaseController {

    public function getIndex() {
        $amigo = ListaAmigos::all();
        $s = "";
        foreach ($amigo as $amigo) {
            $s.=',"' . "{$amigo->nombre}" . '"';
        }
        $s = trim($s, ",");

        
        $publicaciones = ListaAmigos::find(Auth::user()->id)->misPublicaciones();
        return View::make('perfil.perfil')
                        ->with("nombre", Auth::user()->nombre)
                        ->with("publicaciones", $publicaciones)
                        ->with("amigos", $s)
                        ->with("foto",Auth::user()->id.".jpg");
    }

    public function getVer($id) {
        if($id==Auth::user()->id) return Redirect::to("/profile");
       $usuario = ListaAmigos::find($id);
       
       if($usuario){
           $publicaciones =$usuario->misPublicaciones();
           return View::make('perfil.perfil')
                        ->with("nombre", $usuario->nombre)
                        ->with("publicaciones", $publicaciones)
                       // ->with("amigos", $s)
                        ->with("foto",$usuario->id.".jpg");
       }else{
           return Redirect::to("/profile");
       }
    }
    
    public function getLogout(){
        Auth::logout();
        return Redirect::to("/");
    }

   

}
