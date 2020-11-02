@extends('index')
@extends('header')
@section('content')
<div class="card card-geral">
  <div class="card-body">
    <H2>Profile</H2>
    <form action="{{ route('aluno.update') }}" role="form" method="post" name="form">
      @csrf
      <div class="form-group">
        <input type="hidden" name="id" value="{{ $aluno->id }}" class="form-control">
        <input type="text" name="nome" value="{{ $aluno->nome }}" class="form-control">
      </div>
      <div class="form-group">
        <input type="date" name="data_nascimento" value="{{ $aluno->data_nascimento }}" class="form-control">
      </div>

      <div class="form-group">
        <input type="text" name="cep" id="cep" value="{{ $aluno->cep }}" placeholder="CEP" class="form-control">
        <input type="text" name="endereco" id="endereco" value="{{ $aluno->endereco }}" placeholder="Endereço" class="form-control">
        <input type="text" name="bairro" id="bairro" value="{{ $aluno->bairro }}" placeholder="Bairro" class="form-control">
        <input type="text" name="cidade" id="cidade" value="{{ $aluno->cidade }}" placeholder="Cidade" class="form-control">
        <input type="text" name="uf" id="uf" value="{{ $aluno->uf }}" placeholder="UF" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Editar</button>
    </form>
  </div>
</div>

@endsection