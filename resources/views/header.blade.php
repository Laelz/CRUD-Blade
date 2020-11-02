<nav class="navbar navbar-expand-lg navbar-red bg-red">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('home') }}" id=" navbar" role="button" aria-haspopup="true" aria-expanded="false">
          Home
        </a>
      </li>
    

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produtos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('produto.index') }}">Comprar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('produto.create') }}">Criar</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('produto.import') }}">Importar</a>
        </div>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="{{ route('vendas.index') }} id=" navbar" role="button" aria-haspopup="true" aria-expanded="false">
          Minhas Compras
        </a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="{{ route('vendas.index') }} id=" navbar" role="button" aria-haspopup="true" aria-expanded="false"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        </a>
      </li>

    </ul>
  </div>
</nav>