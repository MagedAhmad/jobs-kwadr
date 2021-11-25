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
