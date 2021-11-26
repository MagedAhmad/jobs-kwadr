<?php

namespace App\Http\Controllers\Api;

use App\Models\JobField;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\JobFieldResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobFieldController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the job_fields.
     * @OA\Get(
     *      path="/job_fields",
     *      operationId="getJobFieldsList",
     *      tags={"JobFields"},
     *      summary="Get list of job_fields",
     *      description="Returns list of job_fields",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/JobFieldResource")
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
        $job_fields = JobField::filter()->simplePaginate();
        return JobFieldResource::collection($job_fields);
    }

    /**
     * Display the specified job_field.
     *
     * @OA\Get(
     *      path="/job_fields/{id}",
     *      operationId="getJobFieldById",
     *      tags={"JobFields"},
     *      summary="Get job_field information",
     *      description="Returns job_field data",
     *      @OA\Parameter(
     *          name="id",
     *          description="JobField id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *           @OA\JsonContent(ref="#/components/schemas/JobField")
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
     * @param \App\Models\JobField $job_field
     * @return \App\Http\Resources\JobFieldResource
     */
    public function show(JobField $job_field)
    {
        return new JobFieldResource($job_field);
    }

    /**
     * Display a listing of the resource.
    * @OA\Get(
     *      path="/select/job_fields",
     *      operationId="getSelectJobFieldsList",
     *      tags={"JobFields"},
     *      summary="Get list of Select job_fields",
     *      description="Returns list of Select job_fields",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/JobFieldResource")
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
        $job_fields = JobField::filter()->simplePaginate();

        return SelectResource::collection($job_fields);
    }
}
