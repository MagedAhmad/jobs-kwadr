<div class="m-6">
    <form class="mb-4" method="POST" action="{{route('profiles.education', $token->token)}}">
        @csrf
        
        <div class="flex flex-col">
            <div class="flex">
                <div class="md:flex my-2">
                    <label for="training_type_id" class="mt-2 mx-2 block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.training_type_id')}}</label>
                    <select class="px-4 mx-2" name="training_type_id" value="{{$profile->training_type}}"  class="px-16 py-2">
                        @foreach(\App\Models\TrainingType::all() as $training_type)
                        <option value="{{$training_type->id}}">{{$training_type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:flex my-2">
                    <input type="text" class="w-full border pr-2" placeholder="{{__('profiles.attributes.certificate_name')}}" name="certificate_name" value="{{$profile->certificate_name}}">
                </div>
            </div>
            

            <div class="md:flex my-2">
                <label for="job_field_id" class="mt-2 mx-2 block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.job_field_id')}}</label>
                <select name="job_field_id" value="{{$profile->job_field_id}}"  class="px-16 py-2">
                    @foreach(\App\Models\JobField::all() as $job_field)
                    <option value="{{$job_field->id}}">{{$job_field->name}}</option>
                    @endforeach
                </select>
            </div>
            
            
            <div class="md:flex my-2">
                <label for="skill_id" class="mt-2 mx-2 block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.skill_id')}}</label>
                <select name="skill_id" value="{{$profile->skill_id}}"  class="px-16 py-2">
                    @foreach(\App\Models\Skill::all() as $skill)
                    <option value="{{$skill->id}}">{{$skill->name}}</option>
                    @endforeach
                </select>
            </div>
            
            
        <div class="md:flex my-2">
            <label for="job_type_id" class="mt-2 mx-2 block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.job_type_id')}}</label>
            <select name="job_type_id" value="{{$profile->job_type_id}}"  class="px-16 py-2">
                @foreach(\App\Models\JobType::all() as $job_type)
                <option value="{{$job_type->id}}">{{$job_type->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="md:flex my-2">
            <label for="supported_before" class="mt-2 mx-2 block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.supported_before')}}</label>
            <input type="checkbox" name="supported_before" value="1" @if($profile->supported_before) checked @endif >
        </div>
        <div class="md:flex my-2">
            <label for="supporter_id" class="mt-2 mx-2 block mb-2 text-sm text-gray-600 dark:text-gray-400">{{__('profiles.attributes.supporter_id')}}</label>
            <select name="supporter_id" value="{{$profile->supporter_id}}"  class="px-16 py-2">
                @foreach(\App\Models\Supporter::all() as $supporter)
                <option value="{{$supporter->id}}">{{$supporter->name}}</option>
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
 