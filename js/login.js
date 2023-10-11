
const MAX_LENGTH = 6
document.addEventListener('DOMContentLoaded', function (){

    // Recupération des  message
    let msg = document.getElementById("message")
    let pwd=document.getElementsByName('pwd')
    let user=document.getElementsByName('user')
    // Recupération du formulaire
    let form = document.getElementById("form-control01")

    // enregistrement dans le gestionnaire d'évènements 'submit'
    form.addEventListener('submit', function (event){
        event.preventDefault()
        // vérifications
        if(form.user.value == "" ){
            msg.innerHTML = "Le login ne doit pas être vide!"
        }else if(form.pwd.value.length < MAX_LENGTH){
            msg.innerHTML = "Le mot de passe doit avoir au moins " + MAX_LENGTH + " caractères !"
        }
        else if(form.user.value.length<MAX_LENGTH){
            msg.innerHTML = "Le Login doit avoir au moins " + MAX_LENGTH + " caractères !"
        }else{
            // les champs sont ok : on peut soumettre le formulaire
            form.submit()
            msg.innerHTML = ""
        }

    })
})