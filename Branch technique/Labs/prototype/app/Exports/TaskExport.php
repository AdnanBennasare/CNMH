<?php

namespace App\Exports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;

class TaskExport implements FromCollection
{

    public function collection()
    {
        return Task::all();
    }
}
