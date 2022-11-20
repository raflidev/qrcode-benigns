@props(['activePage'=>'dashboard'])

<div class="sidebar fixed top-0 left-0 w-64 bg-gray-900 h-full flex flex-col gap-3 px-3 py-6 ">
    <div class="identity text-white h-24 flex justify-center items-center font-bold text-2xl flex-col">
        Lorem Ipsum
    </div>
    <div class="navigation text-white flex flex-col justify-between h-full">
        <div class="navigation-component flex flex-col gap-2">
            <div class="navElement group flex gap-3 h-12 p-4 rounded-xl hover:bg-black/30 items-center cursor-pointer {{ $activePage === 'dashboard' ? "bg-black/40" : "" }}" id="dashboard"> 
                {{-- icon --}}
                <div class="w-4 h-4 flex justify-center items-center  group-hover:opacity-100 {{ $activePage === 'dashboard' ? "opacity-100" : "opacity-50" }}">
                    <x-mysvg />
                </div>
                <p class=" group-hover:text-white/100 {{ $activePage === 'dashboard' ? "text-white/100" : "text-white/50" }}">
                    Dashboard
                </p>
            </div>
            <div class="navElement group flex gap-3 h-12 p-4 rounded-xl hover:bg-black/30  items-center cursor-pointer {{ $activePage === 'users' ? "bg-black/40" : "" }}" id="users">
                {{-- icon --}}
                <div class="w-4 h-4 flex justify-center items-center group-hover:opacity-100 {{ $activePage === 'users' ? "opacity-100" : "opacity-50" }}">
                    <x-mysvg />
                </div>
                <p class=" group-hover:text-white/100 {{ $activePage === 'users' ? "text-white/100" : "text-white/50" }}">
                    Users
                </p>
            </div>
            <div class="navElement group flex gap-3 h-12 p-4 rounded-xl hover:bg-black/30   items-center cursor-pointer {{ $activePage === 'coupons' ? "bg-black/40 " : "" }}" id="coupons">
                {{-- icon --}}
                <div class="w-4 h-4 flex justify-center items-center group-hover:opacity-100 {{ $activePage === 'coupons' ? "opacity-100 " : "opacity-50" }}">
                    <x-mysvg />
                </div>
                <p class=" group-hover:text-white/100 {{ $activePage === 'coupons' ? "text-white/100 " : "text-white/50" }}">
                    Coupons
                </p>
            </div>
        </div>
        <div class="navigation-action">
            <div class="navElement group flex gap-3 h-12 p-4 rounded-xl hover:bg-black/40 bg-black/20  items-center cursor-pointer" id=''>
                {{-- icon --}}
                <div class="w-4 h-4 flex justify-center items-center opacity-100 group:opacity-100">
                    <x-mysvg />
                </div>
                <p class="text-white/100 group-hover:text-white/100">
                    Log Out
                </p>
            </div>
        </div>
    </div>

</div>

<script>
    const list = document.querySelectorAll('.navigation-component .navElement')
  
    list.forEach(element => {
        const id = element.id
        if (id === {{ $activePage }}){
            setActive(element)
        }
    })
    list.forEach(element => {
        element.addEventListener('click',(e) => {
            e.preventDefault()
            window.location.href = element.id;
        })
    });
</script>