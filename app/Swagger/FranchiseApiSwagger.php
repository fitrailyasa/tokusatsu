<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Franchise",
 *     type="object",
 *     required={"id", "name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Test"),
 *     @OA\Property(property="desc", nullable=true, type="string", example="Description Franchise"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-06-01T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-06-01T12:00:00Z")
 * )
 *
 * @OA\Schema(
 *     schema="FranchiseRequest",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="Test"),
 *     @OA\Property(property="desc", type="string", nullable=true, example="Description Franchise Test")
 * )
 */
class FranchiseApiSwagger
{
    /**
     * @OA\Get(
     *     path="/api/franchises",
     *     summary="Franchise list with pagination and search",
     *     tags={"Franchise"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Franchise name search keywords",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         description="Amount of data per page",
     *         required=false,
     *         @OA\Schema(type="integer", default=10)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Franchise retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Franchise")
     *             ),
     *             @OA\Property(
     *                 property="pagination",
     *                 type="object",
     *                 @OA\Property(property="current_page", type="integer"),
     *                 @OA\Property(property="total", type="integer"),
     *                 @OA\Property(property="per_page", type="integer"),
     *                 @OA\Property(property="last_page", type="integer"),
     *                 @OA\Property(property="next_page_url", type="string", nullable=true),
     *                 @OA\Property(property="prev_page_url", type="string", nullable=true),
     *             )
     *         )
     *     ),
     *     @OA\Response(response=404, description="Franchise not found")
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/franchises",
     *     summary="Create a new Franchise",
     *     tags={"Franchise"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/FranchiseRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Franchise created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="alert", type="string", example="Successfully Create Franchise!")
     *         )
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/franchises/{id}",
     *     summary="Retrieve Franchise details by ID",
     *     tags={"Franchise"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Detail Franchise", @OA\JsonContent(ref="#/components/schemas/Franchise")),
     *     @OA\Response(response=404, description="Franchise not found")
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/franchises/{id}",
     *     summary="Update Franchise details by ID",
     *     tags={"Franchise"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/FranchiseRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Franchise updated successfully",
     *         @OA\JsonContent(@OA\Property(property="alert", type="string", example="Successfully Edit Franchise!"))
     *     ),
     *     @OA\Response(response=404, description="Franchise not found")
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/franchises/{id}",
     *     summary="Delete Franchise details by ID",
     *     tags={"Franchise"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Franchise deleted successfully",
     *         @OA\JsonContent(@OA\Property(property="alert", type="string", example="Successfully Delete Franchise!"))
     *     ),
     *     @OA\Response(response=404, description="Franchise not found")
     * )
     */
    public function destroy() {}
}
