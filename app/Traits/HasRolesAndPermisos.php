<?php


namespace App\Traits;

use App\Models\Roles;
use App\Models\Permisos;

trait HasRolesAndPermisos
{

	public function roles()
	{
		return $this->belongsToMany(Roles::class,'users_roles');

	}

	public function permisos()
	{
		return $this->belongsToMany(Permisos::class,'users_permisos');

	}

}