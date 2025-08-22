@extends('layouts.admin')

@section('title', 'Admin | Gerir Permissões ')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Gerir Permissões</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                    <li class="breadcrumb-item active">Gerir Permissões</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="col-12">

        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Permissões</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?php foreach ($permissionsGrouped as $category => $permissions) { ?>
                    <h4><b><?= $category ?></b></h4>
                    <?php foreach ($permissions as $index => $permission) {
                        $permissionInfo = json_decode($permission->info);
                        if ($index % 4 == 0) { ?>
                            <div class="row">
                            <?php } ?>
                            <div class="col-3">
                                <div class="form-group clearfix">
                                    <div class="icheck-success d-inline ">
                                        <input class="form-control" type="checkbox" name="permissions[]" role="permissions"
                                            value="<?= $permission->id ?>" id="<?= $permission->code ?>"
                                            <?= in_array($permission->id, $rolePermissionsIds) ? 'checked' : '' ?>>
                                        <label for="<?= $permission->code ?>"><?= $permissionInfo->{$userLang}->name ?></label>
                                    </div>
                                </div>
                            </div>
                            <?php if (($index + 1) % 4 == 0) { ?>
                            </div>
                        <?php }
                        }
                        if (($index + 1) % 4 != 0) { ?>
            </div>
    <?php
                        }
                    } ?>
        </div>
    </div>
    </div>
    <div class=" row">
        <div class="col-12">
            <a href="../../roles" class="btn btn-secondary">Cancelar</a>
            <button type="submit" id="btnSubmit" class="btn btn-success float-right">Guardar
                Alterações</button>
        </div>
    </div>
</section>

<script src="../../../assets/js/allEdit.js"></script>


@endsection