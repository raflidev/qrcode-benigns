$(document).ready( function () {
    $('#transactionTable').DataTable();

    $('.openModalAdd').on('click', function(e){
        $('#add-transaction-modal').removeClass('hidden');
    });

    $('.deleteTransaction').on('click', function(e){
        $('#delete-transaction-modal').removeClass('hidden');
        var id = $(this).attr('data-id');
        $('#deleteOk').on('click', function(e){
        location.href = '/transactions/delete/'+id;
        });
    });

    $('.closeModal').on('click', function(e){
        $('#add-transaction-modal').addClass('hidden');
        $('#delete-transaction-modal').addClass('hidden');
    });
});


