<?php
    $dateSplitted = explode(",",date("d,m,Y"));
    $currDay = substr(date("l"),0,3);
    $currDate = $dateSplitted[0];
    $currMonth = substr(DateTime::createFromFormat('!m', $dateSplitted[1])->format('F'),0,3);
    $currYear = $dateSplitted[2];
?>

<header class="h-12 flex justify-end items-center border-b-2 px-3 bg-gray-100">
    <div class="header-component flex">
        <div class="utility pr-4 flex gap-3 items-center">
            {{-- Night Mode --}}
            <button class="flex items-center">
                <x-mysvg name="dark-mode" />
            </button>
            <button class="flex items-center">
                <x-mysvg name="notifications" />
            </button>

            {{-- Notifikasi --}}
        </div>
        <div class="times flex gap-3 border-l pl-4 border-black/30 items-center">
            {{-- icon calendar --}}
            <x-mysvg name="today" />
            <p class="date-time">
                {{ $currDay  }}, {{ $currDate }} {{ $currMonth  }} {{ $currYear }}
            </p>
        </div>
    </div>
</header>
