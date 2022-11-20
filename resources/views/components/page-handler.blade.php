@props(['page' => 1])

@if ($page === 1)
    <x-users />
@elseif ($page === 2)
    <x-coupons />
@endif