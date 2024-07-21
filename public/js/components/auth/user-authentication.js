$("#btn-login").on({
    click: function(){
        let form = $(this).parent('form')

        $.ajax({
            url: "/api/authenticate",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            method: "POST",
            data: form.serializeArray(),
            dataType: "JSON",
            beforeSend: function(){
                $('#message').addClass('d-none').html("")
            }
        })
        .done(function(response){
            window.location.href = "/requests"
        })
        .fail(function(response){
            let data = response.responseJSON,
                errores = ""

            $(':input', $(form)).removeClass('is-invalid').addClass('is-valid');
            $('#message').removeClass('d-none').addClass('d-block').html(data.message)
            
            if(errores = data.errors){
                $.each(errores, function(key, item){
                    $(`:input[name=${key}]`, $(form)).removeClass('is-invalid, is-valid').addClass('is-invalid')
                    $(`#${key}-invalid`, $(form)).html(`${item[0]}`)
                })
            }
        })
    }
})

$("#btn-register").on({
    click: function(){
        let form = $(this).parent('form')

        $.ajax({
            url: "/api/users",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            method: "POST",
            data: form.serializeArray(),
            dataType: "JSON",
            beforeSend: function(){
                $('#message').addClass('d-none').html("")
            }
        })
        .done(function(response){
            window.location.href = "/user-confirm"
        })
        .fail(function(response){
            let data = response.responseJSON,
                errores = ""

            $(':input',$(form))
                .removeClass('is-invalid')
                .addClass('is-valid')
            
            $('#message')
                .removeClass('d-none')
                .addClass('d-block')
                .html(data.message)
            
            if(errores = data.errors){
                $.each(errores, function(key, item){
                    $(`:input[name=${key}]`, $(form))
                        .removeClass('is-invalid, is-valid')
                        .addClass('is-invalid')
                    
                    $(`#${key}-invalid`, $(form))
                        .html(`${item[0]}`)
                })
            }
        })
    }
})

