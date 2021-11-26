<?php
/**
 * @OA\Schema(
 *     title="EmployerResource",
 *     description="Employer resource",
 *     @OA\Xml(
 *         name="EmployerResource"
 *     )
 * )
 */
class EmployerResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Employer
     */
    private $data;
}
