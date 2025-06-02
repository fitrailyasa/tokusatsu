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
     *     summary="Daftar Era dengan pagination dan search",
     *     tags={"Era"},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Kata kunci pencarian nama era",
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
     *     @OA\Response(response=404, description="Era tidak ditemukan")
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/eras",
     *     summary="Tambah Era baru",
     *     tags={"Era"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/EraRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Era berhasil dibuat",
     *         @OA\JsonContent(
     *             @OA\Property(property="alert", type="string", example="Berhasil Tambah Era!")
     *         )
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/eras/{id}",
     *     summary="Ambil detail Era berdasarkan ID",
     *     tags={"Era"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Detail Era", @OA\JsonContent(ref="#/components/schemas/Era"))),
     *     @OA\Response(response=404, description="Era tidak ditemukan")
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/eras/{id}",
     *     summary="Update Era berdasarkan ID",
     *     tags={"Era"},
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
     *         description="Era berhasil diupdate",
     *         @OA\JsonContent(@OA\Property(property="alert", type="string", example="Berhasil Edit Era!"))
     *     ),
     *     @OA\Response(response=404, description="Era tidak ditemukan")
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/eras/{id}",
     *     summary="Hapus Era berdasarkan ID",
     *     tags={"Era"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Era berhasil dihapus",
     *         @OA\JsonContent(@OA\Property(property="alert", type="string", example="Berhasil Hapus Era!"))
     *     ),
     *     @OA\Response(response=404, description="Era tidak ditemukan")
     * )
     */
    public function destroy() {}
}
