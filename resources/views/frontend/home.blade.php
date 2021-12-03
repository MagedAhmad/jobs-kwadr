@extends('frontend.master')

@section('content')

@include('frontend.errors')


<!-- component -->
<div class="flex justify-center min-h-screen bg-gray-800 antialiased">  
  <div class="container sm:mt-24 mt-24 my-auto max-w-xl border-2 border-gray-200 p-3 bg-white">
    <!-- header -->  
        <div class="text-center m-6">
        <h1 class="text-3xl font-semibold text-gray-700">التسجيل مع كوادر</h1>
        <p class="text-gray-500">إملء البيانات</p>
        </div>
        @if($step == 0)
        @include('frontend.profile.steps.main_data')
        @elseif($step == 1)
        @include('frontend.profile.steps.address')
        @elseif($step == 2)  
        @include('frontend.profile.steps.education')
        @else    
        @include('frontend.profile.steps.goals')
        @endif
    </div>
</div>
@endsection
