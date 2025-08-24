<?php

namespace App\Http\Controllers;

use App\Enums\Language;
use App\Http\Requests\SharedPermissionRequest;
use App\Models\SharedPermission;
use App\Repositories\SharedPermissionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SharedPermissionController extends AppController
{
    private SharedPermissionRepository $sharedPermissionRepository;

    public function __construct(SharedPermissionRepository $sharedPermissionRepository)
    {
        $this->sharedPermissionRepository = $sharedPermissionRepository;
    }

    public function index()
    {
        // $this->allowedAction('viewAdminSharedPermissions');

        Session::flash('page', 'shared permissions');

        return view("admin.shared-permissions.index");
    }

    public function create()
    {
        // $this->allowedAction('addSharedPermissions');

        Session::flash('page', 'shared permissions');

        return view("admin.shared-permissions.form");
    }

    public function store(SharedPermissionRequest $request)
    {
        // $this->allowedAction('addSharedPermissions');

        $this->sharedPermissionRepository->store($request);

        return redirect()->route('admin.shared-permissions.index');
    }

    public function edit(string $id)
    {
        // $this->allowedAction('editSharedPermissions');

        Session::flash('page', 'shared permissions');

        $sharedPermission = $this->sharedPermissionRepository->show($id);

        $languages = Language::cases();

        return view("admin.shared-permissions.form", compact('languages', 'sharedPermission'));
    }

    public function update(SharedPermissionRequest $request, string $id)
    {
        // $this->allowedAction('editSharedPermissions');

        $this->sharedPermissionRepository->update($request, $id);

        return redirect()->route('admin.shared-permissions.index');
    }
}
