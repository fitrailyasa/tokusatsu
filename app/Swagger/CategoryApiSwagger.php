<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Category",
 *     type="object",
 *     required={"id", "name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Laravel"),
 *     @OA\Property(property="desc", nullable=true, type="string", example="Deskripsi Category Laravel"),
 *     @OA\Property(property="era_id", type="integer", example=1),
 *     @OA\Property(property="franchise_id", type="integer", example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-06-01T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-06-01T12:00:00Z")
 * )
 *
 * @OA\Schema(
 *     schema="CategoryRequest",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="Laravel"),
 *     @OA\Property(property="desc", type="string", nullable=true, example="Deskripsi Category Laravel"),
 *     @OA\Property(property="era_id", type="integer", example=1),
 *     @OA\Property(property="franchise_id", type="integer", example=1)
 * )
 */
class CategoryApiSwagger
{
    /**
     * @OA\Get(
     *     path="/api/categories",
     *     summary="Daftar Category dengan pagination dan search",
     *     tags={"Category"},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Kata kunci pencarian nama category",
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
     *         description="Category retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Category")
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
     *     @OA\Response(response=404, description="Category tidak ditemukan")
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/categories",
     *     summary="Tambah Category baru",
     *     tags={"Category"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CategoryRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category berhasil dibuat",
     *         @OA\JsonContent(
     *             @OA\Property(property="alert", type="string", example="Berhasil Tambah Category!")
     *         )
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/categories/{id}",
     *     summary="Ambil detail Category berdasarkan ID",
     *     tags={"Category"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Detail Category", @OA\JsonContent(ref="#/components/schemas/Category")),
     *     @OA\Response(response=404, description="Category tidak ditemukan")
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/categories/{id}",
     *     summary="Update Category berdasarkan ID",
     *     tags={"Category"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CategoryRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category berhasil diupdate",
     *         @OA\JsonContent(@OA\Property(property="alert", type="string", example="Berhasil Edit Category!"))
     *     ),
     *     @OA\Response(response=404, description="Category tidak ditemukan")
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/categories/{id}",
     *     summary="Hapus Category berdasarkan ID",
     *     tags={"Category"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Category berhasil dihapus",
     *         @OA\JsonContent(@OA\Property(property="alert", type="string", example="Berhasil Hapus Category!"))
     *     ),
     *     @OA\Response(response=404, description="Category tidak ditemukan")
     * )
     */
    public function destroy() {}
}
