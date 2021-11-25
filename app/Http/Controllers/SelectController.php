<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use App\Http\Filters\Countries\SelectFilter;
use App\Http\Resources\Countries\CitySelectResource;
use App\Http\Resources\Countries\CountrySelectResource;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\Countries\SelectFilter $filter
     * @return AnonymousResourceCollection
     */
    public function countries(SelectFilter $filter)
    {
        $countries = Country::filter($filter)->paginate();

        return CountrySelectResource::collection($countries);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\Countries\SelectFilter $filter
     * @return AnonymousResourceCollection
     */
    public function cities(SelectFilter $filter)
    {
        $countries = City::with('country')->filter($filter)->paginate();

        return CitySelectResource::collection($countries);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\Countries\SelectFilter $filter
     * @return AnonymousResourceCollection
     */
    public function areas(SelectFilter $filter)
    {
        $countries = Area::with('city')->filter($filter)->paginate();

        return CitySelectResource::collection($countries);
    }

    /**
     * Display a listing of the resource.
     *
     * @param City $city
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function cityAreas(City $city)
    {
        return optional(optional($city)->areas)->pluck('name', 'id');
    }
}