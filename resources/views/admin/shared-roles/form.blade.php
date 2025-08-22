@extends('layouts.admin')

@section('title', 'Admin | Papel de Partilha ')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/admin/">Home</a></li>
<li class="breadcrumb-item active">Editar Papel de Partilha</li>
@endsection

@section('content')
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
                        <input type="text" role="code" value="<?= $sharedRole->code; ?>"
                            data-extra="checkPermissionCode" class="validate form-control">
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
                                    <input type="text" value="<?= $sharedInfo->{$language->name}->name;
                                                                ?>" role="<?= $language->name ?>" data-role="name"
                                        class="validate form-control">
                                    <span class="error invalid-feedback">Preencha este
                                        campo</span>
                                    <span class="success valid-feedback">Campo preenchido</span>
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
            <a href="../../shared-roles" class="btn btn-secondary">Cancelar</a>
            <button type="submit" id="btnSubmit" class="btn btn-success float-right">Guardar Alterações</button>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="/assets/js/allEdit.js"></script>
@endsection