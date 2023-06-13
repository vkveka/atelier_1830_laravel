@extends ('layouts.app')
@section('title')
    Mon compte
@endsection
@section('content')
    <main class="container">
        <h1>Mon compte</h1>
        <h3 class="pb-3">modifier mes informations </h3>
        <div class="row">
            <form class="col-4 mx-auto" action="{{ route('users.update', $user) }}" method="POST">
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
                {{-- <div class="form-group">
                    <label for="image">Nouvelle image</label>
                    <input required type="text" class="form-control" placeholder="modifier" name="image"
                        value="{{ Suser->image }}" id="image">
                </div> --}}
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </main>
@endsection
