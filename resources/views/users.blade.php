@php
    $path_file = storage_path() . '/app/public/users.json';
    $json = json_decode(file_get_contents($path_file), true);
@endphp



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">   
</head>
<body>
    <x-header />
    <x-sidebar activePage="users"/>
    <div class="content p-7 flex flex-col gap-6 ml-64" >
        <div class="flex gap-6">
            <h1 class="font-bold text-3xl">
                USERS
            </h1>
            <button class="openModal block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
                Toggle modal
              </button>
        </div>
        <table id="usersTable" class="">
            <thead class="">
                <tr class="">
                    <th class="w-4">ID</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($json as $product)
                    <tr class="">
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['username'] }}</td>
                        <td>{{ $product['email'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include ('modal.add-user')
    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
   <script>
        $(document).ready( function () {
            $('#usersTable').DataTable();
            $('.openModal').on('click', function(e){
                $('#authentication-modal').removeClass('hidden');
            });
            $('.closeModal').on('click', function(e){
                $('#authentication-modal').addClass('hidden');
            });
        } );
        
    </script> 
</body>
</html>
