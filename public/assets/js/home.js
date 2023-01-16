$(function(){
    $("body").on("click", "#buscar_mensagem", function(e){
        axios.get("/home/msg").then((response) => {
            console.log("Teste")
        })
    })
})