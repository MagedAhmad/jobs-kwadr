<?php
/**
 * @OA\Schema(
 *     title="TrainingTypeResource",
 *     description="TrainingType resource",
 *     @OA\Xml(
 *         name="TrainingTypeResource"
 *     )
 * )
 */
class TrainingTypeResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\TrainingType
     */
    private $data;
}
