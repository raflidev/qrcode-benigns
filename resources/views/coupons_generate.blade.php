
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
        <div class="py-5">
            <div class="px-10">Kode Unik : {{$data['kodeunik']}}</div>
            <div class="px-10 grid grid-cols-4 gap-4">
                @for ($i=0;$i < $data['max_use'];$i++)
                <div class="flex w-full">
                    <div class="p-3 pr-0 rounded-r-2xl rounded-l-md uppercase w-full bg-gray-200 font-bold text-lg">
                        <div class="border-r-2 border-dashed border-black h-full">
                            <div class="p-1">
                                <div class="text-sm font-bold normal-case">Bening's Indonesia</div>
                                <div class="font-medium">Spesial Coupon !!</div>
                                @if(strlen($data['benefit']) <= 11)
                                    <div class="text-3xl  text-gray-200">
                                        <span class="bg-black">
                                                {{$data['benefit']}}
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="text-xl  text-gray-200">
                                        <span class="bg-black">
                                                {{$data['benefit']}}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                        </div>
                    </div>
                    <div class="p-3 bg-gray-200 rounded-r-md rounded-l-2xl items-center">
                        {!! QrCode::size(100)->generate(uniqid().','.$data['kodeunik']); !!}
                    </div>
                </div>
                @endfor
            </div>
        </div>
    @endforeach
</body>
</html>
