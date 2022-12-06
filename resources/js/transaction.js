$(document).ready( function () {
    $('#transactionTable').DataTable();

    $('.deleteTransaction').on('click', function(e){
        $('#delete-transaction-modal').removeClass('hidden');
        var id = $(this).attr('data-id');
        $('#deleteOk').on('click', function(e){
        location.href = '/transactions/delete/'+id;
        });
    });

    $('.closeModal').on('click', function(e){
        $('#delete-transaction-modal').addClass('hidden');
    });
});


