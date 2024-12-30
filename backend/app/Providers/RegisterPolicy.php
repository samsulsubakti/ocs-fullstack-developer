<?php

namespace App\Providers;

class RegisterPolicy
{
    const POLICIES = [
        //Base
        \App\Models\Base\User::class => \App\Policies\Base\UserPolicy::class,
        \App\Models\Employee::class => \App\Policies\Base\EmployeePolicy::class,
        \App\Models\NeedApproval::class => \App\Policies\Base\NeedApprovalPolicy::class,
        \App\Models\Transaction::class => \App\Policies\Base\TransactionPolicy::class,
        \App\Models\WorkflowApproval::class => \App\Policies\Base\WorkflowApprovalPolicy::class,
        
    ];
}
