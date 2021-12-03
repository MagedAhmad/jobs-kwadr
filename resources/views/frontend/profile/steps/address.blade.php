<div class="m-6">
    <form class="mb-4" method="POST" action="{{route('profiles.address', $token->token)}}">
    @csrf
        <div class="md:flex">
            <div class="mb-6 md:ml-2">
                <label for="neighbour_name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.neighbour_name')}}</label>
                <input type="text" name="neighbour_name" value="{{$profile->neighbour_name}}" placeholder="{{__('profiles.attributes.neighbour_name')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required="required" />
            </div>
            <div class="mb-6">
                <label for="street" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.street')}}</label>
                <input type="text" value="{{$profile->street}}" name="street" placeholder="{{__('profiles.attributes.street')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required="required" />
            </div>
        </div>
        <div class="md:flex">
            <div class="mb-6 md:ml-2">
                <label for="postal_code" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.postal_code')}}</label>
                <input type="text" name="postal_code" value="{{$profile->postal_code}}" placeholder="{{__('profiles.attributes.postal_code')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required="required" />
            </div>
            <div class="mb-6">
                <label for="building_no" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.building_no')}}</label>
                <input type="text" value="{{$profile->building_no}}" name="building_no" placeholder="{{__('profiles.attributes.building_no')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required="required" />
            </div>
        </div>
        
        <div class="md:flex my-2">
            <label for="country_id" class="mt-2 mx-2 block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.country_id')}}</label>
            <select name="country_id" value="{{$profile->country_id}}"  class="px-16 py-2">
                @foreach(\App\Models\Country::all() as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="md:flex my-2">
            <label for="city" class="mt-2 mx-2 block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.city_id')}}</label>
            <select name="city_id" value="{{$profile->city_id}}"  class="px-16 py-2">
                <option>Choose</option>
                @foreach(\App\Models\City::all() as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="md:flex my-2">
            <label for="city" class="mt-2 mx-2 block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.area_id')}}</label>
            <select name="area_id" value="{{$profile->area_id}}"  class="px-16 py-2">
                <option>Choose</option>
                @foreach(\App\Models\Area::all() as $area)
                <option value="{{$area->id}}">{{$area->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-6">
            <button type="submit" class="w-full px-3 py-4 text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none duration-100 ease-in-out">{{__('profiles.actions.save_and_continue')}}</button>
        </div>
    
    </form>
    <div class="flex flex-row gap-2">
        @include('frontend.profile.buttons.main_data')
        @include('frontend.profile.buttons.address')
        @include('frontend.profile.buttons.education')
        @include('frontend.profile.buttons.goals')
    </div>  
</div>
 