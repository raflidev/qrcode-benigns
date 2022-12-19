<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BENING'S | Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/header.js'])
</head>
<body>
    <x-header />
    <x-sidebar activePage='dashboard' />
    <div class="content p-7 flex flex-col gap-8 ml-64 2xl:ml-80 2xl:gap-12 dark:bg-accent min-h-[calc(100vh-48px)] 2xl:min-h-[calc(100vh-56px)]">
        @if (Session::has('error'))
            <div id="error" class="w-full px-5 bg-red-500 text-white py-3 rounded items-center">
                {{ Session::get('error') }}
                <div class="float-right" onclick="closePopup1()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6  hover:rounded-full text-white hover:bg-red-800 hover:cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        @endif
        <div class="text-4xl font-bold">
            Hi, {{Auth::user()->name;}}. {{$greet}}!
        </div>
        <div class="grid grid-cols-5 gap-4">
            @if(Auth::user()->role == 'superadmin')
            <div class="border border-black rounded-xl bg-accent/30">
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <div class="font-bold text-3xl">{{$user}}</div>
                            <div>User</div>
                        </div>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border border-black rounded-xl bg-accent/30">
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <div class="font-bold text-3xl">{{$transaction}}</div>
                            <div>Transaction</div>
                        </div>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="border border-black rounded-xl bg-accent/30">
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <div class="font-bold text-3xl">{{$coupon}}</div>
                            <div>Coupons</div>
                        </div>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                              </svg>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script src=""></script>
    <script>
         function closePopup1() {
            document.getElementById('error').classList.add('hidden');
        }
    </script>
</body>
</html>
