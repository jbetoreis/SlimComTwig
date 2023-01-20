$(function () {
    ListarUsuarios()

    $("body").on("click", "#listar_usuarios .btn_edit_user", function (e) {
        let id = $(this).attr('id')
        preencher_formulario(id)
    })

    $("body").on("submit", "#form_edit_user", function (e) {
        e.preventDefault()
        var dados = $(this).serializeJSON()
        axios.put('/users/update/' + dados.user_id, dados).then(function (response) {
            if (response.status == 200) {
                $('#form_edit_user')[0].reset();
                $('#modal_edit_user').modal('hide');
                toastr.success('Sucesso ao realizar a operação')
                ListarUsuarios()
            }else if(response.status == 404){
                toastr.info('Registro não encontrado')
            }
        });
    })

    function preencher_formulario(id) {
        axios.get('/users/show/' + id).then(function (response) {
            let dados = response.data;
            if (response.status == 200) {
                let conteudo = '';
                dados.forEach(valor => {
                    $("#form_edit_user input[name='user_nome']").val(valor.nome)
                    $("#form_edit_user input[name='user_email']").val(valor.email)
                    $("#form_edit_user input[name='user_id']").val(valor.id_enc)
                });
            }
        });
    }

    $("body").on("submit", "#form_cad_user", function (e) {
        e.preventDefault()
        var dados = $(this).serializeJSON()
        axios.post('/users/insert', dados).then(function (response) {
            if (response.status == 200) {
                $("#form_cad_user")[0].reset();
                $('#modal_cad_user').modal('hide');
                toastr.success('Sucesso ao realizar a operação')
                let conteudo = '<tr>'
                conteudo += '<td>' + response.data.id + '</td>'
                conteudo += '<td>' + dados.user_nome + '</td>'
                conteudo += '<td>' + dados.user_email + '</td>'
                conteudo += '<td><button class="btn btn-primary btn_edit_user" data-bs-toggle="modal" data-bs-target="#modal_edit_user" id="' + response.data.id_enc + '">Editar</button> <button class="btn btn-danger btn_del_user" id="' + response.data.id_enc + '">Remover</button></td>';
                conteudo += '</tr>'
                $("#listar_usuarios").append(conteudo)
            }
        });
    })

    $("body").on("click", "#listar_usuarios .btn_del_user", function (e) {
        var apagar = confirm('Deseja realmente apagar este registro?');
        if (apagar) {
            let id = $(this).attr('id')
            axios.delete('/users/delete/' + id).then(function (response) {
                if (response.status == 200) {
                    toastr.success('Sucesso ao realizar a operação')
                    ListarUsuarios()
                }else if(response.status == 404){
                    toastr.info('Registro não encontrado')
                }
            });
        }
    })

    function ListarUsuarios() {
        axios.get('/users/show/all').then(function (response) {
            let dados = response.data;
            if (response.status == 200) {
                let conteudo = '';
                dados.forEach(valor => {
                    conteudo += '<tr>';
                    conteudo += '<td>' + valor.id + '</td>';
                    conteudo += '<td>' + valor.nome + '</td>';
                    conteudo += '<td>' + valor.email + '</td>';
                    conteudo += '<td><button class="btn btn-primary btn_edit_user" data-bs-toggle="modal" data-bs-target="#modal_edit_user" id="' + valor.id_enc + '">Editar</button> <button class="btn btn-danger btn_del_user" id="' + valor.id_enc + '">Remover</button></td>';
                    conteudo += '</tr>'
                });
                $("#listar_usuarios").html(conteudo)
            }
        });
    }
})