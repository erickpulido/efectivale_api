let table = $('#requests-table').DataTable( {
    ajax: '/api/requests',
    columns: [
        { data: 'name' },
        { data: 'email' },
        { data: 'phone' },
        { data: 'phone_call',
            render: function (data, type) {
                if (data === 0)
                    return `<button type="button" class="btn btn-sm btn-danger badge status" value="1">Llamada pendiente</button>`

                if (data === 1)
                    return `<button type="button" class="btn btn-sm btn-success badge">Llamada realizada</button>`
            }
        }
    ]
});

table.on('click', '.status', function(){
    let form = $(this).parents('form'),
        value = $(this).val(),
        row = table.row($(this).parents('tr')).data()

    $.ajax({
        url: `/api/requests/${row.id}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        method: "PUT",
        data: {'phone_call': value},
        dataType: "JSON",
        beforeSend: function(){
            $('#message').addClass('d-none').html("")
        }
    })
    .done(function(response){
        $("#requests-table").DataTable().ajax.reload()
    })
    .fail(function(response){
        let data = response.responseJSON,
            errores = ""
    })
})