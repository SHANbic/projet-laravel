@extends ('layouts.master')

@section ('content')

<h1>Tous nos produits {{$category->title}}</h1> 
<p class="text-right"> {{$count}} produits disponibles</p>

{{$products->links()}}

<div class="album py-5">
    <div class="container">
        <div class="row">

@forelse($products as $product)
    
    <div class="col-md-4">
            <div class="card mb-4 box-shadow">
            <a href="{{url('produit', $product->id)}}"><img class="card-img-top" src="{{asset('../images/'.$product->url_image)}}" alt="high quality product"></a>
                <div class="card-body">
                    <p class="card-text"><a class="text-capitalize" href="{{url('produit', $product->id)}}">{{$product->title}}</a></p>
                    <div class="d-flex justify-content-between align-items-center">
                    <p class="card-text">
                        @if($product->code === 'soldes')
                        Prix: <?php echo number_format($product->price*0.65, 2)?>€
                        <span style="color:red; text-decoration:line-through">
                        {{$product->price}}€
                        </span>
                        @else
                        Prix: {{$product->price}}€
                        @endif
                    </p>
                    <button type="button" class="btn btn-sm btn-outline-secondary">{{$product->code}}</button>
                    </div>
                    <small class="text-muted">Rayon {{$product->category->title}}</small>
                </div>
                
            </div>
    </div>

@empty
<p>Aucun produit actuellement en vente sur le site</p>
@endforelse

        </div>
    </div>
</div>

@endsection