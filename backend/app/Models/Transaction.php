<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'modul_id',
        'amount',
        'createdBy',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    // Relationship with WorkflowApproval (One to Many)
    public function workflowApproval()
    {
        return $this->belongsTo(WorkflowApproval::class, 'modul_id');
    }

    public function byCreated()
    {
        return $this->belongsTo(Employee::class, 'createdBy');
    }

    // Relationship with NeedApproval (One to Many)
    public function needApprovals()
    {
        return $this->hasMany(NeedApproval::class, 'transaction_id');
    }
}
