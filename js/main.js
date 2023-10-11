    let enter=document.getElementById('in');
    let out=document.getElementById('out');
    let hidden=document.getElementById('hidden')
    let injected=document.getElementById('main')
    let check=document.getElementsByClassName('check')
    let check_ing=document.getElementsByClassName('check-ing')
    let ingredient=document.getElementById('ingredient-content')
    let contain=document.getElementById('back')
    let contain_ing=document.getElementById('back-ing')
    let form=document.getElementById('form')
    let form_ing=document.getElementById('form-ing')
    let recipe=document.getElementById('display-recipe')
    let ed_title=document.getElementById('ed_title')
    let ed_image=document.getElementById('ed_img')
    let ed_desc=document.getElementById('ed_des')
    let ed_quan=document.getElementById('ed_quan_ing')
    let ed_title_ing=document.getElementById('ed_title_ing')
    let ed_image_img=document.getElementById('ed_img_ing')
    let check_recipe=document.getElementsByClassName('check-recipe')
    let count=0;


    enter.addEventListener('click',function (evt){
        if(evt.currentTarget==enter){
            enter.classList.add('display')
            hidden.classList.remove('display')
            hidden.classList.add('hid')
            hidden.classList.add('anim')
            out.classList.remove('display')
            out.classList.add('anim');
        }
    })

    out.addEventListener('click',function (evt){
        if(evt.currentTarget==out){
            hidden.classList.add('display')
            hidden.classList.remove('hid')
            out.classList.add('display')
            enter.classList.remove('display')
            enter.classList.add('anim')
        }
    })

    injected.addEventListener('click',function (evt){
        if(evt.currentTarget==injected){
            hidden.classList.add('anim')
            hidden.classList.remove('hid')
            hidden.classList.add('display')
            enter.classList.remove('display')
            enter.classList.add('anim')
            out.classList.add('display')
        }

    })



    let div=document.createElement('div')
    ed_title_ing.addEventListener('click',function (event){
        let label=document.createElement('label')
        label.innerText='Ingredient ';
        let input=document.createElement('input')
        input.type='text'
        input.name='title-ing'
        div.appendChild(label)
        div.appendChild(input)
        ed_title_ing.disabled=true
    })
    ed_image_img.addEventListener('click',function (event){
        let label_file=document.createElement('label')
        label_file.innerText='Image';
        let input_file=document.createElement('input');
        input_file.type='file';
        input_file.name='file-ing'
        div.appendChild(label_file)
        div.appendChild(input_file)
        ed_image_img.disabled=true
    })
    ed_quan.addEventListener('click',function (event){
        let label_file=document.createElement('label')
        label_file.innerText='Quantity';
        let input_file=document.createElement('input');
        input_file.type='text';
        input_file.name='quantity-ing'
        div.appendChild(label_file)
        div.appendChild(input_file)
        ed_quan.disabled=true
    })

    contain_ing.appendChild(div)

    form_ing.classList.add('enter')
    form_ing.classList.add('center')
    form_ing.classList.remove('display')
    


