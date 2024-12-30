<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkflowApproval extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'modul',
        'type',
        'value',
        'nik',
        'name',
        'email',
        'position',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    // Relationship with Transaction (One to Many)
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'modul_id');
    }

    // Relationship with NeedApproval (One to Many)
    public function needApprovals()
    {
        return $this->hasMany(NeedApproval::class, 'modul_id');
    }
}
