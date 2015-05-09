<?php

Route::get('/', function()
{ 
    if(Auth::check()){
      return Redirect::to("/profile");
    }
    return View::make('general.login');
	
});
Route::get('/profile', array('before'=>'auth', function()
{ 
    
}));
Route::post('/loguear', function(){
    $email = Input::get('correo');
    $password = Input::get('password');
    if(Auth::attempt(['correo'=>$email, 'password'=> $password])){
     return Redirect::to("/profile");
    }else{
      echo "el usuario no está logueado";
    }
});
Route::get('/logout', function(){
  
});


Route::controller('personal','PersonalController');
Route::controller('clase','Clase2Controller');

Route::group(array('before'=>'auth'), function(){
    
    Route::controller('publicacion','PublicacionController');
    Route::controller('profile','ProfileController');    
});
