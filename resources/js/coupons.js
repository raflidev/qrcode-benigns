$(document).ready( function () {
    $('#couponsTable').DataTable();
    $('.openModalAdd').on('click', function(e){
        $('#add-coupon-modal').removeClass('hidden');
    });
    // $('#deleteCoupon').on('click', function(e){
    //     $('#delete-coupon-modal').removeClass('hidden');
    //     var id = e.target.dataset.id;
    //     console.log(id)
    // });
    $('.deleteCoupon').on('click', function(e){
        $('#delete-coupon-modal').removeClass('hidden');
        var id = $(this).attr('data-id');
        $('#deleteOk').on('click', function(e){
            location.href = '/coupons/delete/'+id;
        });
    });
    $('.closeModal').on('click', function(e){
        $('#add-coupon-modal').addClass('hidden');
    });
    $('.closeModal').on('click', function(e){
        $('#delete-coupon-modal').addClass('hidden');
    });
    let darkModeStatus = localStorage.getItem('dark-mode')
    if (darkModeStatus === 'true'){
        $('#couponsTable_wrapper').addClass('text-white')
    }else {
        $('#couponsTable_wrapper').removeClass('text-white')
    }
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

const darkModeStatus = localStorage.getItem('dark-mode')

document.getElementById('dark-mode-toggle').addEventListener('click',() => {
    if (document.documentElement.classList.contains('dark')){
        document.getElementById('couponsTable_wrapper').classList.remove('text-white')
    }else {
        document.getElementById('couponsTable_wrapper').classList.add('text-white')
    }
})


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
