@extends('layouts.app')

@section('title')
    Gammes - Laravel Online Store
@endsection


@section('content')
    <section id="gammes">
        <div class="container-fluid mb-4">
            <div class="col-lg-5">
                <h1>Découvrez les gammes de l'atelier</h1>
            </div>
            <div class="row">

                @foreach ($gammes as $gamme)
                    <div class="col-lg-3 mx-auto survol" onclick="showProducts({{ $gamme->id }})">
                        <a>
                            <img src="{{ asset("images/$gamme->image") }}" alt="titre_gammes">
                            <h2 class='text-center'>{{ $gamme->name }}</h2>
                        </a>
                    </div>
                @endforeach

            </div>

            @foreach ($gammes as $gamme)
                <div class="row show_ligne_gamme" id="gamme_{{ $gamme->id }}">
                    @foreach ($gamme->products as $product)
                        <div class="col-lg-3 mb-5">
                            <div class="card mx-auto" style="width: 18rem;">
                                <img src="{{ asset("images/$product->image") }}" class="card-img-top"
                                    alt="img_card_product">
                                <div class="card-body">
                                    <h5 class="card-title">id n° {{ $product->gamme_id }}</h5>
                                    <p class="card-text">{{ $product->desc }}</p>
                                    <a href="{{ asset(route('info_product'))}}" class="btn btn-terracotta">En savoir +</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>

    <script>
        function showProducts(gammeId) {
            var divsGamme = document.querySelectorAll('.show_ligne_gamme');
            divsGamme.forEach(function(divGamme) {
                if (divGamme.id === 'gamme_' + gammeId) {
                    divGamme.style.display = 'block';
                } else {
                    divGamme.style.display = 'none';
                }
            });
        }
    </script>
@endsection
