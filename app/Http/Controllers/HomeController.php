<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Curso;
use App\Requisicao_documento;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth'=>'verified']);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      //Copie e cole isso na outra rota que for usar ------------->
        if(Auth::check()){
          if(Auth::user()->tipo == 'servidor'){
            $cursos = Curso::all();
            $requisicoes = Requisicao_documento::all();
            $quantidadesagro = [];
            $quantidadesbcc = [];
            $quantidadesengenharia = [];
            $quantidadesletras = [];
            $quantidadespedagogia = [];
            $quantidadesveterinaria = [];
            $quantidadeszootecnia = [];
            $idAgro = 1;
            $idBcc = 2;
            $idEng = 3;
            $idLet = 4;
            $idPed = 5;
            $idVet = 6;
            $idZoo = 7;

            //Agronomia
            $agro1= DB::table('requisicao_documentos')
                 ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                 ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                 ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                 ->select ('requisicao_documentos.id')
                 ->where([['documento_id',1],['curso_id', $idAgro],['status','Em andamento'], ['deleted_at', null]])
                 ->get();
                 $quantagro1 = json_decode($agro1);
                 $quantagro1 = sizeof($quantagro1);
                 // array_push($quantidadesagro, ['quant'=>$quantagro1]);
            $agro2 = DB::table('requisicao_documentos')
                  ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                  ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                  ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                  ->select ('requisicao_documentos.id')
                  ->where([['documento_id',2],['curso_id', $idAgro],['status','Em andamento'], ['deleted_at', null]])
                  ->get();
                  $quantagro2 = json_decode($agro2);
                  $quantagro2 = sizeof($quantagro2);
                  // array_push($quantidadesagro, $quantagro2);
            $agro3 = DB::table('requisicao_documentos')
                   ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                   ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                   ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                   ->select ('requisicao_documentos.id')
                   ->where([['documento_id',3],['curso_id', $idAgro],['status','Em andamento'], ['deleted_at', null]])
                   ->get();
                   $quantagro3 = json_decode($agro3);
                   $quantagro3 = sizeof($quantagro3);
                   // array_push($quantidadesagro, $quantagro3);
            $agro4 = DB::table('requisicao_documentos')
                    ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                    ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                    ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                    ->select ('requisicao_documentos.id')
                    ->where([['documento_id',4],['curso_id', $idAgro],['status','Em andamento'], ['deleted_at', null]])
                    ->get();
                    $quantagro4 = json_decode($agro4);
                    $quantagro4 = sizeof($quantagro4);
                    // array_push($quantidadesagro, $quantagro4);
            $agro5 = DB::table('requisicao_documentos')
                     ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                     ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                     ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                     ->select ('requisicao_documentos.id')
                     ->where([['documento_id',5],['curso_id', $idAgro],['status','Em andamento'], ['deleted_at', null]])
                     ->get();
                     $quantagro5 = json_decode($agro5);
                     $quantagro5 = sizeof($quantagro5);
                     // array_push($quantidadesagro, $quantagro5);

            //bcc
            $bcc1= DB::table('requisicao_documentos')
              ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
              ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
              ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
              ->select ('requisicao_documentos.id')
              ->where([['documento_id',1],['curso_id', $idBcc],['status','Em andamento'], ['deleted_at', null]])
              ->get();
              $quantbcc1 = json_decode($bcc1);
              $quantbcc1 = sizeof($quantbcc1);
              // array_push($quantidadesbcc, $quantbcc1);
            $bcc2 = DB::table('requisicao_documentos')
               ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
               ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
               ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
               ->select ('requisicao_documentos.id')
               ->where([['documento_id',2],['curso_id', $idBcc],['status','Em andamento'], ['deleted_at', null]])
               ->get();
               $quantbcc2 = json_decode($bcc2);
               $quantbcc2 = sizeof($quantbcc2);
               // array_push($quantidadesbcc, $quantbcc2);
            $bcc3 = DB::table('requisicao_documentos')
                ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                ->select ('requisicao_documentos.id')
                ->where([['documento_id',3],['curso_id', $idBcc],['status','Em andamento'], ['deleted_at', null]])
                ->get();
                $quantbcc3 = json_decode($bcc3);
                $quantbcc3 = sizeof($quantbcc3);
                // array_push($quantidadesbcc, $quantbcc3);
            $bcc4 = DB::table('requisicao_documentos')
                 ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                 ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                 ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                 ->select ('requisicao_documentos.id')
                 ->where([['documento_id',4],['curso_id', $idBcc],['status','Em andamento'], ['deleted_at', null]])
                 ->get();
                 $quantbcc4 = json_decode($bcc4);
                 $quantbcc4 = sizeof($quantbcc4);
                 // array_push($quantidadesbcc, $quantbcc4);
            $bcc5 = DB::table('requisicao_documentos')
                  ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                  ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                  ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                  ->select ('requisicao_documentos.id')
                  ->where([['documento_id',5],['curso_id', $idBcc],['status','Em andamento'], ['deleted_at', null]])
                  ->get();
                  $quantbcc5 = json_decode($bcc5);
                  $quantbcc5 = sizeof($quantbcc5);
                  // array_push($quantidadesbcc, $quantbcc5);

            //engenharia
            $engenharia1= DB::table('requisicao_documentos')
             ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
             ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
             ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
             ->select ('requisicao_documentos.id')
             ->where([['documento_id',1],['curso_id', $idEng],['status','Em andamento'], ['deleted_at', null]])
             ->get();
             $quantengenharia1 = json_decode($engenharia1);
             $quantengenharia1 = sizeof($quantengenharia1);
             // array_push($quantidadesengenharia, $quantengenharia1);
            $engenharia2 = DB::table('requisicao_documentos')
              ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
              ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
              ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
              ->select ('requisicao_documentos.id')
              ->where([['documento_id',2],['curso_id', $idEng],['status','Em andamento'], ['deleted_at', null]])
              ->get();
              $quantengenharia2 = json_decode($engenharia2);
              $quantengenharia2 = sizeof($quantengenharia2);
              // array_push($quantidadesengenharia, $quantengenharia2);
            $engenharia3 = DB::table('requisicao_documentos')
               ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
               ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
               ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
               ->select ('requisicao_documentos.id')
               ->where([['documento_id',3],['curso_id', $idEng],['status','Em andamento'], ['deleted_at', null]])
               ->get();
               $quantengenharia3 = json_decode($engenharia3);
               $quantengenharia3 = sizeof($quantengenharia3);
               // array_push($quantidadesengenharia, $quantengenharia3);
            $engenharia4 = DB::table('requisicao_documentos')
                ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                ->select ('requisicao_documentos.id')
                ->where([['documento_id',4],['curso_id', $idEng],['status','Em andamento'], ['deleted_at', null]])
                ->get();
                $quantengenharia4 = json_decode($engenharia4);
                $quantengenharia4 = sizeof($quantengenharia4);
                // array_push($quantidadesengenharia, $quantengenharia4);
            $engenharia5 = DB::table('requisicao_documentos')
                 ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                 ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                 ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                 ->select ('requisicao_documentos.id')
                 ->where([['documento_id',5],['curso_id', $idEng],['status','Em andamento'], ['deleted_at', null]])
                 ->get();
                 $quantengenharia5 = json_decode($engenharia5);
                 $quantengenharia5 = sizeof($quantengenharia5);
                 // array_push($quantidadesengenharia, $quantengenharia5);

            //letras
            $letras1= DB::table('requisicao_documentos')
              ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
              ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
              ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
              ->select ('requisicao_documentos.id')
              ->where([['documento_id',1],['curso_id', $idLet],['status','Em andamento'], ['deleted_at', null]])
              ->get();
              $quantletras1 = json_decode($letras1);
              $quantletras1 = sizeof($quantletras1);
              // array_push($quantidadesletras, $quantletras1);
            $letras2 = DB::table('requisicao_documentos')
               ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
               ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
               ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
               ->select ('requisicao_documentos.id')
               ->where([['documento_id',2],['curso_id', $idLet],['status','Em andamento'], ['deleted_at', null]])
               ->get();
               $quantletras2 = json_decode($letras2);
               $quantletras2 = sizeof($quantletras2);
               // array_push($quantidadesletras, $quantletras2);
            $letras3 = DB::table('requisicao_documentos')
                ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                ->select ('requisicao_documentos.id')
                ->where([['documento_id',3],['curso_id', $idLet],['status','Em andamento'], ['deleted_at', null]])
                ->get();
                $quantletras3 = json_decode($letras3);
                $quantletras3 = sizeof($quantletras3);
                // array_push($quantidadesletras, $quantletras3);
            $letras4 = DB::table('requisicao_documentos')
                 ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                 ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                 ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                 ->select ('requisicao_documentos.id')
                 ->where([['documento_id',4],['curso_id', $idLet],['status','Em andamento'], ['deleted_at', null]])
                 ->get();
                 $quantletras4 = json_decode($letras4);
                 $quantletras4 = sizeof($quantletras4);
                 // array_push($quantidadesletras, $quantletras4);
            $letras5 = DB::table('requisicao_documentos')
                  ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                  ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                  ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                  ->select ('requisicao_documentos.id')
                  ->where([['documento_id',5],['curso_id', $idLet],['status','Em andamento'], ['deleted_at', null]])
                  ->get();
                  $quantletras5 = json_decode($letras5);
                  $quantletras5 = sizeof($quantletras5);
                  // array_push($quantidadesletras, $quantletras5);

                //pedagogia
                $pedagogia1= DB::table('requisicao_documentos')
                ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                ->select ('requisicao_documentos.id')
                ->where([['documento_id',1],['curso_id', $idPed],['status','Em andamento'], ['deleted_at', null]])
                ->get();
                $quantpedagogia1 = json_decode($pedagogia1);
                $quantpedagogia1 = sizeof($quantpedagogia1);
                // array_push($quantidadespedagogia, $quantpedagogia1);
                $pedagogia2 = DB::table('requisicao_documentos')
                ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                ->select ('requisicao_documentos.id')
                ->where([['documento_id',2],['curso_id', $idPed],['status','Em andamento'], ['deleted_at', null]])
                ->get();
                $quantpedagogia2 = json_decode($pedagogia2);
                $quantpedagogia2 = sizeof($quantpedagogia2);
                // array_push($quantidadespedagogia, $quantpedagogia2);

                $pedagogia3 = DB::table('requisicao_documentos')
                ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                ->select ('requisicao_documentos.id')
                ->where([['documento_id',3],['curso_id', $idPed],['status','Em andamento'], ['deleted_at', null]])
                ->get();
                $quantpedagogia3 = json_decode($pedagogia3);
                $quantpedagogia3 = sizeof($quantpedagogia3);
                // array_push($quantidadespedagogia, $quantpedagogia3);

                $pedagogia4 = DB::table('requisicao_documentos')
                ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                ->select ('requisicao_documentos.id')
                ->where([['documento_id',4],['curso_id', $idPed],['status','Em andamento'], ['deleted_at', null]])
                ->get();
                $quantpedagogia4 = json_decode($pedagogia4);
                $quantpedagogia4 = sizeof($quantpedagogia4);
                // array_push($quantidadespedagogia, $quantpedagogia4);

                $pedagogia5 = DB::table('requisicao_documentos')
                ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                ->select ('requisicao_documentos.id')
                ->where([['documento_id',5],['curso_id', $idPed],['status','Em andamento'], ['deleted_at', null]])
                ->get();
                $quantpedagogia5 = json_decode($pedagogia5);
                $quantpedagogia5 = sizeof($quantpedagogia5);
                // array_push($quantidadespedagogia, $quantpedagogia5);

                //veterinaria
                $veterinaria1= DB::table('requisicao_documentos')
                ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                ->select ('requisicao_documentos.id')
                ->where([['documento_id',1],['curso_id', $idVet],['status','Em andamento'], ['deleted_at', null]])
                ->get();
                $quantveterinaria1 = json_decode($veterinaria1);
                $quantveterinaria1 = sizeof($quantveterinaria1);
                // array_push($quantidadesveterinaria, $quantveterinaria1);
                $veterinaria2 = DB::table('requisicao_documentos')
                 ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                 ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                 ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                 ->select ('requisicao_documentos.id')
                 ->where([['documento_id',2],['curso_id', $idVet],['status','Em andamento'], ['deleted_at', null]])
                 ->get();
                 $quantveterinaria2 = json_decode($veterinaria2);
                 $quantveterinaria2 = sizeof($quantveterinaria2);
                 // array_push($quantidadesveterinaria, $quantveterinaria2);

                $veterinaria3 = DB::table('requisicao_documentos')
                  ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                  ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                  ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                  ->select ('requisicao_documentos.id')
                  ->where([['documento_id',3],['curso_id', $idVet],['status','Em andamento'], ['deleted_at', null]])
                  ->get();
                  $quantveterinaria3 = json_decode($veterinaria3);
                  $quantveterinaria3 = sizeof($quantveterinaria3);
                  // array_push($quantidadesveterinaria, $quantveterinaria3);


                $veterinaria4 = DB::table('requisicao_documentos')
                   ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                   ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                   ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                   ->select ('requisicao_documentos.id')
                   ->where([['documento_id',4],['curso_id', $idVet],['status','Em andamento'], ['deleted_at', null]])
                   ->get();
                   $quantveterinaria4 = json_decode($veterinaria4);
                   $quantveterinaria4 = sizeof($quantveterinaria4);
                   // array_push($quantidadesveterinaria, $quantveterinaria4);

                $veterinaria5 = DB::table('requisicao_documentos')
                    ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                    ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                    ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                    ->select ('requisicao_documentos.id')
                    ->where([['documento_id',5],['curso_id', $idVet],['status','Em andamento'], ['deleted_at', null]])
                    ->get();
                    $quantveterinaria5 = json_decode($veterinaria5);
                    $quantveterinaria5 = sizeof($quantveterinaria5);
                    // array_push($quantidadesveterinaria, $quantveterinaria5);
                    //zootecnia
              $zootecnia1= DB::table('requisicao_documentos')
                   ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                   ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                   ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                   ->select ('requisicao_documentos.id')
                   ->where([['documento_id',1],['curso_id', $idZoo],['status','Em andamento'], ['deleted_at', null]])
                   ->get();
                   $quantzootecnia1 = json_decode($zootecnia1);
                   $quantzootecnia1 = sizeof($quantzootecnia1);
                   // array_push($quantidadeszootecnia, $quantzootecnia1);
             $zootecnia2 = DB::table('requisicao_documentos')
                    ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                    ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                    ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                    ->select ('requisicao_documentos.id')
                    ->where([['documento_id',2],['curso_id', $idZoo],['status','Em andamento'], ['deleted_at', null]])
                    ->get();
                    $quantzootecnia2 = json_decode($zootecnia2);
                    $quantzootecnia2 = sizeof($quantzootecnia2);
                    // array_push($quantidadeszootecnia, $quantzootecnia2);
            //
              $zootecnia3 = DB::table('requisicao_documentos')
                     ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                     ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                     ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                     ->select ('requisicao_documentos.id')
                     ->where([['documento_id',3],['curso_id', $idZoo],['status','Em andamento'], ['deleted_at', null]])
                     ->get();
                     $quantzootecnia3 = json_decode($zootecnia3);
                     $quantzootecnia3 = sizeof($quantzootecnia3);
                     // array_push($quantidadeszootecnia, $quantzootecnia3);

             $zootecnia4 = DB::table('requisicao_documentos')
                      ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                      ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                      ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                      ->select ('requisicao_documentos.id')
                      ->where([['documento_id',4],['curso_id', $idZoo],['status','Em andamento'], ['deleted_at', null]])
                      ->get();
                      $quantzootecnia4 = json_decode($zootecnia4);
                      $quantzootecnia4 = sizeof($quantzootecnia4);
                      // array_push($quantidadeszootecnia, $quantzootecnia4);

            $zootecnia5 = DB::table('requisicao_documentos')
                       ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                       ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                       ->join('cursos', 'perfils.curso_id', '=' ,'cursos.id')
                       ->select ('requisicao_documentos.id')
                       ->where([['documento_id',5],['curso_id', $idZoo],['status','Em andamento'], ['deleted_at', null]])
                       ->get();
                       $quantzootecnia5 = json_decode($zootecnia5);
                       $quantzootecnia5 = sizeof($quantzootecnia5);
                       // array_push($quantidadeszootecnia, $quantzootecnia5);

            // $geral = json_decode($geral);
            $agronomia = [
                'quantagro1'=>$quantagro1,
                'quantagro2'=>$quantagro2,
                'quantagro3'=>$quantagro3,
                'quantagro4'=>$quantagro4,
                'quantagro5'=>$quantagro5,
            ];
            $bcc = [
                'quantbcc1' =>$quantbcc1,
                'quantbcc2' =>$quantbcc2,
                'quantbcc3' =>$quantbcc3,
                'quantbcc4' =>$quantbcc4,
                'quantbcc5' =>$quantbcc5,
            ];
            $engenharia = [
              'quanteng1' => $quantengenharia1,
              'quanteng2' => $quantengenharia2,
              'quanteng3' => $quantengenharia3,
              'quanteng4' => $quantengenharia4,
              'quanteng5' => $quantengenharia5,
            ];
            $letras = [
              'quantlet1' => $quantletras1,
              'quantlet2' => $quantletras2,
              'quantlet3' => $quantletras3,
              'quantlet4' => $quantletras4,
              'quantlet5' => $quantletras5,
            ];
            $pedagogia = [
              '$quantpedagogia1'=>$quantpedagogia1,
              '$quantpedagogia2'=>$quantpedagogia2,
              '$quantpedagogia3'=>$quantpedagogia3,
              '$quantpedagogia4'=>$quantpedagogia4,
              '$quantpedagogia5'=>$quantpedagogia5,
            ];
            $veterinaria = [
              'quantveterinaria1'=>$quantveterinaria1,
              'quantveterinaria2'=>$quantveterinaria2,
              'quantveterinaria3'=>$quantveterinaria3,
              'quantveterinaria4'=>$quantveterinaria4,
              'quantveterinaria5'=>$quantveterinaria5,
            ];
            $zootecnia = [
              '$quantzootecnia1'=>$zootecnia1,
              '$quantzootecnia2'=>$zootecnia2,
              '$quantzootecnia3'=>$zootecnia3,
              '$quantzootecnia4'=>$zootecnia4,
              '$quantzootecnia5'=>$zootecnia5,
            ];
            // dd($agronomia, $bcc, $engenharia, $letras, $pedagogia, $veterinaria, $zootecnia);
            $tipoDocumento = ['Declaração de Vínculo','Comprovante de Matrícula','Histórico','Programa de Disciplina','Outros','Todos'];
            return view('telas_servidor.home_servidor', ['cursos'=>$cursos,'tipoDocumento'=>$tipoDocumento, 'requisicoes'=>$requisicoes,
            'agronomia'=>$agronomia, 'bcc' =>$bcc, 'engenharia'=>$engenharia, 'letras'=>$letras, 'pedagogia'=>$pedagogia, 'veterinaria'=>$veterinaria, 'zootecnia'=>$zootecnia
            ]);
          }
          else if (Auth::user()->tipo == 'aluno') {
          return view('autenticacao.home-aluno');
          }

          else if (Auth::user()->tipo == 'administrador') {
          return view('autenticacao.home-administrador');
          }
        }
      //
        return view('home');
    }
}
