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
            $quant = [];
            // foreach ($requisicoes as $key) {
              // if($key->documento_id==1){

              // $titulo = $documento->tipo;
              $id_documentos = DB::table('requisicao_documentos')
                     ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_documentos.requisicao_id')
                     ->join('perfils', 'requisicaos.perfil_id', '=', 'perfils.id')
                     ->select ('requisicao_documentos.id')
                     ->where([['documento_id',1],['curso_id', 1],['status','Em andamento']])
                     ->get();
                     // dd($id_documentos);

                     $id = []; //array auxiliar que pega cada item do $id_documentos
                     foreach ($id_documentos as $id_documento) {
                       array_push($id, $id_documento->id); //passa o id de $id_documentos para o array auxiliar $id
                     }
                     $listaRequisicao_documentos = Requisicao_documento::whereIn('id', $id)->get();
                     // dd($listaRequisicao_documentos);

                     foreach ($listaRequisicao_documentos as $key) {
                       // dd($key->requisicao->perfil);
                       if($key->requisicao->perfil != null && $key->requisicao->perfil->deleted_at!=null) {
                         $quantAgro = json_decode($listaRequisicao_documentos);
                         dd($quantAgro);
                       }
                     }

                // $cursosAgronomia = Curso::where('id', 1)->get();
                $quantCompVinculoAgronomia = Requisicao_documento::where('documento_id', 1)->get();
                // dd($quantCompVinculo);
                // $agronomia = HomeController::quantidadesPorCurso(1, $quantCompVinculo);
                // array_push($cursosAgronomia, $quantCompVinculoAgronomia);

                // $quantCompVinculoAgronomia = json_decode($quantCompVinculo, $cursosAgronomia);
                // dd($quantCompVinculoA);
              // }
              // if($key->documento_id==2){
                $quantCompMatricula = Requisicao_documento::where('documento_id', 2)->get();
                $quantCompMatricula = json_decode($quantCompMatricula);
              // }
              // if($key->documento_id==3){
                $quantCompHistorico = Requisicao_documento::where('documento_id', 3)->get();
                $quantCompHistorico= json_decode($quantCompHistorico);
              // }
              // if($key->documento_id==4){
                $quantProgramaDisciplina = Requisicao_documento::where('documento_id', 4)->get();
                $quantProgramaDisciplina = json_decode($quantProgramaDisciplina);
              // }
              // if($key->documento_id==5){
                $quantOutros = Requisicao_documento::where('documento_id', 5)->get();
                $quantOutros = json_decode($quantOutros);
              // }
              // if($key->documento_id==6){
              //   $quantidadesVeterinaria = Requisicao_documento::where('documento_id', 6)->get();
              //   $quantidadesVeterinaria = json_decode($quantidadesVeterinaria);
              // // }
              // // if($key->documento_id==7){
              //   $quantidadesZootecnia = Requisicao_documento::where('documento_id', 7)->get();
              //   $quantidadesZootecnia = json_decode($quantidadesZootecnia);
              // }
              // }

          //     array_push($quant, ['vinculo' => sizeof($quantCompVinculo),
          //                       'matricula' => sizeof($quantCompMatricula),
          //                       'historico' => sizeof($quantCompHistorico),
          //                       'programaDisciplina' => sizeof($quantProgramaDisciplina),
          //                       'outros' => sizeof($quantOutros),
          // ]);
            // dd($quant);
            $tipoDocumento = ['Declaração de Vínculo','Comprovante de Matrícula','Histórico','Programa de Disciplina','Outros','Todos'];
            return view('telas_servidor.home_servidor', ['cursos'=>$cursos,'tipoDocumento'=>$tipoDocumento, 'requisicoes'=>$requisicoes, 'quantidades'=>$quant,
                              // 'vinculo' => sizeof($quantCompVinculo),
                              // 'matricula' => sizeof($quantCompMatricula),
                              // 'historico' => sizeof($quantCompHistorico),
                              // 'programaDisciplina' => sizeof($quantProgramaDisciplina),
                              // 'outros' => sizeof($quantOutros),
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
    public function quantidadesPorCurso($id){
        // foreach ($requisicoes as $key) {
          // if($id == 1){


          // }
    // }
  }
}
