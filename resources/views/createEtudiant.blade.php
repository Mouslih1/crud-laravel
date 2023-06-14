@extends('Layouts.master')
@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-2">Ajout d'un étudiant</h3>
    <div class="mt-4">
      @if(session()->has("success"))
        <div class="alert alert-success">
          <h6>{{session()->get("success")}}</h6>
        </div>
      @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <ul>
                <li>{{ $error }}</li>
            </ul>
            @endforeach
        </div>
        @endif
        <form style="width:65%;" method="post" action="{{ route('etudiant.ajouter') }}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nom d'étudiant</label>
              <input type="text" class="form-control" name="nom">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Prénom</label>
              <input type="text" class="form-control" name="prenom">
            </div>
            <div class="mb-3">
              <label class="form-check-label" for="exampleCheck1">Classe</label>
              <select class="form-control" name="classes_id">
                    <option value=""></option>
                @foreach($classes as $classe)
                    <option value="{{ $classe->id}}">{{ $classe->libelle}}</option>
                @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('etudiant')}}" class="btn btn-danger">Annuler</a>
          </form>
    </div>

</div>
@endsection