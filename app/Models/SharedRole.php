<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedRole extends Model
{
    /** @use HasFactory<\Database\Factories\SharedRoleFactory> */
    use HasFactory;

    protected $table = "shared_roles";
    protected $fillable = ["name", "code"];
    protected $guarded = ["id"];

    public function permissions()
    {
        return $this->belongsToMany(SharedPermission::class, "shared_permission_roles", "shared_role_id", "shared_permission_id");
    }

    public function hasPermission(string $permission)
    {
        return $this->permissions()->where("code", $permission)->exists();
    }
}
