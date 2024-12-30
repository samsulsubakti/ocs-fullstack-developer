<?php

namespace App\Swagger\V1;

/**
 *
 * @OA\Get(
 *     path="/core/employees",
 *     tags={"Employees"},
 *     summary="Get all employees",
 *     description="Retrieve a list of all employees.",
 *     @OA\Response(
 *         response=200,
 *         description="List of employees",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(response=500, description="Server error")
 * )
 * @OA\Get(
 *     path="/core/employees/{id}",
 *     tags={"Employees"},
 *     summary="Get employee by ID",
 *     description="Retrieve a specific employee by ID.",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Employee details",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(response=404, description="Employee not found"),
 *     @OA\Response(response=500, description="Server error")
 * )
 * 
 * 
 * @OA\Get(
 *     path="/core/transactions",
 *     tags={"Transactions"},
 *     summary="Get all transactions",
 *     description="Retrieve a list of all transactions.",
 *     @OA\Response(
 *         response=200,
 *         description="List of transactions",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(response=500, description="Server error")
 * )
 * @OA\Get(
 *     path="/core/transactions/{id}",
 *     tags={"Transactions"},
 *     summary="Get employee by ID",
 *     description="Retrieve a specific transactions by ID.",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Employee details",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(response=404, description="Employee not found"),
 *     @OA\Response(response=500, description="Server error")
 * )
 * 
 * @OA\Get(
 *     path="/core/need-approvals",
 *     tags={"Need-approvals"},
 *     summary="Get all need-approvals",
 *     description="Retrieve a list of all need-approvals.",
 *     @OA\Response(
 *         response=200,
 *         description="List of need-approvals",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(response=500, description="Server error")
 * )
 * @OA\Get(
 *     path="/core/need-approvals/{id}",
 *     tags={"Need-approvals"},
 *     summary="Get employee by ID",
 *     description="Retrieve a specific need-approvals by ID.",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Employee details",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(response=404, description="Employee not found"),
 *     @OA\Response(response=500, description="Server error")
 * )
 * 
 * @OA\Get(
 *     path="/core/workflow-approvals",
 *     tags={"Workflow-approvals"},
 *     summary="Get all workflow-approvals",
 *     description="Retrieve a list of all workflow-approvals.",
 *     @OA\Response(
 *         response=200,
 *         description="List of workflow-approvals",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(response=500, description="Server error")
 * )
 * @OA\Get(
 *     path="/core/workflow-approvals/{id}",
 *     tags={"Workflow-approvals"},
 *     summary="Get employee by ID",
 *     description="Retrieve a specific workflow-approvals by ID.",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Employee details",
 *         @OA\JsonContent()
 *     ),
 *     @OA\Response(response=404, description="Employee not found"),
 *     @OA\Response(response=500, description="Server error")
 * )
 * 
 */

class DocCoreControllerSwagger {}
