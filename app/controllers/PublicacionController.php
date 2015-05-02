<?php

class PublicacionController extends BaseController{
  
  public function postCrear(){   
    $publicacion = [
        'publicacion' => Input::get('publicacion'),
        'tipo' => '0',
        'usuario_id' => Auth::user()->id
    ];
    DB::table('publicacion')->insert($publicacion);
    return Redirect::to("/profile");
    
  }
  public function postComentar(){
    
  }
  public function getEliminar($id){
    $publicacion = Publicacion::find($id);
    if($publicacion && $publicacion->usuario_id == Auth::user()->id){
      $publicacion->delete();
    }
    return Redirect::to("/profile");
    
  }
  
  
  
  
  
}
