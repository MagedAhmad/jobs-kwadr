<div class="m-6">
    <form class="mb-4" method="POST" action="{{route('profiles.main_data', $token->token)}}">
    @csrf
        <div class="md:flex">
            <div class="mb-6 md:ml-2">
                <label for="first_name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.first_name')}}</label>
                <input type="text" name="first_name" value="{{$profile->first_name}}" placeholder="{{__('profiles.attributes.first_name')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required="required" />
            </div>
            <div class="mb-6">
                <label for="father_name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.father_name')}}</label>
                <input type="text" value="{{$profile->father_name}}" name="father_name" placeholder="{{__('profiles.attributes.father_name')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required="required" />
            </div>
        </div>
        <div class="md:flex">
            <div class="mb-6 md:ml-2">
                <label for="grandfather_name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.grandfather_name')}}</label>
                <input type="text" value="{{$profile->grandfather_name}}" name="grandfather_name" placeholder="{{__('profiles.attributes.grandfather_name')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required="required" />
            </div>
            <div class="mb-6">
                <label for="family_name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.family_name')}}</label>
                <input type="text" value="{{$profile->family_name}}" name="family_name" placeholder="{{__('profiles.attributes.family_name')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required="required" />
            </div>
        </div>
        <div>
            <div class="mb-6 md:ml-2">
                <label for="id_number" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.id_number')}}</label>
                <input type="text" value="{{$profile->id_number}}" name="id_number" placeholder="{{__('profiles.attributes.id_number')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required="required" />
            </div>
        </div>
        <div>
            <div class="mb-6 md:ml-2">
                <label for="social_security_number" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.social_security_number')}}</label>
                <input type="text" value="{{$profile->social_security_number}}" name="social_security_number" placeholder="{{__('profiles.attributes.social_security_number')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required="required" />
            </div>
        </div>
        <div class="md:flex">
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.email')}}</label>
                <input type="email" value="{{$profile->email}}" name="email" placeholder="{{__('profiles.attributes.email')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required="required" />
            </div>
            <div class="mb-6 md:ml-2">
                <label for="phone" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.phone')}}</label>
                <input type="text" value="{{$profile->phone}}" name="phone" placeholder="{{__('profiles.attributes.phone')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" required="required" />
            </div>
            <div class="mb-6 md:ml-2">
                <label for="additional_number" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.additional_number')}}</label>
                <input type="text" value="{{$profile->additional_number}}" name="additional_number" placeholder="{{__('profiles.attributes.additional_number')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
            
        </div>
        <div class="md:flex my-2">
            <label for="martial_id" class="mt-2 mx-2 block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.martial_id')}}</label>
            <select name="martial_id" value="{{$profile->martial_id}}"  class="px-16 py-2">
                @foreach(\App\Models\Martial::all() as $martial)
                <option value="{{$martial->id}}">{{$martial->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="md:flex">
            <div class="mb-6 md:ml-16">
                <label for="gender" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.gender')}}</label>
                <select name="gender" value="{{$profile->gender}}" class="px-16 py-2">
                    <option value="{{\App\Models\Profile::FEMALE}}">{{__('profiles.gender.' . \App\Models\Profile::FEMALE )}}</option>
                    <option value="{{\App\Models\Profile::MALE}}">{{__('profiles.gender.' . \App\Models\Profile::MALE )}}</option>
                </select>
            </div>
            <div class="mb-6 md:ml-2">
                <label for="has_disability" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.has_disability')}}</label>
                <input type="checkbox" name="has_disability" value="1"  @if($profile->has_disability) checked @endif placeholder="{{__('profiles.attributes.phone')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
            <div class="mb-6">
                <label for="has_driving_license" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.has_driving_license')}}</label>
                <input type="checkbox" name="has_driving_license" value="1" @if($profile->has_driving_license) checked @endif placeholder="{{__('profiles.attributes.has_driving_license')}}" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
            </div>
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
 