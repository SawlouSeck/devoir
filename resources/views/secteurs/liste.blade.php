@extends('sawlou.salsa')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liste des Secteurs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Liste</li>
                        <li class="breadcrumb-item"><a href="{{route('secteur.create')}}">Ajouter</a></li>
                        <li class="breadcrumb-item active">Secteurs</li>
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
                            <!-- content -->
                            <div class="container mt-3">
                                <div class="card">
                                    <div class="card-header">Liste des Secteurs</div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <th>#</th>
                                                <th>Libelle</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach ($secteur as $sect)
                                            <tr>
                                                <td>{{$sect->id}}</td>
                                                <td>{{$sect->libelle}}</td>

                                             <td> <a href="{{route('secteur.edit', $sect->id)}}" class="btn btn-warning ms-3">Editer</a>
                                                    <form action="{{route('secteur.destroy',$sect->id)}}" method="post" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Voulez-vous vraiment supprimer le programme?')" href="{{route('secteur.destroy',$sect->id)}}" type="submit" class="btn btn-danger mt-3">Supprimer</button>
                                                    </form>
                                                  {{-- <a onclick="return confirm('Voulez-vous vraiment supprimer le candidat?')" href="{{route('programme.destroy',$prod->id)}}" class="btn btn-danger">Supprimer</a> --}}

                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        Election Présidentielle
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
