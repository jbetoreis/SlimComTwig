$(function(){
    ListarUsuarios()

    $("body").on("submit", "#form_user", function(e){
        e.preventDefault()
        var dados = $(this).serializeJSON()
        axios.post('/users/insert', dados).then(function(response){
            if(response.status == 200){
                $("#form_user")[0].reset();
                $('#modal_cad_user').modal('hide');
                ListarUsuarios()
            }
        });
    })
    
    function ListarUsuarios(){
        axios.get('/users/show').then(function(response){
            let dados = response.data;
            if(response.status == 200){
                let conteudo = '';
                dados.forEach(valor => {
                    conteudo += '<tr>';
                    conteudo += '<td>' + valor.id + '</td>';
                    conteudo += '<td>' + valor.nome + '</td>';
                    conteudo += '<td>' + valor.email + '</td>';
                    conteudo += '<td><button class="btn btn-primary">Editar</button> <button class="btn btn-danger">Remover</button></td>';
                    conteudo += '</tr>'
                });
                $("#listar_usuarios").html(conteudo)
            }
        });
    }
})