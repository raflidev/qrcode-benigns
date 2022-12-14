
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BENING'S | Generate Coupons</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    @foreach ($kupon as $data)
        <div class="">
            @if ($data['kodeunik'] == "proyellowLaser")
                @for ($i=0;$i < $data['max_use'];$i++)
                    <div class="relative">
                        <div class="absolute bottom-2 left-16">
                            {!! QrCode::size(70)->generate(uniqid().','.$data['kodeunik']); !!}
                        </div>
                        <img src="/images/Proyellow.jpg" alt="" srcset="">
                    </div>
                @endfor
            @else
                @for ($i=0;$i < $data['max_use'];$i++)
                    <div class="relative">
                        <div class="absolute bottom-2 left-16">
                            {!! QrCode::size(70)->generate(uniqid().','.$data['kodeunik']); !!}
                        </div>
                        <img src="/images/QSwitched.jpg" alt="" srcset="">
                    </div>
                @endfor
            @endif
        </div>
    @endforeach
</body>
</html>
