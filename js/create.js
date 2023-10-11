let form=document.getElementById('recette-form')
let recette=document.getElementById('recipe')
let info=document.getElementById('test')
let description=document.getElementById('description')
let label=document.getElementById('label')
let desc=document.getElementById('desc')
let insert=document.getElementById('info')
let btns=document.getElementsByClassName('add-btn');
let inputAdd=document.getElementsByClassName('add-input');
let rm_ing_btns=document.getElementsByClassName('rm_ing_btn')
const list=document.getElementById('list-rec')

let cmpt=0;/*Permet de nommer des champs des ingredients avec des indices */
let tag=0;/*Permet de nommer des champs des tags avec des indices */
/*-----------------------Edition des Recettes--------------------------*/


if(recette){
    /*Permet de donner le choix à l'utilisateur d'editer le nom de la recette*/
    recette.classList.add('add-btn')
    recette.addEventListener('click',function (evt){
        info.classList.remove('display')
    })
}
if(description){
    /*Permet de donner le choix à l'utilisateur d'editer la description de la recette*/
    description.classList.add('add-btn')
    description.addEventListener('click',function (evt){
        label.classList.remove('display')
        desc.classList.remove('display')
    })
}
/*Création d'un formulaire qui permet de creer un formulaire pour la creation des recettes et ses élements */
for(let i=0; i<btns.length; i++){

    btns[i].addEventListener('click',function (evt){

        /*----------------------------Input Ingredient--------------------- */
        let div1=document.createElement('div');
        div1.classList.add('form-input');
        div1.classList.add('update');
        let label=document.createElement('label');
        label.innerText='Titre Ingredient '+(cmpt);
        let label_quant=document.createElement('label');
        label_quant.innerText=' Quantité ';
        let input=document.createElement('input');
        let quantity=document.createElement('input');
        let rm_button=document.createElement('button');
        rm_button.classList.add('add-btn');
        rm_button.innerHTML=' Retirer -';/*Creation d'un boutton pour supprimer un champn ajouté*/

        input.type='text';
        input.setAttribute('list','list-rec') /* Attribution d'un idenfiant affecté à une datalist*/
        input.classList.add('verify');
        input.name='ing['+cmpt+']'
        quantity.type='text';
        quantity.name='quantity['+cmpt+']'

        let label_file=document.createElement('label');
        label_file.setAttribute('id','label_file')
        label_file.innerText=' Image Ingredient';
        let file=document.createElement('input');
        file.type='file';
        file.classList.add('rm_file')
        file.name='file-ing['+cmpt+']'
        if(input.name=='ing['+cmpt+']' && btns[i].name=='ing-btn'){
            /*Permet de verifier si le button clicqué est celui de l'ingredient
             et incremente son compteur*/
            file.name='file-ing['+cmpt+']'
            cmpt++;
        }
        div1.appendChild(label)
        div1.appendChild(input)
        div1.appendChild(label_quant)
        div1.appendChild(quantity)
        div1.appendChild(label_file)
        div1.appendChild(file)
        div1.appendChild(rm_button)
        rm_button.addEventListener('click',function (evt){
            /*Ajout d'un ecouteur pour supprimer le champ coorespondant au bouton*/
            div1.remove();
        })

        /*----------------------------Input Tag--------------------- */
        let div2=document.createElement('div');
        div2.classList.add('form-input');
        div2.classList.add('form-input');
        let label2=document.createElement('label');
        label2.innerText='Title Tag '+tag;
        let input2=document.createElement('input');
        input2.type='text';
        input2.name='tag['+tag+']'
        let label_tag=document.createElement('label');
        if(input2.name=='tag['+tag+']' && btns[i].name=='tag-btn'){
            /*Permet de verifier si le button clicqué est celui des tags
             et incremente son compteur*/
            tag++;
        }
        div2.appendChild(label2)
        div2.appendChild(input2)
        div2.appendChild(label_tag)
        let array=[];
        array.push(div1)
        array.push(div2)
        insert.appendChild(array[i]);
        /*Verification des ingredients existant dans la base de donné et suppression des champs redondants*/
        let verify=insert.querySelectorAll('.update .verify')
        let rm=insert.querySelectorAll('.update .rm_file')
        let rm_label=insert.querySelectorAll('.update #label_file')

        for(let i=0; i<verify.length; i++){
            verify[i].addEventListener('keyup',function (evt){
                let optionTrouvee = false;
                for (let j = 0; j < list.options.length; j++) {
                    //Comparaison de la valeur saisie aux elements de la datalist qui est la liste des ingredients
                    if (list.options[j].value === verify[i].value) {
                        optionTrouvee = true;
                        break;
                    }
                }
                if (optionTrouvee){
                    /*Si la avleur saisie existe dans la BDD alors on cache le champ d'insersion d'image*/

                    rm[i].classList.add('display');
                    rm_label[i].classList.add('display')

                } else {
                    /*Sinon on le reaffiche*/
                    rm[i].classList.remove('display');
                    rm_label[i].classList.remove('display')
                }


                //console.log()
            })
        }

    })
}





