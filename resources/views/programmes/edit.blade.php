@extends('sawlou.salsa')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Modifier Programme</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('candidat.index')}}">Liste</a></li>
            <li class="breadcrumb-item"><a href="{{route('candidat.create')}}">Ajouter</a></li>
            <li class="breadcrumb-item active">Candidats</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Un peuple, Un but, Une foi <img src="../../dist/img/favicon-s.png" class="img-circle elevation-2" alt="User Image"></h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
     <form action="{{ route('programme.update', $programme->id) }}" method="POST" class="form-group" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <select class="form-select" aria-label="Default select example" name="candidat_id">
                  <option selected>Choisir un Candidat</option>
                  @foreach($candidats as $cand)
                  <option value="{{$cand->id}}">{{$cand->Nom}} {{$cand->Prenom}}</option>
                  @endforeach
                </select>
                <select class="form-select" aria-label="Default select example" name="secteur_id">
                    <option selected>Choisir un Secteur</option>
                    @foreach($secteurs as $sect)
                    <option value="{{$sect->id}}">{{$sect->libelle}} </option>
                    @endforeach
                  </select>
              </div>
                <div class="form-group">
                    <label for="title">titre :</label>
                    <input type="text" class="form-control" id="titre" name="titre" value="{{$programme->titre}}">
                </div>
                <div class="form-group">
                    <label for="content">Contenu :</label>
                    <textarea class="form-control" id="contenu" name="contenu" rows="4" >{{$programme->contenu}}</textarea>
                </div>
                <div class="form-group">
                    <label for="document">Document :</label>
                    <input type="file" class="form-control" id="document" name="document">

                </div>
                <button type="submit" class="btn btn-primary">Publier</button>
                <a href="{{route('programme.index')}}" class="btn btn-primary">Retourner à la liste des candidats</a>
        </div>
    </div>
</div>
</form>
</div>
@endsection
