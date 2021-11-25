@include('dashboard.errors')

{{BsForm::text("first_name") }} 
{{BsForm::text("father_name") }} 
{{BsForm::text("grandfather_name") }} 
{{BsForm::text("family_name") }} 
{{BsForm::text("gender") }} 
{{BsForm::text("id_number") }} 
{{BsForm::text("social_security_number") }} 
{{BsForm::text("phone") }} 
{{BsForm::text("email") }} 
{{ BsForm::checkbox("has_disability")->checked(false)->value(1) }} 
{{ BsForm::checkbox("has_driving_license")->checked(false)->value(1) }}

@isset($profile)
    {{ BsForm::image('image')->files($profile->getMediaResource()) }}
@else
    {{ BsForm::image('image') }}
@endisset

@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
      tinymce.init({
        selector: '.editor'
      });
    </script>
    
@endpush