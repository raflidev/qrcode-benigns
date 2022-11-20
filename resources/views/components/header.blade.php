<?php
    $dateSplitted = explode(",",date("d,m,Y"));
    $currDay = substr(date("l"),0,3);
    $currDate = $dateSplitted[0];
    $currMonth = substr(DateTime::createFromFormat('!m', $dateSplitted[1])->format('F'),0,3);
    $currYear = $dateSplitted[2];
?>

<header class="h-12 flex justify-end items-center border-b-2 px-3 bg-gray-100">
    <div class="header-component">
        <div class="utility">
            {{-- Night Mode --}}
            {{-- Notifikasi --}}
        </div>
        <div class="times flex gap-3">
            {{-- icon calendar --}}
            []
            <p class="date-time">
                {{ $currDay  }}, {{ $currDate }} {{ $currMonth  }} {{ $currYear }}
            </p>
        </div>
    </div>
</header>
