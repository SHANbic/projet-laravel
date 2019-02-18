<nav class="navbar navbar-inverse">
    <h1 class="mx-auto text-uppercase" style="width: 220px; font-family:Lora, sans-serif;font-size: 2.5rem">la maison</h1>
    <div class="container-fluid">
    <div class="navbar-header">
        <span class="icon-bar"><a href="{{url('/')}}">Accueil</a></span>
        @if(Route::is('product.*') == false)
        <span class="icon-bar"><a href="{{url('solde')}}" class="text-uppercase">soldes</span>
        
        @if(isset($categories))
        @forelse($categories as $id => $title)
        <span class="icon-bar"><a href="{{url('category', $title)}}">{{$title}}</a></span>
        @empty 
        <li>Aucune categorie pour l'instant</li>
        @endforelse
        @endif
        @endif
        
    </div>
    <div class="nav navbar-nav navbar-right">
            @if(Auth::check())
            
            <span><a href="{{route('product.index')}}">Administration</a></span>
            <span><a href="{{route('logout')}}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout
                </a>
            </span>
            <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                {{ csrf_field()  }}
            </form>
            
            @else
            <span><a href="{{route('login')}}" style="padding-left: 10px">Login</a></span>
            @endif
        </div>
    </div>
</nav>