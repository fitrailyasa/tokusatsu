<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Data",
 *     type="object",
 *     required={"id", "name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Laravel"),
 *     @OA\Property(property="category_id", type="integer", example=1),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-06-01T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-06-01T12:00:00Z")
 * )
 *
 * @OA\Schema(
 *     schema="DataRequest",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="name", type="string", example="Laravel"),
 *     @OA\Property(property="category_id", type="integer", example=1)
 * )
 */
class DataApiSwagger
{
    /**
     * @OA\Get(
     *     path="/api/datas",
     *     summary="Daftar Data dengan pagination dan search",
     *     tags={"Data"},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Kata kunci pencarian nama data",
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
     *         description="Data retrieved successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/Data")
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
     *     @OA\Response(response=404, description="Data tidak ditemukan")
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/api/datas",
     *     summary="Tambah Data baru",
     *     tags={"Data"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/DataRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Data berhasil dibuat",
     *         @OA\JsonContent(
     *             @OA\Property(property="alert", type="string", example="Berhasil Tambah Data!")
     *         )
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/api/datas/{id}",
     *     summary="Ambil detail Data berdasarkan ID",
     *     tags={"Data"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Detail Data", @OA\JsonContent(ref="#/components/schemas/Data")),
     *     @OA\Response(response=404, description="Data tidak ditemukan")
     * )
     */
    public function show() {}

    /**
     * @OA\Put(
     *     path="/api/datas/{id}",
     *     summary="Update Data berdasarkan ID",
     *     tags={"Data"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/DataRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Data berhasil diupdate",
     *         @OA\JsonContent(@OA\Property(property="alert", type="string", example="Berhasil Edit Data!"))
     *     ),
     *     @OA\Response(response=404, description="Data tidak ditemukan")
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/api/datas/{id}",
     *     summary="Hapus Data berdasarkan ID",
     *     tags={"Data"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Data berhasil dihapus",
     *         @OA\JsonContent(@OA\Property(property="alert", type="string", example="Berhasil Hapus Data!"))
     *     ),
     *     @OA\Response(response=404, description="Data tidak ditemukan")
     * )
     */
    public function destroy() {}
}
