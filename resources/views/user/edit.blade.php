@extends ('layouts.app')
@section('title')
    Mon compte
@endsection
@section('content')
    <main class="container" id="edit_info">
        <div class="card card_connection mx-auto col-lg-5">
            <div class="card-header text-center">Modifier mes informations</div>
            <div class="card-body">
                <form class="col-10 mx-auto" action="{{ route('users.update', $user) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="firstname">Nouveau prénom</label>
                        <input required type="text" class="form-control" placeholder="modifier" name="firstname"
                            value="{{ $user->firstname }}" id="firstname">
                    </div>

                    <div class="form-group mb-3">
                        <label for="lastname">Nouveau nom de famille</label>
                        <input required type="text" class="form-control" placeholder="modifier" name="lastname"
                            value="{{ $user->lastname }}" id="lastname">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Nouveau mail</label>
                        <input required type="mail" class="form-control" placeholder="modifier" name="email"
                            value="{{ $user->email }}" id="email">
                    </div>


                    <a class="btn-terracotta mb-3 show_modif_password"><span>Modifier le mot de passe</span></a>
                    <br><br>


                    <div class="modif_password" style="display: none">
                        <div class="form-group mb-3">
                            <label for="oldPassword">{{ __('Ancien mot de passe') }}</label>

                            <input id="oldPassword" type="oldPassword"
                                class="form-control @error('oldPassword') is-invalid @enderror" name="oldPassword">

                            @error('oldPassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">{{ __('Nouveau mot de passe') }}</label>

                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Modification du mot de passe --}}
                        <div class="form-group mb-3">
                            <label for="password-confirm">{{ __('Confirmation mot de passe') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-terracotta">Enregistrer les modifications</button>
                </form>

                <form class="col-4 mx-auto link_delete_account" action="{{ route('users.destroy', $user) }}" method="post">
                    @csrf
                    @method('delete')

                    {{-- MODAL DE SUPPRESSION DE COMPTE --}}
                    <!-- Button modal -->
                    <a class="btn-terracotta" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Supprimer le compte
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Suppression de compte</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Voulez-vous vraiment supprimer votre compte ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </main>
@endsection
