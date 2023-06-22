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

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gammes as $gamme)
                                    <tr>
                                        <th scope="row">{{ $gamme->id }}</th>
                                        <td>{{ $gamme->name }}</td>
                                        <td class="d-flex modif_backoffice">
                                            <form action="{{ route('gammes.update', $gamme) }}" method="post"
                                                id="form_edit_gamme_{{ $gamme->id }}">
                                                @csrf
                                                @method('PUT')

                                                {{-- MODAL DE SUPPRESSION DE COMPTE --}}
                                                <!-- Button modal -->
                                                <a data-bs-toggle="modal"
                                                    data-bs-target="#editGammeModal_{{ $gamme->id }}">
                                                    <img src="{{ asset('images/logos/edit.png') }}" alt="edit">
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editGammeModal_{{ $gamme->id }}"
                                                    tabindex="-1" aria-labelledby="editGammeModalLabel_{{ $gamme->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5"
                                                                    id="editGammeModalLabel_{{ $gamme->id }}">
                                                                    Modification de la gamme</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group mb-3">
                                                                    <label for="name">Modifier le
                                                                        nom de la
                                                                        gamme</label>
                                                                    <input required type="text" class="form-control"
                                                                        placeholder="modifier" name="name"
                                                                        value="{{ $gamme->name }}" id="name">
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="image">Modifier
                                                                        l'image de fond</label>
                                                                    <input required type="text" class="form-control"
                                                                        placeholder="modifier" name="image"
                                                                        value="{{ $gamme->image }}" id="image">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Annuler</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Enregistrer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </form>
                                            <form id="form_delete_gamme_{{ $gamme->id }}"
                                                action="{{ route('gammes.destroy', $gamme) }}" method="post">
                                                @csrf
                                                @method('delete')


                                                {{-- MODAL DE SUPPRESSION DE COMPTE --}}
                                                <!-- Button modal -->
                                                <a data-bs-toggle="modal" data-bs-target="#deleteGammeModal">
                                                    <img src="{{ asset('images/logos/delete.png') }}" alt="delete">
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteGammeModal" tabindex="-1"
                                                    aria-labelledby="deleteGammeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="deleteGammeModalLabel">
                                                                    Suppression de gamme</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Voulez-vous vraiment supprimer votre gamme ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Annuler</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Supprimer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                        <form action="{{ route('gammes.store', $gamme) }}" method="post"
                            id="form_store_gamme_{{ $gamme->id }}">
                            @csrf

                            {{-- MODAL DE SUPPRESSION DE COMPTE --}}
                            <!-- Button modal -->
                            <button class="btn btn-terracotta" data-bs-toggle="modal"
                                data-bs-target="#storeGammeModal_{{ $gamme->id }}">
                                + Ajouter une gamme
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="storeGammeModal_{{ $gamme->id }}" tabindex="-1"
                                aria-labelledby="storeGammeModalLabel_{{ $gamme->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="storeGammeModalLabel_{{ $gamme->id }}">
                                                Ajouter une gamme</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group mb-3">
                                                <label for="name">Nom de la
                                                    gamme</label>
                                                <input required type="text" class="form-control"
                                                    placeholder="modifier" name="name" value="" id="name">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="image">Image de fond</label>
                                                <input type="text" class="form-control" placeholder="modifier"
                                                    name="image" value="" id="image">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-danger">Enregistrer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                                        <td class="d-flex modif_backoffice">
                                            <img data-bs-toggle="modal" data-bs-target="#showFullDesc"
                                                src="{{ asset('./images/logos/plus.png') }}" alt="">


                                            <!-- Modal -->
                                            <div class="modal fade" id="showFullDesc" tabindex="-1"
                                                aria-labelledby="showFullDescLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="showFullDescLabel">
                                                                <b>{{ $product->name }}</b>
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{$product->full_desc}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{ route('products.update', $product) }}" method="post"
                                                id="form_edit_product_{{ $product->id }}">
                                                @csrf
                                                @method('PUT')

                                                {{-- MODAL DE SUPPRESSION DE COMPTE --}}
                                                <!-- Button modal -->
                                                <a data-bs-toggle="modal"
                                                    data-bs-target="#editProductModal_{{ $product->id }}">
                                                    <img src="{{ asset('images/logos/edit.png') }}" alt="edit">
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editProductModal_{{ $product->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="editProductModalLabel_{{ $product->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5"
                                                                    id="editProductModalLabel_{{ $product->id }}">
                                                                    Modification du produit</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group mb-3">
                                                                    <label for="name">Modifier le
                                                                        nom</label>
                                                                    <input required type="text" class="form-control"
                                                                        placeholder="modifier" name="name"
                                                                        value="{{ $product->name }}" id="name">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="desc">Modifier la description</label>
                                                                    <input required type="text" class="form-control"
                                                                        placeholder="modifier" name="desc"
                                                                        value="{{ $product->desc }}" id="desc">
                                                                </div>

                                                                <div class="form-group mb-3">
                                                                    <label for="full_desc">Modifier le description
                                                                        longue</label>
                                                                    <input required type="text" class="form-control"
                                                                        placeholder="modifier" name="full_desc"
                                                                        value="{{ $product->full_desc }}" id="full_desc">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="price">Modifier le prix</label>
                                                                    <input required type="number" class="form-control"
                                                                        placeholder="modifier" name="price"
                                                                        value="{{ $product->price }}" id="price">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="image">Modifier l'image</label>
                                                                    <input required type="text" class="form-control"
                                                                        placeholder="modifier" name="image"
                                                                        value="{{ $product->image }}" id="image">
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="dispo">Modifier la
                                                                        disponibilité</label>
                                                                    <select required name="dispo" class="form-select"
                                                                        aria-label="Default select example">
                                                                        <option selected disabled>
                                                                            @if ($product->dispo == 1)
                                                                                Disponible
                                                                            @else
                                                                                Indisponible
                                                                            @endif
                                                                        </option>
                                                                        <option value="1">Disponible</option>
                                                                        <option value="0">Indisponible</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label for="gamme_id">Modifier l'Id de la gamme</label>
                                                                    @php
                                                                        $selectedGammeId = $product->gamme->id;
                                                                    @endphp

                                                                    <select required name="gamme_id" class="form-select"
                                                                        aria-label="Default select example">
                                                                        @foreach ($gammes as $gamme)
                                                                            <option value="{{ $gamme->id }}"
                                                                                @if ($gamme->id === $selectedGammeId) selected @endif>
                                                                                {{ $gamme->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Annuler</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Enregistrer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </form>
                                            <form id="form_delete_product_{{ $product->id }}"
                                                action="{{ route('products.destroy', $product) }}" method="post">
                                                @csrf
                                                @method('delete')


                                                {{-- MODAL DE SUPPRESSION DE COMPTE --}}
                                                <!-- Button modal -->
                                                <a data-bs-toggle="modal"
                                                    data-bs-target="#deleteProductModal_{{ $product->id }}">
                                                    <img src="{{ asset('images/logos/delete.png') }}" alt="delete">
                                                </a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="deleteProductModal_{{ $product->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="deleteProductModalLabel_{{ $product->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5"
                                                                    id="deleteProductModalLabel_{{ $product->id }}">
                                                                    Suppression du produit</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Voulez-vous vraiment supprimer votre produit ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Annuler</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Supprimer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                        <form action="{{ route('products.store', $product) }}" method="post"
                            id="form_store_product_{{ $product->id }}">
                            @csrf

                            {{-- MODAL DE SUPPRESSION DE COMPTE --}}
                            <!-- Button modal -->
                            <button class="btn btn-terracotta" data-bs-toggle="modal"
                                data-bs-target="#storeProductModal_{{ $product->id }}">
                                + Ajouter un produit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="storeProductModal_{{ $product->id }}" tabindex="-1"
                                aria-labelledby="storeProductModalLabel_{{ $product->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="storeProductModalLabel_{{ $product->id }}">
                                                Ajouter un produit</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group mb-3">
                                                <label for="name">Nom du produit</label>
                                                <input required type="text" class="form-control"
                                                    placeholder="modifier" name="name" value="" id="name">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="desc">Description</label>
                                                <input required type="text" class="form-control"
                                                    placeholder="modifier" name="desc" value="" id="desc">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="price">Prix</label>
                                                <input required type="number" class="form-control"
                                                    placeholder="modifier" name="price" value="" id="price">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="full_desc">Description longue</label>
                                                <input required type="text" class="form-control"
                                                    placeholder="modifier" name="full_desc" value=""
                                                    id="full_desc">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="image">Image</label>
                                                <input required type="text" class="form-control"
                                                    placeholder="modifier" name="image" value="" id="image">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="dispo">Disponibilité</label>
                                                {{-- <input required type="text" class="form-control"
                                                    placeholder="modifier" name="dispo" value="" id="dispo"> --}}
                                                <select required name="dispo" class="form-select"
                                                    aria-label="Default select example">
                                                    <option selected disabled>Sélectionner la disponibilité</option>
                                                    <option value="1">Disponible</option>
                                                    <option value="0">Indisponible</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="gamme_id">Id de la gamme</label>
                                                {{-- <input required type="text" class="form-control"
                                                    placeholder="modifier" name="gamme_id" value=""
                                                    id="gamme_id"> --}}
                                                <select required name="gamme_id" class="form-select"
                                                    aria-label="Default select example">
                                                    <option selected disabled>Sélectionner la gamme</option>
                                                    @foreach ($gammes as $gamme)
                                                        <option value="{{ $gamme->id }}">{{ $gamme->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-danger">Enregistrer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                <div id="flush-collapseThree" class="accordion-collapse collapse"
                    data-bs-parent="#accordionFlushExample">
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
                                            <a href=""><img src="{{ asset('images/logos/edit.png') }}"
                                                    alt="delete"></a>
                                            <a href=""><img src="{{ asset('images/logos/delete.png') }}"
                                                    alt="delete" class="ms-1"></a>
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
                        UTILISATEURS
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
                                            <a href=""><img src="{{ asset('images/logos/delete.png') }}"
                                                    alt="delete" class="ms-1"></a>
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
