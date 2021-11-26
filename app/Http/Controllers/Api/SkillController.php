<?php

namespace App\Http\Controllers\Api;

use App\Models\Skill;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\SkillResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SkillController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the skills.
     * @OA\Get(
     *      path="/skills",
     *      operationId="getSkillsList",
     *      tags={"Skills"},
     *      summary="Get list of skills",
     *      description="Returns list of skills",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/SkillResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $skills = Skill::filter()->simplePaginate();
        return SkillResource::collection($skills);
    }

    /**
     * Display the specified skill.
     *
     * @OA\Get(
     *      path="/skills/{id}",
     *      operationId="getSkillById",
     *      tags={"Skills"},
     *      summary="Get skill information",
     *      description="Returns skill data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Skill id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *           @OA\JsonContent(ref="#/components/schemas/Skill")
     *
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      )
     * )
     * @param \App\Models\Skill $skill
     * @return \App\Http\Resources\SkillResource
     */
    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }

    /**
     * Display a listing of the resource.
    * @OA\Get(
     *      path="/select/skills",
     *      operationId="getSelectSkillsList",
     *      tags={"Skills"},
     *      summary="Get list of Select skills",
     *      description="Returns list of Select skills",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/SkillResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $skills = Skill::filter()->simplePaginate();

        return SelectResource::collection($skills);
    }
}
