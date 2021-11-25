<?php

namespace App\Http\Controllers\Api;

use App\Models\Martial;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\MartialResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MartialController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the martials.
     * @OA\Get(
     *      path="/martials",
     *      operationId="getMartialsList",
     *      tags={"Martials"},
     *      summary="Get list of martials",
     *      description="Returns list of martials",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/MartialResource")
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
        $martials = Martial::filter()->simplePaginate();
        return MartialResource::collection($martials);
    }

    /**
     * Display the specified martial.
     *
     * @OA\Get(
     *      path="/martials/{id}",
     *      operationId="getMartialById",
     *      tags={"Martials"},
     *      summary="Get martial information",
     *      description="Returns martial data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Martial id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *           @OA\JsonContent(ref="#/components/schemas/Martial")
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
     * @param \App\Models\Martial $martial
     * @return \App\Http\Resources\MartialResource
     */
    public function show(Martial $martial)
    {
        return new MartialResource($martial);
    }

    /**
     * Display a listing of the resource.
    * @OA\Get(
     *      path="/select/martials",
     *      operationId="getSelectMartialsList",
     *      tags={"Martials"},
     *      summary="Get list of Select martials",
     *      description="Returns list of Select martials",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/MartialResource")
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
        $martials = Martial::filter()->simplePaginate();

        return SelectResource::collection($martials);
    }
}
