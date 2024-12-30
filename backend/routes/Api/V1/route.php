<?php

use App\Http\Controllers\Api\V1\EmployeeController;
use App\Http\Controllers\Api\V1\NeedApprovalController;
use App\Http\Controllers\Api\V1\TransactionController;
use App\Http\Controllers\Api\V1\WorkflowApprovalController;
use DolphinMicroservice\Http\Middleware\DolphinMiddleware;
use Illuminate\Support\Facades\Route;

Route::group([], __DIR__ . '/Base/route.php');

Route::prefix("core")->middleware(DolphinMiddleware::class)->group(function () {
  Route::prefix("employees")->group(function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::get('/{id}', [EmployeeController::class, 'show']);
    Route::post('/', [EmployeeController::class, 'store']);
    Route::put('/{id}', [EmployeeController::class, 'update']);
    Route::delete('/{id}', [EmployeeController::class, 'destroy']);
  });

  Route::prefix("transactions")->group(function () {
    Route::get('/', [TransactionController::class, 'index']);
    Route::get('/{id}', [TransactionController::class, 'show']);
    Route::post('/', [TransactionController::class, 'store']);
    Route::put('/{id}', [TransactionController::class, 'update']);
    Route::delete('/{id}', [TransactionController::class, 'destroy']);
  });

  Route::prefix("need-approvals")->group(function () {
    Route::get('/', [NeedApprovalController::class, 'index']);
    Route::get('/{id}', [NeedApprovalController::class, 'show']);
    Route::post('/', [NeedApprovalController::class, 'store']);
    Route::put('/{id}', [NeedApprovalController::class, 'update']);
    Route::delete('/{id}', [NeedApprovalController::class, 'destroy']);
  });

  Route::prefix("workflow-approvals")->group(function () {
    Route::get('/', [WorkflowApprovalController::class, 'index']);
    Route::get('/{id}', [WorkflowApprovalController::class, 'show']);
    Route::post('/', [WorkflowApprovalController::class, 'store']);
    Route::put('/{id}', [WorkflowApprovalController::class, 'update']);
    Route::delete('/{id}', [WorkflowApprovalController::class, 'destroy']);
  });
});