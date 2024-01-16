@extends('sawlou.salsa')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liste des Programmes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Liste</li>
                        <li class="breadcrumb-item"><a href="{{route('programme.create')}}">Ajouter</a></li>
                        <li class="breadcrumb-item active">Programmes</li>
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
                                @if(session('success'))
                                <div class="alert alert-success mt-3">
                                    {{session('success')}}
                                </div>
                                @endif
                                <div class="card">
                                    <div class="card-header">Liste des Programmes</div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <th>#</th>
                                                <th>Titre</th>
                                                <th>Contenu</th>
                                                <th>Document</th>
                                                <th>choiX</th>
                                                <th>candidat</th>
                                                <th>secteur</th>
                                                <th>Action</th>
                                            </tr>

                                         @foreach ($programme as $prod)
                                            <tr>
                                                        <td>{{$prod->id}}</td>
                                                        <td>{{$prod->titre}}</td>
                                                        <td>{{$prod->contenu}}</td>
                                                        <td>{{$prod->document}}</td>
                                                        <td>
                                                            <a href="{{ route('programme.vote', $prod->id) }}" class="btn btn-info">Vote</a>
                                                        </td>
                                                        <td>
                                                            @if ($prod->candidat)
                                                                {{ $prod->candidat->Nom }} {{ $prod->candidat->Prenom }}
                                                            @else
                                                                Aucun candidat associé
                                                            @endif
                                                        </td>


                                                        <td> @if ($prod->secteur)
                                                            {{$prod->secteur->libelle}}

                                                        @endif
                                                    </td>
                                                    <td>

                                                        <a href="{{ route('programme.create') }}" class="btn btn-warning ms-3"
                                                        @can('create', App\Models\Property::class)
                                                            @if (auth()->user()->is_admin)
                                                                style="display: inline-block;"
                                                            @else
                                                                style="display: none;"
                                                            @endif
                                                        @endcan
                                                    >Ajouter</a>
                                                    <a href="{{ route('programme.edit', $prod->id) }}" class="btn btn-warning ms-3"
                                                                @can('edit', App\Models\Property::class)
                                                                    @if (auth()->user()->is_admin)
                                                                        style="display: inline-block;"
                                                                    @else
                                                                        style="display: none;"
                                                                    @endif
                                                                @endcan
                                                            >editer</a>

                                                            <form action="{{ route('programme.destroy', $prod->id) }}" method="post"
                                                                @can('delete', App\Models\Property::class)
                                                                @if (auth()->user()->is_admin)
                                                                    style="display: inline-block;"
                                                                @else
                                                                    style="display: none;"
                                                                @endif
                                                            @endcan>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button onclick="return confirm('Voulez-vous vraiment supprimer le programme?')" type="submit" class="btn btn-danger mt-3">Supprimer</button>
                                                            </form>
                                                        </td>
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
