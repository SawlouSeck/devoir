@extends('sawlou.seck')
@section('content')
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail du programme</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Liste</li>

                        <li class="breadcrumb-item active">Candidat</li>
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

                                    <div class="card-body">
                                        <table class="table">
                                            <tr><style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }
  </style>
   </head>
  <body>
                        <!-- Three columns of text below the carousel -->
                        <div class="card-header">Liste des Programmes</div>
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Titre</th>
                                <th>Contenu</th>
                                <th>Document</th>
                                <th>choiX</th>
                                <th>Nombre de like</th>
                                <th>candidat</th>
                                <th>secteur</th>

                            </tr>
                        </table>
                        <table class="table">

                        @foreach ($programmes as $programme)
                        <tr>
                            <td>{{ $programme->id }}</td>
                            <td>{{ $programme->titre }}</td>
                            <td>{{ $programme->contenu }}</td>
                            <td>{{ $programme->document }}</td>

                                <td class="text-center">


                                            <form action="{{ route('likecandidat', ['candidat' => $programme->id, 'type' => 'like']) }}" method="post" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">
                                                    <i class="fas fa-thumbs-up"></i> Like
                                                </button>
                                            </form>

                                            <form action="{{ route('likecandidat', ['candidat' => $programme->id, 'type' => 'dislike']) }}" method="post" class="d-inline ml-2">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-thumbs-down"></i> Dislike
                                                </button>
                                            </form>

                                </td>



                            <td>{{ $programme->like_count }}</td>
                            <td>
                                @if ($programme->candidat)
                                    {{ $programme->candidat->Nom }} {{ $programme->candidat->Prenom }}
                                @else
                                    Aucun candidat associé
                                @endif
                            </td>
                            <td>
                                @if ($programme->secteur)
                                    {{ $programme->secteur->libelle }}
                                @endif
                            </td>


                        </tr>
                        @endforeach
                        </table>
                        @endsection
