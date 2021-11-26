<?php
/**
 * @OA\Schema(
 *     title="SkillResource",
 *     description="Skill resource",
 *     @OA\Xml(
 *         name="SkillResource"
 *     )
 * )
 */
class SkillResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Skill
     */
    private $data;
}
