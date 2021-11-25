<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Countries\AreaSelectResource;
use App\Models\Area;
use App\Models\City;
use App\Models\Page;
use App\Models\Palace;
use App\Models\Country;
use App\Models\Package;
use Illuminate\Routing\Controller;
use App\Http\Resources\PageSelectResource;
use App\Http\Filters\Countries\SelectFilter;
use App\Http\Resources\PalaceSelectResource;
use App\Http\Resources\PackageSelectResource;
use App\Http\Resources\Countries\CitySelectResource;
use App\Http\Resources\Countries\CountrySelectResource;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\Countries\SelectFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function countries(SelectFilter $filter)
    {
        $countries = Country::active()->filter($filter)->paginate();

        return CountrySelectResource::collection($countries);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\Countries\SelectFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function areas(SelectFilter $filter)
    {
        $countries = Area::with('city')->filter($filter)->paginate();

        return AreaSelectResource::collection($countries);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SelectFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function pages(SelectFilter $filter)
    {
        $pages = Page::filter($filter)->paginate();

        return PageSelectResource::collection($pages);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SelectFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function palaces(SelectFilter $filter)
    {
        $palaces = Palace::filter($filter)->paginate();

        return PalaceSelectResource::collection($palaces);
    }

    /**
     * Display a listing of the resource.
     *
     * @param SelectFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function packages(SelectFilter $filter)
    {
        $packages = Package::with('palace')->filter($filter)->paginate();

        return PackageSelectResource::collection($packages);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Palace $palace
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function palacePackages(Palace $palace)
    {
        return optional(optional($palace)->packages)->pluck('id');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Palace $palace
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function palaceAdditions(Palace $palace)
    {
        return optional(optional($palace)->additions)->pluck('name', 'id');
    }
}
