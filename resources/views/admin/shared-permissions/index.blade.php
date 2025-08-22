@extends('layouts.admin')

@section('title', 'Admin | Papeis de Partilhas ')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Papeis de Partilhas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Papeis de Partilhas</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <button id="btnAdd" class="btn btn-default">Adicionar Papel de Partilha</button>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>Codígo</th>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Descrição</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="../assets/admin/js/super-admin/shared-permissions/index.js"></script>
<script src="../assets/js/allIndex.js"></script>

@endsection