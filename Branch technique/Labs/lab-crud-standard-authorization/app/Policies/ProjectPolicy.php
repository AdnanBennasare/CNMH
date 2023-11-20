<?php

namespace App\Policies;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{

  use HandlesAuthorization;
  public function viewProjects(User $user)
  {
      return $user->role === 'project_leader';
  }
        
  public function create(User $user)
  {
    return $user->role === 'project_leader';
      
  }

  public function update(User $user)
  {
    return $user->role === 'project_leader';
      
  }

  public function destroy(User $user)
  {
    return $user->role === 'project_leader';
      
  }
 
}
