<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="form-wrapper w-full ">
        <form id="login-form" method="POST" action="{{route('user.login')}}"  class=" border border-light-dark p-8 space-y-5 w-[27rem] m-auto flex flex-col  gap-4 bg-neutral mt-32 rounded-lg">
            @csrf
            @method('POST')
            @if ($errors->first('wrong'))
                            <div id="error" class="w-full px-5 bg-red-500 text-white py-3 rounded -mt-10 items-center">
                                {{ $errors->first('wrong') }}
                                <div class="float-right" onclick="closePopup()">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6  hover:rounded-full text-white hover:bg-red-800 hover:cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>
                        @endif
                        @if (Session::has('success'))
                            <div id="success"
                                class="w-full px-5 bg-green-500 text-white py-3 rounded -mt-16 items-center">
                                {{ Session::get('success') }}
                                <div class="float-right" onclick="closePopup()">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6  hover:rounded-full text-white hover:bg-green-800 hover:cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>
                        @endif
            <div>
                <img src="https://beningsindonesia.com/assets/img/logo/benings_indonesia_black.png" class="w-36" alt="" srcset="">
            </div>
            <div>
                <h1 class="font-bold text-3xl border-b-2 border-light-dark/40 w-fit pb-1">Login</h1>
            </div>
            <div class="space-y-3">
                <div class="input-wrapper flex flex-col gap-1">
                    <label for="" class="text-sm font-medium">Username*</label>
                    <div class="input-element flex items-center gap-2 border-2 px-4 py-2 p-1  bg-gray-100 rounded-full">
                        <input type="text" name="username" value="{{old('username')}}" placeholder="Enter your username" class="border-none focus:outline-none text-sm focus:border-none bg-transparent w-full px-1" required>

                    </div>
                </div>
                <div class="input-wrapper flex flex-col gap-1">
                    <label for="" class="text-sm font-medium">Password*</label>
                    <div class="input-element flex gap-2 border-2 px-4 py-2 p-1  bg-gray-100 rounded-full">
                        <input id="input-password" type="password" name="password" value="{{old('password')}}" placeholder="Enter your password" class="border-none focus:outline-none text-sm focus:border-none font-base bg-transparent w-full px-1" required>
                        <button id="show-password" class="rounded-full invisible flex items-center text-black/50 hover:text-black">
                            <x-mysvg name="visibility"/>
                        </button>
                    </div>
                </div>
            </div>
            <button type="submit" class="p-1 bg-slate-200 rounded border-2 border-slate-500 hover:bg-dark duration-300 hover:text-white text-black font-medium">LOGIN</button>
        </form>
    </div>
    <script>
        loginForm = document.getElementById("login-form");
        input = document.querySelector("#input-password")
        sibling = input.nextElementSibling

        function removeButton(input) {
            sibling = input.nextElementSibling
            if (input.value.length > 0 ){
                sibling.classList.add("visible")
                sibling.classList.remove("invisible")
            }else {
                sibling.classList.remove("visible")
                sibling.classList.add("invisible")
            }
        }
        input.addEventListener('input',() => {
            removeButton(input)
        })

        sibling.addEventListener('click',(e) => {
            e.preventDefault()
            switch (input.type) {
                case "text":
                    sibling.classList.add('text-black/50')
                    sibling.classList.add('hover:text-black')
                    sibling.classList.remove('text-black')
                    sibling.classList.remove('hover:text-black/50')
                    input.type = "password"
                    break;
                case "password":
                    sibling.classList.remove('text-black/50')
                    sibling.classList.remove('hover:text-black')
                    sibling.classList.add('text-black')
                    sibling.classList.add('hover:text-black/50')
                    input.type = "text"
                    break;
                default:
                    break;
            }
        })



        function onSubmitLogin(){
            // function when user click login button
            console.log("Clicked")
        }
        loginForm.addEventListener('submit',onSubmitLogin);

        function closePopup() {
            document.getElementById('error').classList.add('hidden');
            document.getElementById('success').classList.add('hidden');
        }
        function loading() {
            document.getElementById('loading').classList.remove('hidden');
            document.getElementById('masuk').classList.add('hidden');
        }
    </script>
</body>
</html>
