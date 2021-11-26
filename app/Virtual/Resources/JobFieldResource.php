<?php
/**
 * @OA\Schema(
 *     title="JobFieldResource",
 *     description="JobField resource",
 *     @OA\Xml(
 *         name="JobFieldResource"
 *     )
 * )
 */
class JobFieldResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\JobField
     */
    private $data;
}
