<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مبادرة كوادر الخير</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <Style>
        body {
            font-family:Tajawal;
        }

        select {
            width:100%;
        }

        label {
            padding-left:30px;
        }
    </style>
</head>
<body>


<div class="min-h-full">

    <div class="bg-gray-100 font-sans w-full m-0">
        <div class="bg-white shadow">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between py-4">
                    <div class="ml-8 text-2xl text-gray-700 hidden md:flex font-medium">
                        <a href="{{url('/')}}">كوادر الخير</a>
                    </div>
                    <div class="hidden sm:flex sm:items-center">
                    <a href="https://kwadr.sa/" target="__blank" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mr-4">موقع المبادرة</a>
                    <a href="{{route('profiles.register_form')}}" class="text-gray-800 text-sm font-semibold border px-4 py-2 rounded-lg hover:text-purple-600 hover:border-purple-600">التسجيل</a>
                    </div>
                </div>
                
                
                </div>
            </div>
        </div>
    </div>
    
    <main>
    @yield('content')
    </main>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("#training_type_id").change(function() {
        $("#certificate").removeClass("hidden");
    });
    $("#supported").change(function() {
        var checked = $('#supported').is(":checked");
        if(!checked) {
            $("#supporter_id").addClass("hidden");
            $("#supporter_id").removeClass("md:flex");
        } else {
            $("#supporter_id").removeClass("hidden");
            $("#supporter_id").addClass("md:flex");
        }
    });
    
</script>
</body>
</html>