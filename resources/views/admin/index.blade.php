@extends('layouts.app')


@section('title')
    BACK - OFFICE
@endsection


@section('content')
    <section id="back_office">
        <h1>Espace Administrateur - <span>Back-Office</span></h1>
        <div class="w-50 accordion accordion-flush mx-auto" id="accordionFlushExample">

            {{-- Accoredion Gammes --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        GAMMES
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        @foreach ($gammes as $gamme)
                            <h5>{{ $gamme->name }}</h5>
                        @endforeach
                        <button class="btn btn-terracotta">+ Ajouter une gamme</button>
                    </div>
                </div>
            </div>

            {{-- Accoredion Products --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        PRODUITS
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row">{{ $product->id }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->desc }}</td>
                                        <td>{{ $product->price }}€</td>
                                        <td class="d-flex">
                                            <a href=""><img src="{{ asset('images/logos/edit.png') }}" alt="delete"></a>
                                            <a href=""><img src="{{ asset('images/logos/delete.png') }}" alt="delete" class="ms-1"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>


                        <button class="btn btn-terracotta">+ Ajouter un produit</button>
                    </div>
                </div>
            </div>


            {{-- Accoredion Commandes --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        COMMANDES
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Numéro</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Id Client</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commandes as $commande)
                                    <tr>
                                        <th scope="row">{{ $commande->id }}</th>
                                        <td>{{ $commande->numero }}</td>
                                        <td>{{ $commande->price }}€</td>
                                        <td>{{ $commande->user_id }}</td>
                                        <td class="d-flex">
                                            <a href=""><img src="{{ asset('images/logos/edit.png') }}" alt="delete"></a>
                                            <a href=""><img src="{{ asset('images/logos/delete.png') }}" alt="delete" class="ms-1"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>


            {{-- Accoredion Users --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        UTILISATEUR
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Mail</th>
                                    <th scope="col">Rôle</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->firstname }}&nbsp;{{ $user->lastname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->role }}</td>
                                        <td class="d-flex">
                                            {{-- <a href=""><img src="{{ asset('images/logos/edit.png') }}" alt="delete"></a> --}}
                                            <a href=""><img src="{{ asset('images/logos/delete.png') }}" alt="delete" class="ms-1"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
