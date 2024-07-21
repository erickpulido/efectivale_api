$("#btn-logout").on({
    click: function(){
        let user_id = $(this).val()

        $.ajax({
            url: `/api/logout`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: {id: user_id},
            method: "POST",
            dataType: "JSON"
        })
        .done(function(response){
            window.location.href = "/"
        })
        .fail(function(response){
            let data = response.responseJSON,
                errores = ""
        })
    }
})

$(".btn-user-edit").on({
    click: function(){
        let user_id = $(this).val(),
            form = $('#form-user-edit')

        $.ajax({
            url: `/api/users/${user_id}`,
            method: "GET",
            dataType: "JSON"
        })
        .done(function(response){
            $.each(response.data, function(key, value){
                $(`:input[name=${key}]`, form)
                    .val(value)
            })
        })
        .fail(function(response){
            let data = response.responseJSON,
                errores = ""
        })
    }
})

$('.btn-user-update').on({
    click: function(){
        let user_id = $(this).val(),
        form = $(this).parents('form')

        console.log(form)

    $.ajax({
        url: `/api/users/${user_id}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        method: "PUT",
        data: form.serializeArray(),
        dataType: "JSON",
        beforeSend: function(){
            
        }
    })
    .done(function(response){
        alert("Vuelva a iniciar sesión")
        window.location.reload()
    })
    .fail(function(response){
        let data = response.responseJSON,
            errores = ""
    })
    }
})