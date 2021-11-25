<?php
/**
 * @OA\Schema(
 *     title="ProfileResource",
 *     description="Profile resource",
 *     @OA\Xml(
 *         name="ProfileResource"
 *     )
 * )
 */
class ProfileResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Profile
     */
    private $data;
}
