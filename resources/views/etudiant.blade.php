@extends('Layouts.master')
@section('content')

<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-2">Listes des étudiants inscrits</h3>
    <div class="mt-4">
        <div class="d-flex justify-content-between mb-2">
          {{ $etudiants->links() }}
            <div><a href="{{ route('etudiant.create')}}" class="btn btn-primary">Ajouter un nouvel étudiant</a></div>
        </div>
        @if(session()->has("successDelete"))
        <div class="alert alert-success">
          <h6>{{session()->get("successDelete")}}</h6>
        </div>
      @endif
        <table class="table table-borderd table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Classe</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($etudiants as $etudiant)
              <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->classes->libelle }}</td>
                <td>
                    <a href="{{ route('etudiant.edit',['etudiant' => $etudiant->id ])}}" class="btn btn-info">Editer</a>
                    <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer cet étudiant ?')){document.getElementById('form-{{$etudiant->id}}').submit()}">Supprimer</a>
                    <form id="form-{{$etudiant->id}}" method="post" action="{{ route('etudiant.supprimer', ['etudiant'=>$etudiant->id])}}" >
                      @csrf
                      <input type="hidden" name="_methode" value="delete">
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
    
@endsection