<?php

namespace App\Models;

use App\Models\Base\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'nik'; // Set primary key to 'nik'

    protected $fillable = [
        'nik',
        'name',
        'email',
        'position',
        'approver1_name',
        'approver1_email',
        'approver1_position',
        'approver2_name',
        'approver2_email',
        'approver2_position',
        'user_id',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    // Relationship with NeedApproval (One to Many)
    public function needApprovals()
    {
        return $this->hasMany(NeedApproval::class, 'nik', 'nik');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
