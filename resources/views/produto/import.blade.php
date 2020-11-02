@extends('index')
@extends('header')

@section('content')
<div class="card card-geral">
  <div class="card-body">
    <H2>Produtos</H2>
    <form action="{{ route('produto.importProdutos') }}" role="form" method="post" enctype="multipart/form-data" name="form">
      @csrf
      <div class="form-group">  
        <input type="file" name="file" id="file" placeholder="file" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</div>

@endsection