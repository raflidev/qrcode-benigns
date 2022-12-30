<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BENING'S | Users</title>
    @vite(['resources/css/app.css','resources/js/app.js','resources/js/users.js','resources/js/header.js'])
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</head>
<body>
    <x-header />
    <x-sidebar activePage="users"/>
    <div class="content p-7 flex flex-col gap-8 ml-64 2xl:ml-80 2xl:gap-12 dark:bg-accent min-h-[calc(100vh-48px)] 2xl:min-h-[calc(100vh-56px)]  " >
        @if (count($errors) > 0)
        <div class="w-full bg-red-500 text-white py-2 px-5 rounded-xl">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
        @endif
        @if (Session::has('error'))
            <div
                class="error w-full px-5 bg-red-500 text-white py-3 rounded items-center">
                {{ Session::get('error') }}
                <div class="float-right" onclick="closePopup()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6  hover:rounded-full text-white hover:bg-green-800 hover:cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        @endif
        @if (Session::has('success'))
            <div
                class="success w-full px-5 bg-green-500 text-white py-3 rounded items-center">
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
        <div class="flex items-center justify-between">
            <h1 class="font-bold text-3xl 2xl:text-4xl dark:text-white ">
                Users
            </h1>
            <div class="flex space-x-4">
                <button class="openModalChange flex items-center gap-1 py-1.5  pl-2 pr-4 bg-yellow-900/75 text-white rounded-lg" type="button" data-modal-toggle="add-user-modal">
                    <x-mysvg name="edit" />
                    <span>Change Password</span>
                </button>
                <button class="openModalAdd flex items-center gap-1 py-1.5  pl-2 pr-4 bg-gray-900/75 text-white rounded-lg" type="button" data-modal-toggle="add-user-modal">
                    <x-mysvg name="add" />
                    <span>Add User</span>
                </button>
            </div>
        </div>
        <table id="usersTable" class="dark:bg-light-dark dark:text-white">
            <thead class="">
                <tr class="">
                    <th class="w-4">ID</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Outlet</th>
                    <th>Role</th>
                    <th>Dibuat pada</th>
                    <th>Terakhir di update</th>
                    <th class="w-56 2xl:w-44">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1 ?>
                @foreach ($data as $product)
                    <tr class="">
                        <td>{{ $no }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['username'] }}</td>
                        <td>{{ $product['outlet'] }}</td>
                        <td>{{ $product['role'] }}</td>
                        <td>{{ date('d F Y h:m:s', strtotime($product['created_at'])); }}</td>
                        <td>{{ date('d F Y h:m:s', strtotime($product['updated_at'])); }}</td>
                        <td>
                            <button id="editUser" data-id="{{$product['id']}}" class="editUser border h-9 w-20 border-blue-400/50 hover:border-blue-400 text-blue-400 bg-transparent hover:bg-blue-200/30 hover:text-blue-600 rounded-lg text-sm py-1.5 pr-2 pl-1 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" type="button" >
                                <x-mysvg name="edit"/>
                                <span class="">Edit</span>
                            </button>
                            <button id="deleteUser" data-id="{{$product['id']}}" class="deleteUser w-24 h-9 border border-red-400/50 hover:border-red-400 text-red-400 bg-transparent hover:bg-red-200/30 hover:text-red-600 rounded-lg text-sm py-1.5 pr-2 pl-1 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <x-mysvg name="delete"/>
                                <span class="">Remove</span>
                            </button>
                        </td>
                    </tr>
                    <?php $no++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
    @include ('modal.user.add-user')
    @include ('modal.user.edit-user')
    @include('modal.user.delete-user')
    @include('modal.user.change-password-user')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        function closePopup() {
            $('.success').addClass('hidden');
            // document.getElementsByClassName('success').classList.add('hidden');
        }
    </script>
</body>
</html>
