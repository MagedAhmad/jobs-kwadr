@extends('frontend.master')

@section('content')
<form method="POST" action="{{route('profiles.register')}}" class="flex justify-center items-center h-screen bg-gray-800">
    @csrf
    <div class="max-w-md w-full bg-gray-900 rounded p-6 space-y-4">
        <div class="mb-4">
            <p class="text-gray-400">سجلى معنا</p>
            <h2 class="text-xl font-bold text-white">Join our community</h2>
        </div>
        <div>
            <input name="email" class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="email" placeholder="{{__('profiles.attributes.email')}}">
        </div>
        <div>
        <input name="social_security_number" class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" type="text" placeholder="{{__('profiles.attributes.social_security_number')}}">
        </div>
        <div>
            <button type="submit" class="w-full py-4 bg-blue-600 hover:bg-blue-700 rounded text-sm font-bold text-gray-50 transition duration-200">{{__('profiles.actions.save_and_continue')}}</button>
        </div>
    </div>
</form>

@endsection