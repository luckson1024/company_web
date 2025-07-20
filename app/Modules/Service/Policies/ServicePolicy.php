<?php

namespace App\Modules\Service\Policies;

use App\Modules\Service\Models\Service;
use App\Models\User;

class ServicePolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view services');
    }
    public function view(User $user, Service $service)
    {
        return $user->hasPermissionTo('view services');
    }
    public function create(User $user)
    {
        return $user->hasPermissionTo('create services');
    }
    public function update(User $user, Service $service)
    {
        return $user->hasPermissionTo('update services');
    }
    public function delete(User $user, Service $service)
    {
        return $user->hasPermissionTo('delete services');
    }
}
