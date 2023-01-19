$(function(){
    $("body").on("submit", "#form_user", function(e){
        e.preventDefault()
        var dados = $(this).serializeJSON()
        axios.post('/users/insert', dados).then(function(response){
            if(response.status == 200){
                
            }
        });
    })
})