<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Tag",
 *     type="object",
 *     required={"id", "name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Laravel"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-06-01T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-06-01T12:00:00Z")
 * )
 *
 * @OA\Schema(
 *     schema="TagRequest",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="Laravel")
 * )
 */
class TagApiSwagger
{
    /**
     * @OA\Get(
     *     path="/api/tags",
     *     summary="Daftar Tag dengan pagination dan search",
     *     tags={"Tag"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Kata kunci pencarian nama tag",
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
     *         description="Tag retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Tag")
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
     *     @OA\Response(response=404, description="No tags found")
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/tags",
     *     summary="Tambah Tag baru",
     *     tags={"Tag"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/TagRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tag berhasil dibuat",
     *         @OA\JsonContent(
     *             @OA\Property(property="alert", type="string", example="Berhasil Tambah Tag!")
     *         )
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/tags/{id}",
     *     summary="Ambil detail Tag berdasarkan ID",
     *     tags={"Tag"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Detail Tag", @OA\JsonContent(ref="#/components/schemas/Tag")),
     *     @OA\Response(response=404, description="Tag tidak ditemukan")
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/tags/{id}",
     *     summary="Update Tag berdasarkan ID",
     *     tags={"Tag"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/TagRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tag berhasil diupdate",
     *         @OA\JsonContent(@OA\Property(property="alert", type="string", example="Berhasil Edit Tag!"))
     *     ),
     *     @OA\Response(response=404, description="Tag tidak ditemukan")
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/tags/{id}",
     *     summary="Hapus Tag berdasarkan ID",
     *     tags={"Tag"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Tag berhasil dihapus",
     *         @OA\JsonContent(@OA\Property(property="alert", type="string", example="Berhasil Hapus Tag!"))
     *     ),
     *     @OA\Response(response=404, description="Tag tidak ditemukan")
     * )
     */
    public function destroy() {}
}
