$(function(){
    $("body").on("click", "#buscar_mensagem", function(e){
        axios.get("/msg").then((response) => {
            console.log("Teste")
        })
    })
})