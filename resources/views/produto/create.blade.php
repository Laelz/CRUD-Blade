@extends('index')
@extends('header')

@section('content')
<div class="card card-geral">
    <div class="card-body">
        <H2>Criar Produto</H2>
        <form action="{{ route('produto.store') }}" role="form" method="post" name="form">
            @csrf
        
            <div class="form-group">
                <input type="text" name="nome" placeholder="Nome do Produto" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" id="preco" name="preco" placeholder="Preço" class="form-control">
            </div>
            <div class="form-group">
                <input type="number" name="estoque" placeholder="Quantidade" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
</div>
@endsection