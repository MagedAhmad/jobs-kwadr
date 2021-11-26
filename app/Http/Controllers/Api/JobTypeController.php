<?php

namespace App\Http\Controllers\Api;

use App\Models\JobType;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\JobTypeResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobTypeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the job_types.
     * @OA\Get(
     *      path="/job_types",
     *      operationId="getJobTypesList",
     *      tags={"JobTypes"},
     *      summary="Get list of job_types",
     *      description="Returns list of job_types",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/JobTypeResource")
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
        $job_types = JobType::filter()->simplePaginate();
        return JobTypeResource::collection($job_types);
    }

    /**
     * Display the specified job_type.
     *
     * @OA\Get(
     *      path="/job_types/{id}",
     *      operationId="getJobTypeById",
     *      tags={"JobTypes"},
     *      summary="Get job_type information",
     *      description="Returns job_type data",
     *      @OA\Parameter(
     *          name="id",
     *          description="JobType id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *           @OA\JsonContent(ref="#/components/schemas/JobType")
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
     * @param \App\Models\JobType $job_type
     * @return \App\Http\Resources\JobTypeResource
     */
    public function show(JobType $job_type)
    {
        return new JobTypeResource($job_type);
    }

    /**
     * Display a listing of the resource.
    * @OA\Get(
     *      path="/select/job_types",
     *      operationId="getSelectJobTypesList",
     *      tags={"JobTypes"},
     *      summary="Get list of Select job_types",
     *      description="Returns list of Select job_types",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/JobTypeResource")
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
        $job_types = JobType::filter()->simplePaginate();

        return SelectResource::collection($job_types);
    }
}
