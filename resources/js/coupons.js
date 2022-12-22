$(document).ready( function () {
    $('#couponsTable').DataTable();
    $('.openModalAdd').on('click', function(e){
        $('#add-coupon-modal').removeClass('hidden');
    });
    $('.deleteCoupon').on('click', function(e){
        $('#delete-coupon-modal').removeClass('hidden');
        var id = $(this).attr('data-id');
        $('#deleteOk').on('click', function(e){
            location.href = '/coupons/delete/'+id;
        });
    });
    $('.editCoupon').on('click', function(e){
        $('#edit-coupon-modal').removeClass('hidden');
        var id = $(this).attr('data-id');
        getDataByID(id);
    });
    $('.closeModal').on('click', function(e){
        $('#add-coupon-modal').addClass('hidden');
        $('#edit-coupon-modal').addClass('hidden');
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
    $.get("/api/coupons/"+id, function(data){
        document.getElementById("edit_id").value = data[0].id;
        document.getElementById("edit_benefit").value = data[0].benefit;
        document.getElementById("edit_kodeunik").value = data[0].kodeunik;
        document.getElementById("edit_max_use").value = data[0].max_use;
        document.getElementById("edit_expired_at").value = data[0].expired_at;
        document.getElementById("edit_submitCoupon").innerHTML = "Edit Coupon"
    });

}

const darkModeStatus = localStorage.getItem('dark-mode')

document.getElementById('dark-mode-toggle').addEventListener('click',() => {
    if (document.documentElement.classList.contains('dark')){
        document.getElementById('couponsTable_wrapper').classList.remove('text-white')
    }else {
        document.getElementById('couponsTable_wrapper').classList.add('text-white')
    }
})
