<?php

namespace App\Http\Controllers\Api;

use App\Models\Employer;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\EmployerResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EmployerController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the employers.
     * @OA\Get(
     *      path="/employers",
     *      operationId="getEmployersList",
     *      tags={"Employers"},
     *      summary="Get list of employers",
     *      description="Returns list of employers",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/EmployerResource")
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
        $employers = Employer::filter()->simplePaginate();
        return EmployerResource::collection($employers);
    }

    /**
     * Display the specified employer.
     *
     * @OA\Get(
     *      path="/employers/{id}",
     *      operationId="getEmployerById",
     *      tags={"Employers"},
     *      summary="Get employer information",
     *      description="Returns employer data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Employer id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *           @OA\JsonContent(ref="#/components/schemas/Employer")
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
     * @param \App\Models\Employer $employer
     * @return \App\Http\Resources\EmployerResource
     */
    public function show(Employer $employer)
    {
        return new EmployerResource($employer);
    }

    /**
     * Display a listing of the resource.
    * @OA\Get(
     *      path="/select/employers",
     *      operationId="getSelectEmployersList",
     *      tags={"Employers"},
     *      summary="Get list of Select employers",
     *      description="Returns list of Select employers",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/EmployerResource")
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
        $employers = Employer::filter()->simplePaginate();

        return SelectResource::collection($employers);
    }
}
