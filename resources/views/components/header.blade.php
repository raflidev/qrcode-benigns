<?php
    $dateSplitted = explode(",",date("d,m,Y"));
    $currDay = substr(date("l"),0,3);
    $currDate = $dateSplitted[0];
    $currMonth = substr(DateTime::createFromFormat('!m', $dateSplitted[1])->format('F'),0,3);
    $currYear = $dateSplitted[2];
?>

<header class="h-12 flex justify-end items-center border-b-2 px-3 bg-gray-100 dark:bg-light-dark dark:border-dark 2xl:h-14">
    <div class="header-component flex ">
        <div class="utility pr-4 flex gap-5 items-center dark:text-white 2xl:gap-6">
            {{-- Night Mode --}}
            <button class="flex items-center" id="dark-mode-toggle">
                <x-mysvg name="dark-mode" />
            </button>
            <button class="flex items-center">
                <x-mysvg name="notifications" />
            </button>

            {{-- Notifikasi --}}
        </div>
        <div class="times flex gap-4 border-l pl-5 border-black/30 items-center dark:text-white dark:border-white 2xl:gap-6">
            {{-- icon calendar --}}
            <x-mysvg name="today" />
            <p class="date-time">
                {{ $currDay  }}, {{ $currDate }} {{ $currMonth  }} {{ $currYear }}
            </p>
        </div>
    </div>
</header>
<script>
    const toggleBtn = document.getElementById('dark-mode-toggle')
    var htmlElement = document.querySelector("html")
    toggleBtn.addEventListener('click',() => {
        if (htmlElement.classList.contains('dark')){
            htmlElement.classList.remove('dark')
        }
        else {
            htmlElement.classList.add('dark')
        }
    })

</script>