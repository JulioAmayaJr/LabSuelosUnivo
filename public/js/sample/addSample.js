const btnAddField=document.getElementById("addField");
const divFields=document.getElementById("divFields");
const divMethod=document.getElementById("divMethod");
const addBadgeButton=document.getElementById("addBadgeButton");
const btnAddSample=document.getElementById("btnAddSample");
const btnAddMethod=document.getElementById("btnAddMethod");

btnAddMethod.addEventListener("click",()=>{
    divMethod.classList.remove("d-none");
})

btnAddField.addEventListener("click",()=>{
    divFields.classList.remove("d-none");
})
let listSample=[]
addBadgeButton.addEventListener("click",()=>{
    const inputValue = document.getElementById('fieldValue').value.trim();
    const badgeContainer=document.getElementById("badgeContainer");

    const badge = document.createElement('span');
    badge.classList.add('badge', 'bg-primary', 'mb-3', 'me-2');
    badge.textContent = inputValue;
    let objectSample={
        name:inputValue,
        typeField: "text"
    }
    
    listSample.push(objectSample)

    const closeButton = document.createElement('button');
    closeButton.classList.add('btn-close');
    closeButton.setAttribute('type', 'button');
    closeButton.setAttribute('aria-label', 'Close');

    closeButton.addEventListener('click', function() {
        badge.remove();
        const index = listSample.findIndex(item => item.name === inputValue);
        if (index !== -1) {
            listSample.splice(index, 1);
        }

    });
            
    badge.appendChild(closeButton);
    badgeContainer.appendChild(badge);
    document.getElementById('fieldValue').value = '';
    divFields.classList.add("d-none");
    console.log(listSample)
})


btnAddSample.addEventListener("click",()=>{
    if(listSample.length>0){
        postData()
        
    }else{
        console.log("Ingrese data")
    }
})


const postData=async()=>{
    console.log(listSample)
    try {
        const response=await fetch("http://localhost/LabSuelosUnivo/public/sample/saveField",
        {
            method: "POST",
            headers:{"Content-Type":"application/json"},
            body:JSON.stringify({ list: listSample })
        });
        if(response.ok){
            const contentType = response.headers.get('content-type');
            if (contentType && contentType.indexOf('application/json') !== -1) {
               
                
            } else {
                console.log("Respuesta no es JSON");
            }
        }else{
            console.log("NOOO")
            console.log(response)
        }

    } catch (error) {
        console.log(error)
    }
}


new MultiSelectTag('countries', {
    rounded: true,    // default true
    shadow: true,      // default false
    placeholder: 'Search',  // default Search...
    tagColor: {
        textColor: '#327b2c',
        borderColor: '#92e681',
        bgColor: '#eaffe6',
    },
    onChange: function(values) {
        console.log(values)
    }
})
 $(".prompt").select2({
         data:content,
         minimumInputLength: 2,
         width: '100%',
         multiple:true,
         placeholder:"Enter First Name",
         templateResult:formatState
 
     });
