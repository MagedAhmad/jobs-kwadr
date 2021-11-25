<?php
/**
 * @OA\Schema(
 *     title="MartialResource",
 *     description="Martial resource",
 *     @OA\Xml(
 *         name="MartialResource"
 *     )
 * )
 */
class MartialResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Martial
     */
    private $data;
}
