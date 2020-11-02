@extends('index')
@extends('header')

@section('content')
<div class="card card-geral">
    <div class="card-body">
        <H2>Criar Aluno</H2>
        <form action="{{ route('aluno.store') }}" role="form" method="post" name="form">
            @csrf
            <div class="form-group">
                <input type="text" value="{{ $user->name }}" class="form-control" disabled>
                <input type="hidden" name="nome" value="{{ $user->name }}" class="form-control">
            </div>
            <div class="form-group">
                <input type="date" name="data_nascimento" class="form-control">
            </div>
            <div class="form-group">
                <select class="form-control" name="turma_id" id="exampleFormControlSelect1">
                    <option value="1">1º ano</option>
                    <option value="2">2º ano</option>
                    <option value="3">3º ano</option>
                    <option value="4">4º ano</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="cep" id="cep" onblur="callCep()" placeholder="CEP" class="form-control">
                <input type="text" name="endereco" id="endereco" placeholder="Endereço" class="form-control">
                <input type="text" name="bairro" id="bairro" placeholder="Bairro" class="form-control">
                <input type="text" name="cidade" id="cidade" placeholder="Cidade" class="form-control">
                <input type="text" name="uf" id="uf" placeholder="UF" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>
@section('script')

<script>

function callCep() {
  var endereco_cep = $("#cep").val();
  endereco_cep = endereco_cep.split('-').join('');
  endereco_cep = endereco_cep.split('.').join('');

      console.log(endereco_cep);
      $.get("https://viacep.com.br/ws/" + endereco_cep + "/json/", function (dado) {


      console.log(dado);

      $("#endereco").val(dado.logradouro);
      $("#bairro").val(dado.bairro);
      $("#cidade").val(dado.localidade);
      $("#uf").val(dado.uf);
  })
}
;
</script>
@endsection
@endsection