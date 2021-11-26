<?php

namespace App\Http\Controllers\Api;

use App\Models\Supporter;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\SupporterResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SupporterController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the supporters.
     * @OA\Get(
     *      path="/supporters",
     *      operationId="getSupportersList",
     *      tags={"Supporters"},
     *      summary="Get list of supporters",
     *      description="Returns list of supporters",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/SupporterResource")
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
        $supporters = Supporter::filter()->simplePaginate();
        return SupporterResource::collection($supporters);
    }

    /**
     * Display the specified supporter.
     *
     * @OA\Get(
     *      path="/supporters/{id}",
     *      operationId="getSupporterById",
     *      tags={"Supporters"},
     *      summary="Get supporter information",
     *      description="Returns supporter data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Supporter id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *           @OA\JsonContent(ref="#/components/schemas/Supporter")
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
     * @param \App\Models\Supporter $supporter
     * @return \App\Http\Resources\SupporterResource
     */
    public function show(Supporter $supporter)
    {
        return new SupporterResource($supporter);
    }

    /**
     * Display a listing of the resource.
    * @OA\Get(
     *      path="/select/supporters",
     *      operationId="getSelectSupportersList",
     *      tags={"Supporters"},
     *      summary="Get list of Select supporters",
     *      description="Returns list of Select supporters",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/SupporterResource")
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
        $supporters = Supporter::filter()->simplePaginate();

        return SelectResource::collection($supporters);
    }
}
