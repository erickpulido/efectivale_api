let table = $('#users-table').DataTable( {
    ajax: '/api/users',
    columns: [
        { data: 'name' },
        { data: 'email' },
        { data: 'actions'}
    ],
    columnDefs:[
        {
            targets:2,
            render: function(data, type, row)
            {
                let status = row.statuses[0].status

                if(status === 1)
                    return `<button type="button" class="btn btn-sm btn-danger badge status" value="2">Deshabilitar</button>`

                if(status === 0)
                    return `<button type="button" class="btn btn-sm btn-success badge status" value="1">Habilitar</button>`

            }
        }
    ]
});

table.on('click', '.status', function(){
    let form = $(this).parent('form'),
        value = $(this).val(),
        row = table.row($(this).parents('tr')).data()

    $.ajax({
        url: `/api/users/${row.id}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        method: "PUT",
        data: {'status': value},
        dataType: "JSON",
        beforeSend: function(){
            $('#message').addClass('d-none').html("")
        }
    })
    .done(function(response){
        $("#users-table").DataTable().ajax.reload()
    })
    .fail(function(response){
        let data = response.responseJSON,
            errores = ""
    })
})