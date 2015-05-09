<?php

class ListaAmigos extends Eloquent {
    protected $table = 'usuario';
    
    public function misPublicaciones(){
        return Publicacion::where('usuario_id',Auth::user()->id)
                                        ->orderBy('id', 'desc')
                                        ->get();
    }
    
}
