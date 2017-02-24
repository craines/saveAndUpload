<?php

namespace App\Classes;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class UploadAndSave{
  public $retorno;
  function __construct($request,$inputName,$saveUpload){
    //Pegando a imagem
    $file = $request->file($inputName);
    // Pegando a extensão da imagem
    $tipo = strtolower($file->getClientOriginalExtension());
    //Verificando se a imagem é "jpg", "png" ou "gif"
    if($tipo == "jpg" or $tipo == "png" or $tipo == "gif"){
      //Gerando um nome aleatorio para imagem
      $imagem = md5(time($file->getClientOriginalName())).".".$tipo;
      //Salvando a imagem
      $file->move($saveUpload, "$imagem");
      // Retornando no nome da imagem
      $this->$retorno = $imagem;
    }else{
      // Esse tipo de imagem não é autorizado
      $this->$retorno = 401;
    }
  }
}


 ?>
