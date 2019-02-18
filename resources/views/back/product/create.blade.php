@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1>Ajouter un article</h1>
            <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <div class="form">
                    <div class="form-group">
                        <label for="title">Titre :</label>
                        <input style="width:300px" type="text" name="title" value="{{old('title')}}" class="form-control" id="title">
                        @if($errors->has('title')) <span class="error bg-warning">{{$errors->first('title')}}</span>@endif
                    </div>

                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea type="text" name="description" class="form-control">{{old('description')}}</textarea>
                        @if($errors->has('description')) <span class="error bg-warning">{{$errors->first('description')}}</span> @endif
                    </div>

                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input style="width:100px" type="text" name="price" value="{{old('price')}}" class="form-control" id="price">
                        @if($errors->has('price')) <span class="error bg-warning">{{$errors->first('price')}}</span>@endif
                    </div>

                    <div class="form-select">
                        <label for="category">Catégorie :</label>
                        <select id="category" name="category_id">
                            @foreach($categories as $id => $title)
                            <option value="{{$id}}">{{$title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-select">
                        <label for="size">Taille :</label>
                        <select id="size" name="size">
                            @forelse($product as $item)
                            <option>{{$item->size}}</option>
                            @empty
                            <option>aucune taille disponible</option>
                            @endforelse
                            @if($errors->has('size')) <span
                                class="error bg-warning">{{$errors->first('size')}}</span>@endif
                        </select>
                    </div>

                    <div class="input-file">
                        <h2>Charger un visuel:</h2>
                        <input class="file" type="file" name="picture">
                    </div> 
                </div>                     
            
        </div> <!-- #end col md 6 -->

        <div class="col-md-6">
            <div class="form-group">
                <div class="input-radio">
                    <h2>Statut</h2>
                    publié <input type="radio" @if(old('statut')=='publié') checked @endif name="statut" value="publié" > 
                    <br>   
                    brouillon <input type="radio" @if(old('statut')=='brouillon') checked @endif name="statut" value="brouillon" checked>
                </div>
            </div>

            <div style="margin-top: 10px" class="form-select">
                        <label for="code">Code produit :</label>
                        <select id="code" name="code" class="form-control">
                            <option>soldes</option>
                            <option selected>nouveautés</option>
                        </select>
            </div>

            <div style="margin-top: 10px" class="form-group">
                        <label for="reference">Référence :</label>
                        <input  style="width:150px" type="text" name="reference" value="{{old('reference')}}" class="form-control" id="reference"
                            placeholder="max: 10 caractères">
                        @if($errors->has('reference')) <span class="error bg-warning">{{$errors->first('reference')}}</span>@endif
            </div>            
        </div> 
    </div>    
     <button style="margin-top: 20px" type="submit" class="btn btn-primary">Ajouter l'article</button>
    </form>
</div> 
@endsection