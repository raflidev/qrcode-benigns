<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BENING'S | Transaction</title>
    @vite(['resources/css/app.css','resources/js/app.js','resources/js/transaction.js','resources/js/header.js'])
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
</head>
<body>
    <x-header />
    <x-sidebar activePage="transactions"/>
    <div class="content p-7 flex flex-col gap-8 ml-64 2xl:ml-80 2xl:gap-12 dark:bg-accent min-h-[calc(100vh-48px)] 2xl:min-h-[calc(100vh-56px)]  " >
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
        @if (Session::has('success'))
            <div id="success"
                class="success w-full px-5 bg-green-500 text-white py-3 rounded items-center">
                {{ Session::get('success') }}
                <div class="float-right" onclick="closePopup2()">
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
                Transactions
            </h1>
            @if(Auth::user()->role == 'superadmin')
            <button class="openModalAdd flex items-center gap-1 py-1.5  pl-2 pr-4 bg-gray-900/75 text-white rounded-lg" type="button" data-modal-toggle="add-user-modal">
                <x-mysvg name="add" />
                <span>Add Transaction</span>
            </button>
            @endif
        </div>

        <table id="transactionTable" class="dark:bg-light-dark dark:text-white">
            <thead class="">
                <tr class="">
                    <th class="w-4">No</th>
                    <th>ID Transaksi</th>
                    <th>Kode Unik Kupon</th>
                    <th>Jenis Mitra</th>
                    <th>Nama Admin</th>
                    <th>FO</th>
                    <th>Nama Customer</th>
                    <th>No HP</th>
                    <th>Dibuat pada</th>
                    <th>Terakhir di update</th>
                    @if(Auth::user()->role == 'superadmin')
                    <th class="w-56 2xl:w-44">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                <?php $no= 1; ?>
                @foreach ($data as $product)
                    <tr class="">
                        <td>{{ $no }}</td>
                        <td>{{ $product['id_unik'] }}</td>
                        <td>{{ $product['kodeunik'] }}</td>
                        <td>{{ $product['jenis_mitra'] }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['outlet'] }}</td>
                        <td>{{ $product['nama_user'] }}</td>
                        <td>{{ $product['no_hp'] }}</td>
                        <td>{{ date('d F Y h:m:s', strtotime($product['created_at'])); }}</td>
                        <td>{{ date('d F Y h:m:s', strtotime($product['updated_at'])); }}</td>
                        @if(Auth::user()->role == 'superadmin')
                        <td>
                            <button id="deleteTransaction" data-id="{{$product['id']}}" class="deleteTransaction w-24 h-9 border border-red-400/50 hover:border-red-400 text-red-400 bg-transparent hover:bg-red-200/30 hover:text-red-600 rounded-lg text-sm py-1.5 pr-2 pl-1 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                <x-mysvg name="delete"/>
                                <span class="">Remove</span>
                            </button>
                        </td>
                        @endif
                    </tr>
                    <?php $no++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('modal.transaction.delete-transaction')
    @include('modal.transaction.add-transaction', ['kupon' => $kupon])
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        function closePopup1() {
            document.getElementById('error').classList.add('hidden');
        }
        function closePopup2() {
            document.getElementById('success').classList.add('hidden');
        }
    </script>
</body>
</html>
