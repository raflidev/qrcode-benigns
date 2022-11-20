@php
    $path_file = storage_path() . '/app/public/coupons.json';
    $json = json_decode(file_get_contents($path_file), true);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">   
</head>
<body>
    <x-header />
    <x-sidebar activePage='coupons' />
    <div class="content ml-64 p-7 flex flex-col gap-6">
        <div class="content-header flex gap-6 items-center">
            <h1 class="font-bold text-3xl ">
                COUPONS
            </h1>
            <button>Add Coupon</button>
        </div>
        <table id="usersTable" class="">
            <thead class="">
                <tr class="">
                    <th class="w-4" >ID</th>
                    <th>Benefit</th>
                    <th>Kode Unik</th>
                    <th>Max use</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($json as $product)
                    <tr class="">
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['benefit'] }}</td>
                        <td>{{ $product['kode_unik'] }}</td>
                        <td>{{ $product['max_use'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#usersTable').DataTable();
        } );
    </script>
</body>
</html>