@extends ('layouts/master')

@section('content')
<div id="single" class="container" style="margin-top:50px">
    <div class="row">
    <div class="col-md-3">
        <img width="140" src="{{asset('images/'.$product->url_image)}}">
        <img width="140" style="margin:20px 0" src="{{asset('images/'.$product->url_image)}}">
        <img width="140" src="{{asset('images/'.$product->url_image)}}">
        
    </div>
    <div class="col-md-6">
        <img style="max-width:400px" src="{{asset('images/'.$product->url_image)}}">
        <p><i>Description</i> : <br>
            {{$product->description}}
        </p>
    </div>
    <div id="show" class="col-md-3">
        <p class="text-uppercase">{{$product->title}}</p>
        <p>ref : {{$product->reference}}</p>
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
        
        <p>taille: {{$product->size}}</p>
        <p>Autres tailles disponibles</p>
        <select name="size" id="size">
        @forelse($products as $item)
        <option>{{$item->size}}</option>
        @empty
        <option>aucune taille disponible</option>
        @endforelse
        </select>
    </div>
    </div>
</div>
    
@endsection