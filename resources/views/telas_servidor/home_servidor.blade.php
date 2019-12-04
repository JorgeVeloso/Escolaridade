@extends('layouts.app')

@section('conteudo')
<body onload="carrega();">
<div class="tela-servidor ">
        <div class="centro-cartao">
            <label for="cursos" style="margin-left:275px; ">Selecionar Curso</label>
            <div class="justify-content-right" style="margin-left: 275px">
              <select name="cursos" id="cursos" onchange="getSelectValue();"
              class="browser-default custom-select custom-select-lg mb-1" style="width: 400px">
                @foreach($cursos as $curso)
                <option value="{{$curso->id}}">{{$curso->nome}}</option>
                @endforeach
              </select>
            </div>
            <script>
                function getSelectValue(){
                    var selectedValue = document.getElementById("cursos").value;
                    console.log(selectedValue);
                    quantidades(selectedValue);
                    document.getElementById('cursoIdDeclaracao1').value = selectedValue;
                    document.getElementById('cursoIdDeclaracao2').value = selectedValue;
                    document.getElementById('cursoIdDeclaracao3').value = selectedValue;
                    document.getElementById('cursoIdDeclaracao4').value = selectedValue;
                    document.getElementById('cursoIdDeclaracao5').value = selectedValue;
                    // document.getElementById('cursoIdDeclaracao6').value = selectedValue;
                }
            </script>
                <div class="card-deck d-flex justify-content-center">
                    <div class="conteudo-central d-flex justify-content-center">
                      @for($i = 1;$i <= 5; $i++)
                          <a   href="{{ route('listar-requisicoes') }}" onclick="event.preventDefault();
                                           document.getElementById('listar-requisicoes{{$i}}-form').submit();" style="text-decoration:none; color: inherit;">
                             <div class="card cartao text-center " style="border-radius: 20px">
                                     <div class="card-body d-flex justify-content-center">
                                     <h2 style="padding-top:20px">{{$tipoDocumento[$i-1]}}</h2>
                                 </div>
                                 <h5 id="quantidades{{$i}}"></h5>
                             </div>
                          </a>
                          <form id="listar-requisicoes{{$i}}-form" action="{{ route('listar-requisicoes') }}" method="GET" style="display: none;">
                            <input id="cursoIdDeclaracao{{$i}}" type="hidden" name="curso_id" value="1">
                            <input  type="hidden" name="titulo_id" value="{{$i}}">
                          </form>
                        @endfor
<script>
    function quantidades(curso){ //id do curso
      var selecionado = curso;
      var array = @json($requisicoes);
      var aux, i;
      tamanho = array.length;
      var vinculo1 = 0, matricula1 = 0, historico1 = 0 , programa1 = 0, outros1 = 0;
      var vinculo2 = 0, matricula2 = 0, historico2 = 0 , programa2 = 0, outros2 = 0;
      var vinculo3 = 0, matricula3 = 0, historico3 = 0 , programa3 = 0, outros3 = 0;
      var vinculo4 = 0, matricula4 = 0, historico4 = 0 , programa4 = 0, outros4 = 0;
      var vinculo5 = 0, matricula5 = 0, historico5 = 0 , programa5 = 0, outros5 = 0;
      var vinculo6 = 0, matricula6 = 0, historico6 = 0 , programa6 = 0, outros6 = 0;
      var vinculo7 = 0, matricula7 = 0, historico7 = 0 , programa7 = 0, outros7 = 0;
      document.getElementById('quantidades1').innerHTML = '';
      document.getElementById('quantidades2').innerHTML = '';
      document.getElementById('quantidades3').innerHTML = '';
      document.getElementById('quantidades4').innerHTML = '';
      document.getElementById('quantidades5').innerHTML = '';

      for(i = 0; i < tamanho; i++){
//AGRONOMIA
        if(selecionado==1){
          if(array[i].documento_id == 1){
            vinculo1++;
          }
          if(array[i].documento_id == 2){
            matricula1++;
          }
          if(array[i].documento_id == 3){
            historico1++;
          }
          if(array[i].documento_id == 4){
            programa1++;
          }
          if(array[i].documento_id == 5){
            outros1++;
          }
          document.getElementById('quantidades1').innerHTML = "Quantidade: "+vinculo1;
          document.getElementById('quantidades2').innerHTML = "Quantidade: "+matricula1;
          document.getElementById('quantidades3').innerHTML = "Quantidade: "+historico1;
          document.getElementById('quantidades4').innerHTML = "Quantidade: "+programa1;
          document.getElementById('quantidades5').innerHTML = "Quantidade: "+outros1;
        }
//BCC
        else if(selecionado==2){
          if(array[i].documento_id == 1){
            vinculo2++;
          }
          if(array[i].documento_id == 2){
            matricula2++;
          }
          if(array[i].documento_id == 3){
            historico2++;
          }
          if(array[i].documento_id == 4){
            programa2++;
          }
          if(array[i].documento_id == 5){
            outros2++;
          }
          document.getElementById('quantidades1').innerHTML = "Quantidade: "+vinculo2;
          document.getElementById('quantidades2').innerHTML = "Quantidade: "+matricula2;
          document.getElementById('quantidades3').innerHTML = "Quantidade: "+historico2;
          document.getElementById('quantidades4').innerHTML = "Quantidade: "+programa2;
          document.getElementById('quantidades5').innerHTML = "Quantidade: "+outros2;
        }
//ENGENHARIA
        else if(selecionado==3){
          if(array[i].documento_id == 1){
            vinculo3++;
          }
          if(array[i].documento_id == 2){
            matricula3++;
          }
          if(array[i].documento_id == 3){
            historico3++;
          }
          if(array[i].documento_id == 4){
            programa3++;
          }
          if(array[i].documento_id == 5){
            outros3++;
          }
          document.getElementById('quantidades1').innerHTML = "Quantidade: "+vinculo3;
          document.getElementById('quantidades2').innerHTML = "Quantidade: "+matricula3;
          document.getElementById('quantidades3').innerHTML = "Quantidade: "+historico3;
          document.getElementById('quantidades4').innerHTML = "Quantidade: "+programa3;
          document.getElementById('quantidades5').innerHTML = "Quantidade: "+outros3;
        }
//LETRAS
        else if(selecionado==4){
          if(array[i].documento_id == 1){
            vinculo4++;
          }
          if(array[i].documento_id == 2){
            matricula4++;
          }
          if(array[i].documento_id == 3){
            historico4++;
          }
          if(array[i].documento_id == 4){
            programa4++;
          }
          if(array[i].documento_id == 5){
            outros4++;
          }
          document.getElementById('quantidades1').innerHTML = "Quantidade: "+vinculo4;
          document.getElementById('quantidades2').innerHTML = "Quantidade: "+matricula4;
          document.getElementById('quantidades3').innerHTML = "Quantidade: "+historico4;
          document.getElementById('quantidades4').innerHTML = "Quantidade: "+programa4;
          document.getElementById('quantidades5').innerHTML = "Quantidade: "+outros4;
        }
//PEDAGOGIA
        else if(selecionado==5){
          if(array[i].documento_id == 1){
            vinculo5++;
          }
          if(array[i].documento_id == 2){
            matricula5++;
          }
          if(array[i].documento_id == 3){
            historico5++;
          }
          if(array[i].documento_id == 4){
            programa5++;
          }
          if(array[i].documento_id == 5){
            outros5++;
          }
          document.getElementById('quantidades1').innerHTML = "Quantidade: "+vinculo5;
          document.getElementById('quantidades2').innerHTML = "Quantidade: "+matricula5;
          document.getElementById('quantidades3').innerHTML = "Quantidade: "+historico5;
          document.getElementById('quantidades4').innerHTML = "Quantidade: "+programa5;
          document.getElementById('quantidades5').innerHTML = "Quantidade: "+outros5;
        }
//VETERINARIA
        else if(selecionado==6){
          if(array[i].documento_id == 1){
            vinculo6++;
          }
          if(array[i].documento_id == 2){
            matricula6++;
          }
          if(array[i].documento_id == 3){
            historico6++;
          }
          if(array[i].documento_id == 4){
            programa6++;
          }
          if(array[i].documento_id == 5){
            outros6++;
          }
          document.getElementById('quantidades1').innerHTML = "Quantidade: "+vinculo6;
          document.getElementById('quantidades2').innerHTML = "Quantidade: "+matricula6;
          document.getElementById('quantidades3').innerHTML = "Quantidade: "+historico6;
          document.getElementById('quantidades4').innerHTML = "Quantidade: "+programa6;
          document.getElementById('quantidades5').innerHTML = "Quantidade: "+outros6;
        }
//ZOOTECNIA
        else if(selecionado==7){
          if(array[i].documento_id == 1){
            vinculo7++;
          }
          if(array[i].documento_id == 2){
            matricula7++;
          }
          if(array[i].documento_id == 3){
            historico7++;
          }
          if(array[i].documento_id == 4){
            programa7++;
          }
          if(array[i].documento_id == 5){
            outros7++;
          }
          document.getElementById('quantidades1').innerHTML = "Quantidade: "+vinculo7;
          document.getElementById('quantidades2').innerHTML = "Quantidade: "+matricula7;
          document.getElementById('quantidades3').innerHTML = "Quantidade: "+historico7;
          document.getElementById('quantidades4').innerHTML = "Quantidade: "+programa7;
          document.getElementById('quantidades5').innerHTML = "Quantidade: "+outros7;
        }
        else {
          // alert()
        }
      }
      return;
    }
    function carrega(){
      var array = @json($requisicoes);
      var vinculo1 = 0, matricula1 = 0, historico1 = 0 , programa1 = 0, outros1 = 0;
      if(array[i].documento_id == 1){
        vinculo1++;
      }
      if(array[i].documento_id == 2){
        matricula1++;
      }
      if(array[i].documento_id == 3){
        historico1++;
      }
      if(array[i].documento_id == 4){
        programa1++;
      }
      if(array[i].documento_id == 5){
        outros1++;
      }
      document.getElementById('quantidades1').innerHTML = "Quantidade: "+vinculo1;
      document.getElementById('quantidades2').innerHTML = "Quantidade: "+matricula1;
      document.getElementById('quantidades3').innerHTML = "Quantidade: "+historico1;
      document.getElementById('quantidades4').innerHTML = "Quantidade: "+programa1;
      document.getElementById('quantidades5').innerHTML = "Quantidade: "+outros1;
    }

</script>
@endsection
