<?php
/**
 * @OA\Schema(
 *     title="EducationResource",
 *     description="Education resource",
 *     @OA\Xml(
 *         name="EducationResource"
 *     )
 * )
 */
class EducationResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Education
     */
    private $data;
}
