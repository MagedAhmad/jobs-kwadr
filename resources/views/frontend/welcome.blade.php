@extends('frontend.master')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="text-center text-white bg-gray-500 py-4">
            @include('flash::message')
        </div>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:text-center">
                <h2 class="text-base text-indigo-600 font-semibold tracking-wide uppercase">توفير فرص عمل</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    فرصه عمل كريمة مع كوادر الخير
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                سجلى الآن معنا واحصلى علي فرصة عمل قريبة منك ورواتب مجزية
                </p>
                </div>

                <div class="mt-10">
                <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-gray-500 text-white">
                        <!-- Heroicon name: outline/globe-alt -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                        </div>
                        <p class="pt-16 ml-16 text-lg leading-6 font-medium text-gray-900">كوادر للتدريب والتوظيف النسوي بالقطاع غير الربحي</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                    مبادرة في مجال تمكين المرأة السعودية من الحصول على فرص عمل لائقة في منظمات العمل الخيري والأهلي ( القطاع غير الربحي ) و رفع مستواها المهني في العمل المجتمعي والتنموي لتلبية من الكوادر النسوية المدربة والمؤهلة لمشاركَته 
                    </dd>
                    </div>

                    

                    <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-gray-500 text-white">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        </div>
                        <p class="pt-16 ml-16 text-lg leading-6 font-medium text-gray-900">أهداف كوادر الخير</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-gray-500">
                    زيادة مشاركة القوى العاملة النسائية من الفئات الهشة على نطاق واسع فى المنظمات التنموية
                    -زيادة عدد النساء فى المناصب القيادية فى المنظمات الاهلية
                    - بناء التكافؤ فى المهارات والوظائف الناشئة ف المنظمات الاهلية ذات الطلب العالى
                    </dd>
                    </div>
                </dl>
                </div>
            </div>
        </div>

        <div class="bg-gray-50">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                <span class="block">هل مستعد/ة للتسجيل؟</span>
                <span class="block text-indigo-600">ابدأ التسجيل معنا الآن</span>
                </h2>
                <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="{{route('profiles.register_form')}}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-500 hover:bg-gray-700">
                    فورم التسجيل
                    </a>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                    <a href="https://kwadr.sa/" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50">
                    للمزيد عن كوادر الخير
                    </a>
                </div>
                </div>
            </div>
        </div>
  


    </div>
@endsection
