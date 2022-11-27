@extends('layouts.main')

@section('title', 'Raspadinha Cursos - Alunos')

@section ('content')  
<script>
    
  function limpa_formulário_cep() {
          //Limpa valores do formulário de cep.
          document.getElementById('endereco').value=("");
  }
  function meu_callback(conteudo) {
      if (!("erro" in conteudo)) {
          //Atualiza os campos com os valores.
          document.getElementById('endereco').value=(conteudo.logradouro).concat(', N');
      } //end if.
      else {
          //CEP não Encontrado.
          limpa_formulário_cep();
          alert("CEP não encontrado.");
      }
  }
      
  function pesquisacep(valor) {
      //Nova variável "cep" somente com dígitos.
      var cep = valor.replace(/\D/g, '');
      //Verifica se campo cep possui valor informado.
      if (cep != "") {
          //Expressão regular para validar o CEP.
          var validacep = /^[0-9]{8}$/;
          //Valida o formato do CEP.
          if(validacep.test(cep)) {
              //Preenche os campos com "..." enquanto consulta webservice.
              document.getElementById('endereco').value="...";
              //Cria um elemento javascript.
              var script = document.createElement('script');
              //Sincroniza com o callback.
              script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
              //Insere script no documento e carrega o conteúdo.
              document.body.appendChild(script);
          } //end if.
          else {
              //cep é inválido.
              limpa_formulário_cep();
              alert("Formato de CEP inválido.");
          }
      } //end if.
      else {
          //cep sem valor, limpa formulário.
          limpa_formulário_cep();
      }
  };
</script>

  <h2 class="titulo">Alunos</h2>

    @foreach($alunos as $aluno)

      <form action="{{ route('pagina-aluno', $aluno) }}" method="get">
        
        <button class="btn-aluno-crud">{{$aluno -> nome}}</button>

      </form>  

    @endforeach 

  <form action="{{ route('cria-aluno') }}" method="post">
  
    {{ csrf_field() }}
    
    <h4 class="cadastrar-aluno">Cadastrar Aluno</h4>
    
    <div>
      <label for="nome">Nome Completo</label>
      <input type="text" name="nome">
      
      <label for="cpf">CPF</label>
      <input type="text" name="cpf">

      <label for="cep">Cep:
        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
               onblur="pesquisacep(this.value);" /></label>
      
      <label for="endereco">Endereço</label>
      <input type="text" name="endereco" id="endereco">

      <label for="filme">Filme</label>
      <input type="text" name="filme" id="filme">

      <br>
      <h1></h1>

      <label for="usuario">Usuário</label>
      <input type="text" name="usuario">
      
      <label for="senha">Senha</label>
      <input type="password" name="senha">
      <br>
      <button class="btn" id="botao-salvar">Salvar</button>
    </div>
  </br>

@endsection