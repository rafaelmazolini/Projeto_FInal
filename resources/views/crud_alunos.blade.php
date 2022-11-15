<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Raspadinha Cursos</title>
  
  <script>
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('endereco').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('endereco').value=(conteudo.logradouro);
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
  
</head>
<body>
<form action="{{ route('pagina-login') }}" method="get">
  <button>Menu</button>
</form>
<h1>Alunos</h1>

<form action="{{ route('cria-aluno') }}" method="post">
  
  {{ csrf_field() }}
  
  <h3>Cadastrar Aluno</h3>
  
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
    <input type="text" name="filme">
    
    <label for="usuario">Usuário</label>
    <input type="text" name="usuario">
    
    <label for="senha">Senha</label>
    <input type="password" name="senha">
    
    <button>Salvar</button>
  </div>
  
</form>

@foreach($alunos as $aluno)

  <form action="{{ route('pagina-aluno', $aluno) }}" method="get">

    <button>{{$aluno -> nome}}</button>

  </form> 

@endforeach


  
</body>
</html>