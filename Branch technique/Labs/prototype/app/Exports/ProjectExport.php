<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProjectExport implements FromCollection
{
  
    public function collection()
    {
        return Project::all();
    }
}
