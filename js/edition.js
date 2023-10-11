    let yellow=document.getElementById('yellow')
    let check=document.getElementsByClassName('check')
    let contain=document.getElementById('back')
    let enter=document.getElementById('in');

    yellow.addEventListener('click',function (evt){
        for(let i=0; i<check.length; i++){
            if(check[i].checked){
                let div=document.createElement('div')
                let label=document.createElement('label')
                label.innerText='Recette ';
                let input=document.createElement('input')
                input.type='text'
                input.name='rec_modif'

                let label_file=document.createElement('label')
                label_file.innerText='Image';

                let file=document.createElement('input');
                file.type='file';
                file.name='file-recipe'

                div.appendChild(label)
                div.appendChild(input)
                div.appendChild(label_file)
                div.appendChild(file)
                contain.appendChild(div)
                check[i].checked=false;
            }
        }
        let input_desc=document.createElement('textarea')
        let label2=document.createElement("label")
        label2.innerText='Description'
        input_desc.name='modif_desc'
        contain.appendChild(label2)
        contain.appendChild(input_desc)
        form.classList.add('enter')
        form.classList.add('center')
        form.classList.remove('display')

    })