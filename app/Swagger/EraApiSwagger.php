<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Era",
 *     type="object",
 *     required={"id", "name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Laravel"),
 *     @OA\Property(property="desc", nullable=true, type="string", example="Deskripsi Era Laravel"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-06-01T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-06-01T12:00:00Z")
 * )
 *
 * @OA\Schema(
 *     schema="EraRequest",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="Laravel"),
 *     @OA\Property(property="desc", type="string", nullable=true, example="Deskripsi Era Laravel")
 * )
 */
class EraApiSwagger
{
    /**
     * @OA\Get(
     *     path="/api/eras",
     *     summary="Era list with pagination and search",
     *     tags={"Era"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Era name search keywords",
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
     *         description="Era retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Era")
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
     *     @OA\Response(response=404, description="Era not found")
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/eras",
     *     summary="Create a new Era",
     *     tags={"Era"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/EraRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Era created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="alert", type="string", example="Successfully Create Era!")
     *         )
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/eras/{id}",
     *     summary="Retrieve Era details by ID",
     *     tags={"Era"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Detail Era", @OA\JsonContent(ref="#/components/schemas/Era"))),
     *     @OA\Response(response=404, description="Era not found")
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/eras/{id}",
     *     summary="Update Era details by ID",
     *     tags={"Era"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/EraRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Era updated successfully",
     *         @OA\JsonContent(@OA\Property(property="alert", type="string", example="Successfully Edit Era!"))
     *     ),
     *     @OA\Response(response=404, description="Era not found")
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/eras/{id}",
     *     summary="Delete Era details by ID",
     *     tags={"Era"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Era deleted successfully",
     *         @OA\JsonContent(@OA\Property(property="alert", type="string", example="Successfully Delete Era!"))
     *     ),
     *     @OA\Response(response=404, description="Era not found")
     * )
     */
    public function destroy() {}
}
