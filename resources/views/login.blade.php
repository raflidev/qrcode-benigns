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
        <form id="login-form"  class="p-8 w-96 m-auto flex flex-col gap-4 bg-white mt-32">
            <h1 class="text-center font-bold text-5xl mb-12">Log in</h1>
            <div class="input-wrapper flex flex-col gap-1">
                <label for="" class="text-sm">Username</label>
                <div class="input-element flex items-center gap-2 border-2 rounded-md p-1  bg-gray-100">
                    <input type="text" placeholder="Enter your username" class="border-none focus:outline-none focus:border-none bg-transparent w-full" >

                </div>
            </div>
            <div class="input-wrapper flex flex-col gap-1">
                <label for="" class="text-sm">Password</label>
                <div class="input-element flex gap-2 border-2 rounded-md p-1  bg-gray-100">
                    <input id="input-password" type="password" placeholder="Enter your password" class="border-none focus:outline-none focus:border-none font-base bg-transparent w-full">
                    <button id="show-password" class="w-6 h-6 rounded-full border border-gray-900 font-bold text-sm invisible">s</button>
                </div>
                <div class="forget-password p-1 flex justify-end ">
                    <a href="/" class="forget-password underline text-sm" class="">Forget password?</a>
                </div>
            </div>
            <button type="submit" class="p-1 bg-slate-200 rounded border-2 border-slate-500 text-black font-medium">LOGIN</button>
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
                    input.type = "password"
                    break;
                case "password":
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
    </script>
</body>
</html>
