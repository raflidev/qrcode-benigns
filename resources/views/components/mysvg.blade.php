@props(['name' => 'qr'])
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

@if ($name === "qr" )
    <svg  width="24" height="28" viewBox="0 0 24 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g clip-path="url(#clip0_8_2)">
            <path d="M12 13.7143C15.7875 13.7143 18.8571 10.6446 18.8571 6.85714C18.8571 3.06964 15.7875 0 12 0C8.2125 0 5.14286 3.06964 5.14286 6.85714C5.14286 10.6446 8.2125 13.7143 12 13.7143ZM9.55179 16.2857C4.275 16.2857 0 20.5607 0 25.8375C0 26.7161 0.7125 27.4286 1.59107 27.4286H22.4089C23.2875 27.4286 24 26.7161 24 25.8375C24 20.5607 19.725 16.2857 14.4482 16.2857H9.55179Z" fill="white"/>
        </g><defs><clipPath id="clip0_8_2"><rect width="24" height="27.4286" fill="white"/></clipPath></defs></svg>
@elseif($name === "home")
    <span class="material-icons-outlined ">home</span>
@elseif($name === "voucher")
    <span class="material-symbols-outlined scale-90">confirmation_number</span>
@elseif($name === "logout")
    <span class="material-symbols-outlined scale-90">logout</span>
@elseif($name === "today")
    <span class="material-symbols-outlined ">today</span>
@elseif($name === "user")
    <span class="material-icons-outlined ">person</span>
@elseif($name === "dark-mode")
    <span class="material-icons-outlined ">dark_mode</span>
@elseif($name === "notifications")
    <span class="material-icons-outlined ">notifications</span>
@elseif($name === "delete")
    <span class="material-icons-outlined scale-75">delete</span>
@elseif($name === "edit")
    <span class="material-icons-outlined scale-75">edit</span>
@elseif($name === "add")
    <span class="material-icons-outlined scale-75">add_circle_outline</span>
@elseif($name === "help")
    <span class="material-icons-outlined scale-110 2xl:scale-150">help_outline</span>
@elseif($name === "visibility")
    <span class="material-icons-outlined scale-75">visibility</span>
@elseif($name === "camera")
    <span class="material-icons-outlined scale-75">camera</span>
@elseif($name === "cash")
    <span class="material-icons-outlined scale-75">cash-100</span>
@elseif($name === "")
    <span class="material-icons-outlined "></span>




@endif
