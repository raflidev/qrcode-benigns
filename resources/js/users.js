$(document).ready( function () {
    $('#usersTable').DataTable();
    $('.openModalAdd').on('click', function(e){
        $('#add-user-modal').removeClass('hidden');
    });
    $('.deleteUser').on('click', function(e){
        $('#delete-user-modal').removeClass('hidden');
        var id = $(this).attr('data-id');
        $('#deleteOk').on('click', function(e){
        location.href = '/users/delete/'+id;
        });
    });
    $('.editUser').on('click', function(e){
        $('#edit-user-modal').removeClass('hidden');
        var id = $(this).attr('data-id');
        getDataByID(id);
    });
    $('.closeModal').on('click', function(e){
        $('#add-user-modal').addClass('hidden');
        $('#edit-user-modal').addClass('hidden');
    });
    $('.closeModal').on('click', function(e){
        $('#delete-user-modal').addClass('hidden');
    });

    let darkModeStatus = localStorage.getItem('dark-mode')
    if (darkModeStatus === 'true'){
        $('#usersTable_wrapper').addClass('text-white')
    }else {
        $('#usersTable_wrapper').removeClass('text-white')
    }
} );
function getDataByID(id) {
    // get data from database
    $.get("/api/users/"+id, function(data){
        document.getElementById("edit_id").value = data[0].id;
        document.getElementById("edit_name").value = data[0].name;
        document.getElementById("edit_email").value = data[0].email;
    });
}


document.getElementById('dark-mode-toggle').addEventListener('click',() => {
    if (document.documentElement.classList.contains('dark')){
        document.getElementById('usersTable_wrapper').classList.remove('text-white')
    }else {
        document.getElementById('usersTable_wrapper').classList.add('text-white')
    }
})

function editUser(id) {
    document.querySelector('#add-user-modal').classList.remove('hidden');
    let data = getDataByID(id); // get data from database

    // manipulating input value
    document.getElementById("name").value = data.name;
    document.getElementById("username").value = data.username;
    document.getElementById("password").disabled = true;
    document.getElementById("email").value = data.email;
    document.getElementById("submitUser").innerHTML = "Edit User";
}
function removeCoupon(id){
    // remove coupon from database
}
