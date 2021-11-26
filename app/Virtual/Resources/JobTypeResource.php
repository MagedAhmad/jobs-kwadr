<?php
/**
 * @OA\Schema(
 *     title="JobTypeResource",
 *     description="JobType resource",
 *     @OA\Xml(
 *         name="JobTypeResource"
 *     )
 * )
 */
class JobTypeResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\JobType
     */
    private $data;
}
