@extends('index')
@extends('header')

@section('content')
<div class="card card-geral">
  <div class="card-body">
    <H2>Produtos</H2>
    <form action="">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">Estoque</th>
            <th scope="col">Preço</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>

          @foreach($produtos as $produto)
          <tr>
            <th scope="row">{{ $produto->id }}</th>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->estoque }}</td>
            <td>{{ $produto->preco }}</td>
            <td> <a class="btn btn-primary" href="#" role="button">Comprar</a> <a class="btn btn-green" href="#" role="button">Comprar</a> <a class="btn btn-danger" href="#" role="button">Apagar</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
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
    $.get("https://viacep.com.br/ws/" + endereco_cep + "/json/", function(dado) {


      console.log(dado);

      $("#endereco").val(dado.logradouro);
      $("#bairro").val(dado.bairro);
      $("#cidade").val(dado.localidade);
      $("#estado").val(dado.uf);
      $("#uf").val("Brasil");

    })
  };
</script>
@endsection
@endsection