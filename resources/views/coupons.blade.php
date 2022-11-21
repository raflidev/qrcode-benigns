@php
    $path_file = storage_path() . '/app/public/coupons.json';
    $json = json_decode(file_get_contents($path_file), true);
    $test = 1;
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
        <div class="content-header flex gap-6 items-center justify-between">
            <h1 class="font-bold text-3xl ">
                COUPONS
            </h1>
            <button class="openModalAdd flex items-center gap-1 py-1.5  pl-2 pr-4 bg-gray-900/75 text-white rounded-lg" type="button" data-modal-toggle="add-user-modal">
                <x-mysvg name="add" />
                <span>Add Coupon</span>    
            </button>
        </div>
        <table id="usersTable" class="">
            <thead class="">
                <tr class="">
                    <th class="w-4" >ID</th>
                    <th>Benefit</th>
                    <th>Kode Unik</th>
                    <th>Max use</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($json as $product)
                    <tr class="">
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['benefit'] }}</td>
                        <td>{{ $product['kode_unik'] }}</td>
                        <td>{{ $product['max_use'] }}</td>
                        <td>
                            <button id="editCoupon" onclick="editCoupon({{ $product['id'] }})" type="button" class="border border-blue-400/50 hover:border-blue-400 text-blue-400 bg-transparent hover:bg-blue-200/30 hover:text-blue-600 rounded-lg text-sm py-1.5 pr-2 pl-1 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <x-mysvg name="edit"/>
                                <span class="">Edit</span>
                            </button>
                            <button id="deleteCoupon" class="border border-red-400/50 hover:border-red-400 text-red-400 bg-transparent hover:bg-red-200/30 hover:text-red-600 rounded-lg text-sm py-1.5 pr-2 pl-1 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <x-mysvg name="delete"/>
                                <span class="">Remove</span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include ('modal.add-coupon')
    @include ('modal.delete-coupon')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#usersTable').DataTable();
            $('.openModalAdd').on('click', function(e){
                $('#add-coupon-modal').removeClass('hidden');
            });
            $('#deleteCoupon').on('click', function(e){
                $('#delete-coupon-modal').removeClass('hidden');
            });
            $('.closeModal').on('click', function(e){
                $('#add-coupon-modal').addClass('hidden');
            });
            $('.closeModal').on('click', function(e){
                $('#delete-coupon-modal').addClass('hidden');
            });
           
        } );

        
        
        function getDataByID(id) {
            // get data from database
            
            const data = {
                benefit :"a",
                kode_unik :"b",
                max_use :"c"
            }
            //dummy data ^^
            return data 
        }

        function editCoupon(id) {
            document.querySelector('#add-coupon-modal').classList.remove('hidden');
            let data = getDataByID(id); // get data from database
            
            // manipulating input value
            document.getElementById("benefit").value = data.benefit;
            document.getElementById("kode_unik").value = data.kode_unik;
            document.getElementById("max_use").value = data.max_use;
            document.getElementById("submitCoupon").innerHTML = "Edit Coupon"
        }
        function removeCoupon(id){
            // remove coupon from database
        }

    </script>
</body>
</html>