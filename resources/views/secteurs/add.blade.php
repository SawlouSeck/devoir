@extends('sawlou.salsa')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ajouter secteur</h1>
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

            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <ul>
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
                    <form action="{{route('secteur.store')}}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                          <label for="nom">libelle</label>
                          <input type="text" name="libelle" id="" class="form-control" required>
                        </div>



                        <div class="form-group">
                          <button class="btn btn-success">Enregistrer</button>
                        </div>
                        <a href="{{route('secteur.index')}}" class="btn btn-primary">Retourner à la liste des candidats</a>
                      </form>

            </div>
        </div>
    </div>
    @endsection
