@extends('layouts.master')

@section('content')
<h1>Page d'administration</h1>
<p><a href="{{route('product.create')}}"><button type="button" class="btn btn-primary btn-lg">Ajouter un article</button></a></p>
{{$products->links()}}
@include('back.product.partials.flash')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Catégorie</th>
	        <th>Prix</th>
            <th>Statut</th>
            <th>Mettre à jour</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
    @forelse($products as $product)
        <tr>
            <td><a class="text-capitalize" href="{{route('product.edit', $product->id)}}">{{$product->title}}</a></td>
            
	    <td>@if($product->category_id ==1)Femme
        @elseif($product->category_id ==2)Homme
        @else pas de catégorie
        @endif
        </td>
            <td>{{$product->price}}€</td>
            <td>
            @if($product->statut == 'publié')
                <span style="color:green; font-weight:bold">publié</span>
                @else 
                <span style="color:orange; font-weight:bold">non publié</span>
                @endif
            </td>
            <td>
                <a href="{{route('product.edit', $product->id)}}"><img src="https://cdn4.iconfinder.com/data/icons/web-ui-color/128/Edit-512.png" width="20"></a>
            </td>
            <td>
            <form class="delete" method="POST" action="{{route('product.destroy', $product->id)}}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <input class="btn btn-danger" type="submit" value="delete" >
            </form>
            </td>
        </tr>
    @empty
        aucun article ...
    @endforelse
    </tbody>
</table>
@endsection

@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>

@endsection 

