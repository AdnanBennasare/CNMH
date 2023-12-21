<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description',  
        'project_id'
      
    ];

    public static $rules = [
        'title' => 'required|unique:tasks,title',
        'description' => 'nullable|string|max:1000',
        'project_id' => 'required|integer',
    ];
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'Project_Id');
    }
    
}
