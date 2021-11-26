<?php
/**
 * @OA\Schema(
 *     title="SupporterResource",
 *     description="Supporter resource",
 *     @OA\Xml(
 *         name="SupporterResource"
 *     )
 * )
 */
class SupporterResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Supporter
     */
    private $data;
}
