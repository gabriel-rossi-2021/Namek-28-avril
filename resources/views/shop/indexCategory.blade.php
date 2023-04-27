@extends('home')
@section('category')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" style="margin-top: 2%;width: 100%;">
        <div id="myCarousels" class="carousel slide" data-bs-ride="carousel" style="">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousels" data-bs-slide-to="0" class="active">
                    @foreach($categories as $categorie)
                        <button type="button" data-bs-target="#myCarousels" data-bs-slide-to="{{ $categorie->id_category }}"></button>
                    @endforeach

                </div>

                <div class="carousel-inner" style="border-radius: 1%;">
                    <!--DIAPO 1-->
                    <div class="carousel-item active" id="carousel-categorie">
                        <a href="/produit">
                            <img style="filter: grayscale(20%);" class="bd-placeholder-img" width="100%" height="100%" src="{{asset('img/home/NosProduits.jpeg')}}" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>
                        </a>
                    </div>
                    <!-- RESTE DES DIAPO -->
                    @foreach($categories as $categorie)
                    <div class="carousel-item" id="carousel-categorie" style="border-radius: 1%;">
                        <a href="{{ route('voir_products_par_cat', ['id'=>$categorie->id_category]) }}">
                            <img style="filter: grayscale(20%);" class="bd-placeholder-img" width="100%" height="100%" src="{{ asset('img/home/'.$categorie->image_category) }}" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>
                        </a>
                    </div>
                    @endforeach

                    <!-- FLECHE SUIVANT/PRECEDANT -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousels" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousels" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('rss')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" style="margin-top: 2%;width: 100%;">
    <div id="myCarousels-2" class="carousel slide" data-bs-ride="carousel" style="">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousels-2" data-bs-slide-to="0" class="active">
                @php
                    $index = 1;
                @endphp
                @foreach($rss as $rssProduct)
                    <button type="button" data-bs-target="#myCarousels-2" data-bs-slide-to="{{ $index }}" @if($index == 0) class="active" @endif></button>
                    @php
                        $index++;
                    @endphp
                @endforeach
        </div>

        <div class="carousel-inner" style="border-radius: 1%;">
            <!--DIAPO 1-->
            <div class="carousel-item active" id="carousel-categorie">
                <a href="/produit">
                    <img style="filter: grayscale(20%);" class="bd-placeholder-img" width="100%" height="100%" src="{{asset('img/home/NosProduits.jpeg')}}" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>
                </a>
            </div>
            <!-- RESTE DES DIAPO -->
            @foreach($rss as $rssProduct)
            <div class="carousel-item" id="carousel-categorie-2" style="background: #babab8">
                <div class="content-new-product">
                    <div class="title-new-product">
                        <h3 style="float: left;text-align:left">{{ $rssProduct->name_product }}</h3>
                        <h3 style="text-align:right" >{{ $rssProduct->prixTTC() }} CHF</h3>
                    </div>
                    <a href="{{ route('detail_produit', ['id'=>$rssProduct->id_product]) }}">
                        <div class="image-new-product">
                            <img style="filter: grayscale(20%);" class="bd-placeholder-img" width="100%" height="100%" src="{{asset('img/Products/'.$rssProduct->image_product)}}" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

            <!-- FLECHE SUIVANT/PRECEDANT -->
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousels-2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousels-2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
@endsection

