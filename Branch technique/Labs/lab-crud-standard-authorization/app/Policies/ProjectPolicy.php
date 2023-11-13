<?php

namespace App\Policies;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{

  use HandlesAuthorization;
  public function viewProjects(User $user)
  {
      return $user->role === 'admin';
  }
        
  public function create(User $user)
  {
    return $user->role === 'admin';
      
  }

  public function update(User $user)
  {
    return $user->role === 'admin';
      
  }

  public function destroy(User $user)
  {
    return $user->role === 'admin';
      
  }
 
}
