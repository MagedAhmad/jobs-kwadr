<x-layout :title="$profile->name" :breadcrumbs="['dashboard.profiles.show', $profile]">
    <div class="row">
        <div class="col-md-6">
            @component('dashboard::components.box')
                @slot('class', 'p-0')
                @slot('bodyClass', 'p-0')

                <table class="table table-striped table-middle">
                    <tbody>
                    
                        <tr>
                            <th width="200">@lang("profiles.attributes.first_name")</th>
                            <td>{{ $profile->first_name }}</td>
                        </tr>
            
                        <tr>
                            <th width="200">@lang("profiles.attributes.father_name")</th>
                            <td>{{ $profile->father_name }}</td>
                        </tr>
            
                        <tr>
                            <th width="200">@lang("profiles.attributes.grandfather_name")</th>
                            <td>{{ $profile->grandfather_name }}</td>
                        </tr>
            
                        <tr>
                            <th width="200">@lang("profiles.attributes.family_name")</th>
                            <td>{{ $profile->family_name }}</td>
                        </tr>
            
                        <tr>
                            <th width="200">@lang("profiles.attributes.gender")</th>
                            <td>{{ $profile->gender }}</td>
                        </tr>
            
                        <tr>
                            <th width="200">@lang("profiles.attributes.id_number")</th>
                            <td>{{ $profile->id_number }}</td>
                        </tr>
            
                        <tr>
                            <th width="200">@lang("profiles.attributes.social_security_number")</th>
                            <td>{{ $profile->social_security_number }}</td>
                        </tr>
            
                        <tr>
                            <th width="200">@lang("profiles.attributes.phone")</th>
                            <td>{{ $profile->phone }}</td>
                        </tr>
            
                        <tr>
                            <th width="200">@lang("profiles.attributes.email")</th>
                            <td>{{ $profile->email }}</td>
                        </tr>
            
                        <tr>
                            <th width="200">@lang("profiles.attributes.has_disability")</th>
                            <td>
                                @if($profile->has_disability)
                                    <i class="text text-success fa fa-check"></i>
                                @else 
                                    <i class="text text-danger fa fa-times"></i>
                                @endif
                            </td>
                        </tr>
            
                        <tr>
                            <th width="200">@lang("profiles.attributes.has_driving_license")</th>
                            <td>
                                @if($profile->has_driving_license)
                                    <i class="text text-success fa fa-check"></i>
                                @else 
                                    <i class="text text-danger fa fa-times"></i>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th width="200">@lang("martials.attributes.name")</th>
                            <td>
                                {{$profile->martial->name}}
                            </td>
                        </tr>
                        <tr>
                            <th width="200">@lang("profiles.attributes.neighbour_name")</th>
                            <td>
                                {{$profile->neighbour_name}}
                            </td>
                        </tr>
                        <tr>
                            <th width="200">@lang("profiles.attributes.street")</th>
                            <td>
                                {{$profile->street}}
                            </td>
                        </tr>
                        <tr>
                            <th width="200">@lang("profiles.attributes.postal_code")</th>
                            <td>
                                {{$profile->postal_code}}
                            </td>
                        </tr>
                        <tr>
                            <th width="200">@lang("profiles.attributes.additional_number")</th>
                            <td>
                                {{$profile->additional_number}}
                            </td>
                        </tr>
                        <tr>
                            <th width="200">@lang("profiles.attributes.building_no")</th>
                            <td>
                                {{$profile->building_no}}
                            </td>
                        </tr>
                        <tr>
                            <th width="200">@lang("countries.attributes.name")</th>
                            <td>
                                {{$profile->country->name}}
                            </td>
                        </tr>
                        <tr>
                            <th width="200">@lang("cities.attributes.name")</th>
                            <td>
                                {{$profile->city->name}}
                            </td>
                        </tr>
                        <tr>
                            <th width="200">@lang("areas.attributes.name")</th>
                            <td>
                                {{$profile->area->name}}
                            </td>
                        </tr>
                        

            
                    @if($profile->getFirstMedia())
                        <tr>
                            <th width="200">@lang('profiles.attributes.image')</th>
                            <td>
                                <file-preview :media="{{ $profile->getMediaResource() }}"></file-preview>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                @slot('footer')
                    @include('dashboard.profiles.partials.actions.edit')
                    @include('dashboard.profiles.partials.actions.delete')
                @endslot
            @endcomponent
        </div>
    </div>
</x-layout>
