<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImportLog extends Model
{
    protected $fillable = [
        'filename',
        'total_rows',
        'imported_rows',
        'skipped_rows',
        'status',
        'errors',
        'started_at',
        'completed_at',
    ];

    protected function casts(): array
    {
        return [
            'errors' => 'array',
            'started_at' => 'datetime',
            'completed_at' => 'datetime',
        ];
    }
}
