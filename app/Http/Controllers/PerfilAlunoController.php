<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Curso;
use App\Unidade;
use App\User;
use App\Aluno;
use App\Perfil;
use Auth;

class PerfilAlunoController extends Controller
{
    //
    public function index(){
      $cursos = Curso::all();
      $unidades = Unidade::all();
      $idUser = Auth::user()->id;
      $user = User::find($idUser); //Usuário Autenticado
      $aluno = Aluno::where('user_id',$idUser)->first(); //Aluno autenticado
      // $temp = Perfil::where('user_id',$perfisAluno->aluno_id)->first();
      // dd($temp);
      // array_push($arrayPerfis, $temp);
      //PRIMEIRO PERFIL DO ALUNO
      $perfil = Perfil::where('aluno_id',$aluno->id)->first();
      // dd($perfil);
      //TODOS OS PERFIS VINCULADOS AO ALUNO
      $perfisAluno = Perfil::where('aluno_id',$aluno->id)->get();
      // dd($perfisAluno);
      // dd($perfil->aluno_id);
      // $temp = Perfil::whereNotIn('aluno_id', $perfil->aluno_id)->get();
      // dd($temp);
      //
      // $users = DB::table('users')
      //                     ->whereNotIn('id', [1, 2, 3])
      //                     ->get();
      // $perfisAluno = Perfil::whereNotIn('aluno_id',$perfil->aluno_id)->get();
      $unidadeAluno = Unidade::where('id',$perfil->unidade_id)->first();
      $cursoAluno = Curso::where('id',$perfil->curso_id)->first();
      return view('telas_aluno.perfil_aluno',['cursos'=>$cursos,'unidades'=>$unidades,'user'=>$user,
                                              'aluno'=>$aluno,'perfil'=>$perfil,'unidadeAluno'=>$unidadeAluno->nome,'cursoAluno'=>$cursoAluno,'perfisAluno'=>$perfisAluno]);
    }
    public function editarInfo(){
      $idUser = Auth::user()->id;
      $user = User::find($idUser); //Usuário Autenticado
      $aluno = Aluno::where('user_id',$idUser)->first(); //Aluno autenticado
      return view('telas_aluno.editar_info_aluno',compact('user','aluno'));
    }
    public function storeEditarInfo(Request $request){
      //atualização dos dados
      $user = Auth::user();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->save();
      //dados para ser exibido na view
      $cursos = Curso::all();
      $unidades = Unidade::all();
      $idUser = Auth::user()->id;
      $user = User::find($idUser); //Usuário Autenticado
      $aluno = Aluno::where('user_id',$idUser)->first(); //Aluno autenticado
      $perfil = Perfil::where('aluno_id',$aluno->id)->first();
      $unidadeAluno = Unidade::where('id',$perfil->unidade_id)->first();
      $cursoAluno = Curso::where('id',$perfil->curso_id)->first();
      return view('autenticacao.home-aluno',['cursos'=>$cursos,'unidades'=>$unidades,'user'=>$user,
                                              'aluno'=>$aluno,'perfil'=>$perfil,'unidadeAluno'=>$unidadeAluno->nome,'cursoAluno'=>$cursoAluno]);
    }
    public function alterarSenha(){
      return view('telas_aluno.alterar_senha');
    }
    public function storeAlterarSenha(Request $request){
      $request->validate([
        'password' => 'required|string|min:8|confirmed',
      ]);
      $user = Auth::user();
      $user->password = Hash::make($request->password);
      $user->save();
      //dados para ser exibido na view
      $cursos = Curso::all();
      $unidades = Unidade::all();
      $idUser = Auth::user()->id;
      $user = User::find($idUser); //Usuário Autenticado
      $aluno = Aluno::where('user_id',$idUser)->first(); //Aluno autenticado
      $perfil = Perfil::where('aluno_id',$aluno->id)->first();
      $unidadeAluno = Unidade::where('id',$perfil->unidade_id)->first();
      $cursoAluno = Curso::where('id',$perfil->curso_id)->first();
      return view('autenticacao.home-aluno',['cursos'=>$cursos,'unidades'=>$unidades,'user'=>$user,
                                              'aluno'=>$aluno,'perfil'=>$perfil,'unidadeAluno'=>$unidadeAluno->nome,'cursoAluno'=>$cursoAluno]);
    }
    // public function excluirPerfil(){
    //   return redirect('telas_aluno.perfil_aluno');
    // }
    // public function index(){
    //   $cursos = Curso::all();
    //   $unidades = Unidade::all();
    //   return view('telas_aluno.perfil_aluno',compact('cursos','unidades'));
    // }
    // public function editarInfo(){
    //   $cursos = Curso::all();
    //   $unidades = Unidade::all();
    //   return view('telas_aluno.editar_info_aluno',compact('cursos','unidades'));
    // }
    public function adicionaPerfil(Request $request){
      $idUser = Auth::user()->id;
      $user = User::find($idUser); //Usuário Autenticado
      $aluno = Aluno::where('user_id',$idUser)->first(); //Aluno autenticado
      $perfil = Perfil::where('aluno_id',$aluno->id)->first();
      $unidadeAluno = Unidade::where('id',$perfil->unidade_id)->first();
      $cursoAluno = Curso::where('id',$perfil->curso_id)->first();
      $perfis = Perfil::All();
      $unidades = Unidade::All();
      $cursos = Curso::All();
      // dd($perfil);
      return view ('telas_aluno.adiciona_perfil_aluno', compact('perfil', 'perfis','cursoAluno', 'unidadeAluno', 'aluno', 'unidades', 'cursos'));
    }
    public function salvaPerfil(Request $request){
      $usuario = User::find(Auth::user()->id);
      $aluno = $usuario->aluno;
      $perfil = new Perfil();
      // $perfil->aluno_id = $request->idAluno;
      $perfil->curso_id = $request->cursos;
      $perfil->unidade_id = $request->unidade;
      if($request->vinculo === "1"){
        $perfil->situacao = "Matriculado";
      }
      else{
        $perfil->situacao = "Egresso";
      }
      $temp = $request->cursos;
      $curso = Curso::where('id',$request->cursos)->first();
      $perfil->default = $curso->nome;
      $perfil->aluno()->associate($aluno);
      $perfil->save();
      return redirect ('telas_aluno.perfil_aluno');
    }
      public function excluirPerfil(Request $id) {
          $perfil = Perfil::find($id);
          $perfil->delete();
          return redirect()
                  ->action('PerfilAlunoController@index', $perfis)
                  ->withInput();
      }
}
