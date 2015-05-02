{capture assign="left"}  
  {Auth::check()}
  <center><img src="https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/10516802_727098207344364_6397306397119633881_n.jpg?oh=396acbf8d13c52aa5423bea99115f860&oe=55CE890C&__gda__=1440954804_6c4efe329f17f6db84e5a3a317f03447" width="150" height="150"></center>
  <div class="well"> 
    Información
  </div>
  
  {/capture}
{capture assign="right"}
  
   {Form::open(['url'=>'publicacion/crear'])}
   <textarea required name="publicacion" placeholder="¿Qué estás pensando?" rows="3" class="col-sm-12"></textarea>
  <button type="submit" class="btn pull-right btn-success">Publicar</button>
  {Form::close()}
  <hr>
  <br>
  <br>
  <br>
     {foreach $publicaciones as $publicacion}
       <div class="well" style="word-break: break-all; margin-bottom: 5px; padding: 10px 5px; font-family: 'Noto Sans', sans-serif; ">
         <button class="close" aria-hidden="true" style="margin-top: -10px;"><a href="{url('publicacion/eliminar')}/{$publicacion->id}">&times;</a></button>
         {$publicacion->publicacion}
       </div>
       <div>
         <span class="glyphicon glyphicon-comment"></span> <span>Comentar</span> |
         <span class="glyphicon glyphicon-thumbs-up"></span> Me gusta
         
         <div id="comentarios-{$publicacion->id}">
           <div style="font-size: 10px; padding: 3px;" class="well well-sm col-sm-7">Esto es un comentario</div>
         </div>
         <br>
         <br>
         <textarea id="comentario-{$publicacion->id}" rows="1" placeholder="Escribe tu comentario ... " class="col-sm-6"></textarea>
         <button class="btn btn-success btn-sm" onclick="fb.comentar({$publicacion->id})">Comentar</button>
         
         
       </div>
       <hr>
       {foreachelse}
         
         <div class="alert alert-danger">
            No hay publicaciones
         </div>
       
     {/foreach}
  
  {/capture}
{capture assign="portada"}
  
  <img src="http://comutricolor.com/wp-content/uploads/2013/10/seleccion-colombia.png">
  
  {/capture}
  
  {include file="../masterpage/template.tpl" layout="two_columns"}