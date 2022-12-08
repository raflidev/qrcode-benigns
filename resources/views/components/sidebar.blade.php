@props(['activePage'=>'dashboard'])

<div class="sidebar fixed top-0 left-0 w-64 bg-light-dark dark:bg-dark h-full flex flex-col gap-3 px-3 py-6 2xl:w-80 2xl:px-4 2xl:py-8 2xl:gap-6">
    <div class="identity text-white h-24 flex  justify-center items-center font-bold text-2xl 2xl:gap-3 gap-2 2xl:text-3xl">
        <x-mysvg name="help"/>
        <span>Benings</span>
    </div>
    <div class="navigation text-white flex flex-col justify-between h-full ">
        <div class="navigation-component flex flex-col gap-2 2xl:gap-3">
            <div class="navElement group flex gap-3 h-12 p-4 2xl:gap-4  rounded-xl hover:bg-dark items-center cursor-pointer {{ $activePage === 'dashboard' ? "bg-black/40" : "" }}" id="dashboard">
                {{-- icon --}}
                <div class="w-4 h-4 flex justify-center items-center  group-hover:opacity-100 {{ $activePage === 'dashboard' ? "opacity-100" : "opacity-50" }}">
                    <x-mysvg name="home" />
                </div>
                <p class=" 2xl:text-lg group-hover:text-white/100 {{ $activePage === 'dashboard' ? "text-white/100 	" : "text-white/50" }}">
                    Dashboard
                </p>
            </div>
            @if(Auth::user()->role == 'superadmin')
            <div class="navElement group flex gap-3 2xl:gap-4 h-12 p-4 rounded-xl hover:bg-black/30  items-center cursor-pointer {{ $activePage === 'users' ? "bg-black/40" : "" }}" id="users">
                {{-- icon --}}
                <div class="w-4 h-4 flex justify-center items-center group-hover:opacity-100 {{ $activePage === 'users' ? "opacity-100" : "opacity-50" }}">
                    <x-mysvg name="user"/>
                </div>
                <p class="2xl:text-lg group-hover:text-white/100 {{ $activePage === 'users' ? "text-white/100" : "text-white/50" }}">
                    Users
                </p>
            </div>
            @endif
            <div class="navElement group flex gap-3 2xl:gap-4 h-12 p-4 rounded-xl hover:bg-black/30   items-center cursor-pointer {{ $activePage === 'coupons' ? "bg-black/40 " : "" }}" id="coupons">
                {{-- icon --}}
                <div class="w-4 h-4 flex justify-center items-center group-hover:opacity-100 {{ $activePage === 'coupons' ? "opacity-100 " : "opacity-50" }}">
                    <x-mysvg name="voucher"/>
                </div>
                <p class="2xl:text-lg group-hover:text-white/100 {{ $activePage === 'coupons' ? "text-white/100 " : "text-white/50" }}">
                    Coupons
                </p>
            </div>
            <div class="navElement group flex gap-3 2xl:gap-4 h-12 p-4 rounded-xl hover:bg-black/30   items-center cursor-pointer {{ $activePage === 'transactions' ? "bg-black/40 " : "" }}" id="transactions">
                {{-- icon --}}
                <div class="w-4 h-4 flex justify-center items-center group-hover:opacity-100 {{ $activePage === 'transactions' ? "opacity-100 " : "opacity-50" }}">
                    <x-mysvg name="cash"/>
                </div>
                <p class="2xl:text-lg group-hover:text-white/100 {{ $activePage === 'transactions' ? "text-white/100 " : "text-white/50" }}">
                    Transactions
                </p>
            </div>
            <div class="navElement group flex gap-3 2xl:gap-4 h-12 p-4 rounded-xl hover:bg-black/30   items-center cursor-pointer {{ $activePage === 'qr' ? "bg-black/40 " : "" }}" id="qr">
                {{-- icon --}}
                <div class="w-4 h-4 flex justify-center items-center group-hover:opacity-100 {{ $activePage === 'qr' ? "opacity-100 " : "opacity-50" }}">
                    <x-mysvg name="camera"/>
                </div>
                <p class="2xl:text-lg group-hover:text-white/100 {{ $activePage === 'qr' ? "text-white/100 " : "text-white/50" }}">
                    QR Scan
                </p>
            </div>
        </div>
        <div class="navigation-action">
            <div class="navElement group flex gap-3 2xl:gap-4 h-12 p-4 rounded-xl hover:bg-black/40 bg-black/20  items-center cursor-pointer" id=''>
                {{-- icon --}}
                <div class="w-4 h-4 flex justify-center items-center opacity-100 group:opacity-100">
                    <x-mysvg name="logout" />
                </div>
                <form action="{{route('user.logout')}}" method="POST">
                    @csrf
                    @method('POST')
                    <button type="submit" class="2xl:text-lg text-white/100 group-hover:text-white/100">
                        Log Out
                    </button>
                </form>
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
