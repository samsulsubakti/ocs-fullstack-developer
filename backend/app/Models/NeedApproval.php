<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NeedApproval extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'modul_id',
        'transaction_id',
        'nik',
        'name',
        'email',
        'position',
        'level',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    // Relationship with Transaction (Many to One)
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    // Relationship with WorkflowApproval (Many to One)
    public function workflowApproval()
    {
        return $this->belongsTo(WorkflowApproval::class, 'modul_id');
    }
}
