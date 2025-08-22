@extends('layouts.admin')

@section('title', 'Admin | Editar Permissão de Partilha ')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Editar Permissão de Partilha</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                    <li class="breadcrumb-item active">Editar Permissão de Partilha</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Geral</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="inputName">Código<span class="text-danger">*</span></label>
                        <input type="text" role="code" data-extra="checkPermissionCode"
                            value="<?= $sharedPermission->code ?>" class="validate form-control">
                        <span class="error invalid-feedback" id="errorFeedbackCode">Preencha este campo</span>
                        <span class="success valid-feedback">Campo preenchido</span>
                    </div>
                </div>

            </div>

            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills"> <?php foreach ($languages as $key => $language) { ?>
                            <li class="nav-item"><a class="nav-link <?= $key == 0 ? "active" : '' ?>"
                                    href="#<?= $language->name ?>" data-toggle="tab"><?= $language->{$userLang}(); ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <?php foreach ($languages as $key => $language) { ?>
                            <div class="tab-pane <?= $key == 0 ? "active" : '' ?>" id="<?= $language->name ?>">

                                <div class="form-group">
                                    <label for="inputDisplayName">Nome em <?= $language->{$userLang}() ?> <span
                                            class="text-danger">*</span></label>
                                    <input type="text" value="<?= $sharedInfo->{$language->name}->name ?>"
                                        role="<?= $language->name ?>" data-role="name" class="validate form-control">
                                    <span class="error invalid-feedback">Preencha este
                                        campo</span>
                                    <span class="success valid-feedback">Campo preenchido</span>
                                </div>

                                <div class="form-group">
                                    <label for="inputDisplayName">Categoria em <?= $language->{$userLang}() ?> <span
                                            class="text-danger">*</span></label>
                                    <input type="text" value="<?= $sharedInfo->{$language->name}->category ?>"
                                        role="<?= $language->name ?>" data-role="category" class="validate form-control">
                                    <span class="error invalid-feedback">Preencha este
                                        campo</span>
                                    <span class="success valid-feedback">Campo preenchido</span>
                                </div>

                                <div class="form-group">
                                    <label for="inputDisplayName">Descrição em <?= $language->{$userLang}() ?></label>
                                    <textarea type="text" role="<?= $language->name ?>" data-role="description" rows="4"
                                        class="form-control"><?= $sharedInfo->{$language->name}->description ?></textarea>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" row">
        <div class="col-12">
            <a href="../../shared-permissions" class="btn btn-secondary">Cancelar</a>
            <button type="submit" id="btnSubmit" class="btn btn-success float-right">Guardar Alterações</button>
        </div>
    </div>
</section>

<script src="../../../assets/admin/js/super-admin/shared-permissions/edit.js"></script>
<script src="../../../assets/js/allEdit.js"></script>

@endsection