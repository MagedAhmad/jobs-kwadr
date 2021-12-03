<div class="m-6">
    <form class="mb-4" method="POST" action="{{route('profiles.goals', $token->token)}}">
        @csrf
        
        <div class="md:flex my-2">
            <label for="first_goal" class="mt-2 mx-2 block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.first_goal')}}</label>
            <select name="first_goal" value="{{$profile->first_goal}}"  class="px-16 py-2">
                @foreach(\App\Models\City::all() as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="md:flex my-2">
            <label for="second_goal" class="mt-2 mx-2 block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.second_goal')}}</label>
            <select name="second_goal" value="{{$profile->second_goal}}"  class="px-16 py-2">
                @foreach(\App\Models\City::all() as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="md:flex my-2">
            <label for="third_goal" class="mt-2 mx-2 block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.third_goal')}}</label>
            <select name="third_goal" value="{{$profile->third_goal}}"  class="px-16 py-2">
                @foreach(\App\Models\City::all() as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
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
 