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
    @vite(['resources/css/app.css','resources/js/app.js','resources/js/users.js','resources/js/header.js'])
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">   
</head>
<body>
    <x-header />
    <x-sidebar activePage="users"/>
    <div class="content p-7 flex flex-col gap-8 ml-64 2xl:ml-80 2xl:gap-12 dark:bg-accent min-h-[calc(100vh-48px)] 2xl:min-h-[calc(100vh-56px)]  " >
        <div class="flex items-center justify-between">
            <h1 class="font-bold text-3xl 2xl:text-4xl dark:text-white ">
                Users
            </h1>
            <button class="openModalAdd flex items-center gap-1 py-1.5  pl-2 pr-4 bg-gray-900/75 text-white rounded-lg" type="button" data-modal-toggle="add-user-modal">
                <x-mysvg name="add" />
                <span>Add User</span>    
            </button>
        </div>
        <table id="usersTable" class="dark:bg-light-dark dark:text-white">
            <thead class="">
                <tr class="">
                    <th class="w-4">ID</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th class="w-56 2xl:w-44">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($json as $product)
                    <tr class="">
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['username'] }}</td>
                        <td>{{ $product['email'] }}</td>
                        <td>
                            <button id="editUser" class="border h-9 w-20 border-blue-400/50 hover:border-blue-400 text-blue-400 bg-transparent hover:bg-blue-200/30 hover:text-blue-600 rounded-lg text-sm py-1.5 pr-2 pl-1 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="editUser({{ $product['id'] }})" type="button" >
                                <x-mysvg name="edit"/>
                                <span class="">Edit</span>
                            </button>
                            <button id="deleteUser" class="w-24 h-9 border border-red-400/50 hover:border-red-400 text-red-400 bg-transparent hover:bg-red-200/30 hover:text-red-600 rounded-lg text-sm py-1.5 pr-2 pl-1 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <x-mysvg name="delete"/>
                                <span class="">Remove</span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include ('modal.add-user')
    @include('modal.delete-user')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</body>
</html>
