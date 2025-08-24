<?php

namespace App\Http\Controllers;

use App\Http\Requests\SharedRolePermissionsRequest;
use App\Repositories\SharedPermissionRepository;
use App\Repositories\SharedRoleRepository;
use Illuminate\Support\Facades\Session;

class SharedPermissionRoleController extends AppController
{
    private SharedRoleRepository $sharedRoleRepository;
    private SharedPermissionRepository $sharedPermissionRepository;

    public function __construct(SharedRoleRepository $sharedRoleRepository, SharedPermissionRepository $sharedPermissionRepository)
    {
        $this->sharedRoleRepository = $sharedRoleRepository;
        $this->sharedPermissionRepository = $sharedPermissionRepository;
    }

    public function manage(string $id)
    {
        // $this->allowedAction('managePermissionsSharedRoles');

        Session::flash('page', 'shared roles');

        $sharedRole = $this->sharedRoleRepository->show($id);
        $sharedPermissions = $this->sharedPermissionRepository->all();

        $sharedPermissionsGrouped = collect($sharedPermissions)->groupBy(function ($item) {
            return $item->category;
        });

        $SharedRolePermissionsIds = $sharedRole->permissions->pluck('id')->toArray();

        return view("admin.shared-roles.manage", compact('sharedPermissionsGrouped', 'SharedRolePermissionsIds', 'sharedRole'));
    }

    public function update(SharedRolePermissionsRequest $request, string $id)
    {
        // $this->allowedAction('managePermissionsSharedRoles');

        $this->sharedRoleRepository->updateRolePermissions($request, $id);

        return redirect()->route('admin.shared-roles.index');
    }
}
