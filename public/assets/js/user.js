$(function(){
    $("body").on("submit", "#form_user", function(e){
        e.preventDefault()
        var dados = $(this).serializeJSON()
        axios({
            method: "post",
            url: "/users/insert",
            data: JSON.stringify(dados),
          });
    })
})