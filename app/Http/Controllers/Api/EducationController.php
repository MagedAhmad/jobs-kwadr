<?php

namespace App\Http\Controllers\Api;

use App\Models\Education;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\EducationResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EducationController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the education.
     * @OA\Get(
     *      path="/education",
     *      operationId="getEducationList",
     *      tags={"Education"},
     *      summary="Get list of education",
     *      description="Returns list of education",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/EducationResource")
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
        $education = Education::filter()->simplePaginate();
        return EducationResource::collection($education);
    }

    /**
     * Display the specified education.
     *
     * @OA\Get(
     *      path="/education/{id}",
     *      operationId="getEducationById",
     *      tags={"Education"},
     *      summary="Get education information",
     *      description="Returns education data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Education id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *           @OA\JsonContent(ref="#/components/schemas/Education")
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
     * @param \App\Models\Education $education
     * @return \App\Http\Resources\EducationResource
     */
    public function show(Education $education)
    {
        return new EducationResource($education);
    }

    /**
     * Display a listing of the resource.
    * @OA\Get(
     *      path="/select/education",
     *      operationId="getSelectEducationList",
     *      tags={"Education"},
     *      summary="Get list of Select education",
     *      description="Returns list of Select education",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/EducationResource")
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
        $education = Education::filter()->simplePaginate();

        return SelectResource::collection($education);
    }
}
