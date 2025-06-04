<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Franchise",
 *     type="object",
 *     required={"id", "name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Laravel"),
 *     @OA\Property(property="desc", nullable=true, type="string", example="Deskripsi Franchise Laravel"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-06-01T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-06-01T12:00:00Z")
 * )
 *
 * @OA\Schema(
 *     schema="FranchiseRequest",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="Laravel"),
 *     @OA\Property(property="desc", type="string", nullable=true, example="Deskripsi Franchise Laravel")
 * )
 */
class FranchiseApiSwagger
{
    /**
     * @OA\Get(
     *     path="/api/franchises",
     *     summary="Daftar Franchise dengan pagination dan search",
     *     tags={"Franchise"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Kata kunci pencarian nama franchise",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         description="Jumlah data per halaman",
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
     *     @OA\Response(response=404, description="Franchise tidak ditemukan")
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/franchises",
     *     summary="Tambah Franchise baru",
     *     tags={"Franchise"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/FranchiseRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Franchise berhasil dibuat",
     *         @OA\JsonContent(
     *             @OA\Property(property="alert", type="string", example="Berhasil Tambah Franchise!")
     *         )
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/franchises/{id}",
     *     summary="Ambil detail Franchise berdasarkan ID",
     *     tags={"Franchise"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Detail Franchise", @OA\JsonContent(ref="#/components/schemas/Franchise")),
     *     @OA\Response(response=404, description="Franchise tidak ditemukan")
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/franchises/{id}",
     *     summary="Update Franchise berdasarkan ID",
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
     *         description="Franchise berhasil diupdate",
     *         @OA\JsonContent(@OA\Property(property="alert", type="string", example="Berhasil Edit Franchise!"))
     *     ),
     *     @OA\Response(response=404, description="Franchise tidak ditemukan")
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/franchises/{id}",
     *     summary="Hapus Franchise berdasarkan ID",
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
     *         description="Franchise berhasil dihapus",
     *         @OA\JsonContent(@OA\Property(property="alert", type="string", example="Berhasil Hapus Franchise!"))
     *     ),
     *     @OA\Response(response=404, description="Franchise tidak ditemukan")
     * )
     */
    public function destroy() {}
}
