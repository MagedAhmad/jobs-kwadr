<?php

namespace App\Http\Controllers\Api;

use App\Models\Provider;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\ProviderResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProviderController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the providers.
     * @OA\Get(
     *      path="/providers",
     *      operationId="getProvidersList",
     *      tags={"Providers"},
     *      summary="Get list of providers",
     *      description="Returns list of providers",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ProviderResource")
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
        $providers = Provider::filter()->simplePaginate();
        return ProviderResource::collection($providers);
    }

    /**
     * Display the specified provider.
     *
     * @OA\Get(
     *      path="/providers/{id}",
     *      operationId="getProviderById",
     *      tags={"Providers"},
     *      summary="Get provider information",
     *      description="Returns provider data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Provider id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *           @OA\JsonContent(ref="#/components/schemas/Provider")
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
     * @param \App\Models\Provider $provider
     * @return \App\Http\Resources\ProviderResource
     */
    public function show(Provider $provider)
    {
        return new ProviderResource($provider);
    }

    /**
     * Display a listing of the resource.
    * @OA\Get(
     *      path="/select/providers",
     *      operationId="getSelectProvidersList",
     *      tags={"Providers"},
     *      summary="Get list of Select providers",
     *      description="Returns list of Select providers",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ProviderResource")
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
        $providers = Provider::filter()->simplePaginate();

        return SelectResource::collection($providers);
    }
}
