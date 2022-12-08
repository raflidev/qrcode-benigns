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
    <x-sidebar activePage="qr"/>
    <div class="content p-7 flex flex-col gap-8 ml-64 2xl:ml-80 2xl:gap-12 dark:bg-accent min-h-[calc(100vh-48px)] 2xl:min-h-[calc(100vh-56px)]  " >
        <div class="flex items-center justify-between">
            <h1 class="font-bold text-3xl 2xl:text-4xl dark:text-white ">
                QR SCAN
            </h1>
        </div>
        <div class="flex space-x-10">
          <div class="w-1/2">
            <div id="reader" width="100px" class=""></div>
          </div>
          <div class="w-1/2">
            <div>
              <span id="scanReq" class="font-bold text-xl">Silakan Scan QR Code</span>
              <div id="result" class="hidden space-y-4 ">
                  <div>
                      <span class="font-bold">Kode yang terscan</span>
                      <div id="resultQR" class="uppercase"></div>
                  </div>
                  <div id="resultMessage" class="text-red-500">
                      <span class="font-bold">Error :</span>
                      <div id="resultMessageText"></div>
                  </div>
                  <form class="hidden space-y-4" id="resultTrue" method="POST" action="{{route('qr.store')}}">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="kodeunik" class="kodeunik" value="">
                    <input type="hidden" name="id_unik" class="id_unik" value="">
                    <div>
                        <span class="font-bold">Benefit</span>
                        <div id="benefit" class="">Diskon 50%</div>
                    </div>
                    <div>
                        <button class="flex items-center gap-1 py-1.5  pl-2 pr-4 bg-gray-900/75 text-white rounded-lg" type="submit">
                            <x-mysvg name="add" />
                            <span>Proses Kupon</span>
                        </button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        var lastResult, countResults = 0;
        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                // Handle on success condition with the decoded message.
                console.log(`Scan result ${decodedText}`, decodedResult);

                getQR(decodedText);
                $('#result').removeClass('hidden');
                $('#scanReq').addClass('hidden');
            }
        }

        function getQR(id) {
            var param = id.split(',')
            console.log(id);
            $('#resultQR').text(param[1]);
            $('.kodeunik').val(param[1]);
            $('.id_unik').val(param[0]);
            $.get('/checkQR/'+id, function (data) {
                if(data.status != "error"){
                    $('#resultTrue').removeClass('hidden');
                    $('#resultMessage').removeClass('hidden');
                    $('#resultMessageText').text("Kupon dapat digunakan");
                    $('#resultMessage').removeClass('text-red-500');
                    $('#resultMessage').addClass('text-green-500');
                    $('#benefit').text(data.benefit);
                    $('#email').val(param[1]);
                }else{
                    console.log(data)
                    $('#resultMessage').removeClass('hidden');
                    $('#resultMessageText').text(data.message);
                }
            })
        }

        function onScanFailure(error) {
            //
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</body>
</html>
