const selectSample=document.getElementById("selectSample");
const btnSaveSample=document.getElementById("btnSaveSample");
const selectProject=document.getElementById("selectProject");
var list=[]
var id_sample
document.addEventListener("DOMContentLoaded",()=>{
    
        setTimeout(function() {
            $('#selectSample').select2();
            $('#selectProject').select2();
        }, 500);
        
        $('#selectSample').on('select2:select', function (e) {
            var id = e.params.data.id; 
            console.log("La opción seleccionada es: " + id);
            getFields(id);
            id_sample = id;
        });
    
})

selectSample.addEventListener("change",(e)=>{
    console.log("la opcion seleccionada es: "+e.target.value)
    getFields(e.target.value);
    id_sample=e.target.value
})
btnSaveSample.addEventListener("click",()=>{
    const inputContainer = document.getElementById("input-container");
    const inputs = inputContainer.querySelectorAll("input");

    inputs.forEach(input => {
        list.push({
            id_field: input.id,
            name_field: input.name,
            value_field: input.value,
            type_field: input.type
        });
    });
    list.push();
    postData();

})

const getFields=async(id)=>{
    const formData = new FormData();
    formData.append("id_sample", id);

        const response=await fetch("http://localhost/LabSuelosUnivo/public/samples/getFields",
        {
            method: "POST",
            body:formData
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {

            }
        }).then(data => {
            createInputs(data.result);
            

    })
    .catch(error => {
        console.log(error);
    });
}

const createInputs = (fields) => {
    const inputContainer = document.getElementById("input-container");
    inputContainer.innerHTML = ""; 

    fields.forEach(field => {
        const inputWrapper = document.createElement("div");
        inputWrapper.classList.add("input-wrapper","m-2");
      

        const label = document.createElement("label");
        label.htmlFor = field.id_field;
        label.innerText = field.name_field;
        label.className="form-label";

        const input = document.createElement("input");
        input.type = field.type_field.toLowerCase();
        input.id = field.id_field;
        input.name = field.name_field;
        input.value = field.value_field;
       
        input.classList.add("form-control");


       console.log(input.className);

        inputWrapper.appendChild(label);
        inputWrapper.appendChild(input);
        inputContainer.appendChild(inputWrapper);
    });
};

const postData = async () => {
    console.log("List:", list);
    console.log("ID Sample:", id_sample);

    const formData = new FormData();
    formData.append("listField", JSON.stringify(list));  
    formData.append("id_sample", id_sample);
    formData.append("id_project",selectProject.value);

    console.log("FormData:", formData);

    fetch("http://localhost/LabSuelosUnivo/public/samples/save", {
        method: "POST",
        body: formData
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        }
    })
    .then(data => {
        if (data.result) {
            Toastify({
                text: "Se agregó correctamente",
                duration: 3000
            }).showToast();
            
            // Recargar la página después de 3 segundos (3000 milisegundos)
            setTimeout(function() {
                window.location.reload();
            }, 3000);
         }
        
    })
    .catch(error => {
        console.error('Fetch error:', error);
    });
};


