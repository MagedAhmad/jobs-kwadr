<?php

namespace App\Http\Controllers\Api;

use App\Models\TrainingType;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\TrainingTypeResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TrainingTypeController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the training_types.
     * @OA\Get(
     *      path="/training_types",
     *      operationId="getTrainingTypesList",
     *      tags={"TrainingTypes"},
     *      summary="Get list of training_types",
     *      description="Returns list of training_types",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TrainingTypeResource")
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
        $training_types = TrainingType::filter()->simplePaginate();
        return TrainingTypeResource::collection($training_types);
    }

    /**
     * Display the specified training_type.
     *
     * @OA\Get(
     *      path="/training_types/{id}",
     *      operationId="getTrainingTypeById",
     *      tags={"TrainingTypes"},
     *      summary="Get training_type information",
     *      description="Returns training_type data",
     *      @OA\Parameter(
     *          name="id",
     *          description="TrainingType id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *           @OA\JsonContent(ref="#/components/schemas/TrainingType")
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
     * @param \App\Models\TrainingType $training_type
     * @return \App\Http\Resources\TrainingTypeResource
     */
    public function show(TrainingType $training_type)
    {
        return new TrainingTypeResource($training_type);
    }

    /**
     * Display a listing of the resource.
    * @OA\Get(
     *      path="/select/training_types",
     *      operationId="getSelectTrainingTypesList",
     *      tags={"TrainingTypes"},
     *      summary="Get list of Select training_types",
     *      description="Returns list of Select training_types",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TrainingTypeResource")
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
        $training_types = TrainingType::filter()->simplePaginate();

        return SelectResource::collection($training_types);
    }
}
