const btnAddField=document.getElementById("btnSave");
const divFields=document.getElementById("divFields");
const divMethod=document.getElementById("divMethod");
const addBadgeButton=document.getElementById("btnSave");
const btnAddSample=document.getElementById("btnAddSample");
const idUser=document.getElementById("idUser").value
const modalData=document.getElementById("modalData")
const nameSample=document.getElementById("nameSample")
const nameRule=document.getElementById("nameRule")
const cboGroupSample=document.getElementById("cboGroupSample")


let listSample=[]
addBadgeButton.addEventListener("click",()=>{

    const inputValue = document.getElementById('fieldValue').value.trim();
    const badgeContainer=document.getElementById("badgeContainer");
    const typeField=document.getElementById("typeField")

    const badge = document.createElement('span');
    badge.classList.add('badge','mt-1' ,'bg-primary', 'mb-3', 'me-2');
    badge.textContent = inputValue;
    let objectSample={
        name:inputValue,
        typeField: typeField.value
    }

    listSample.push(objectSample)

    $("#modalData").modal('hide');

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
    clearField();
    console.log(listSample)
})

function clearField(){
  document.getElementById('fieldValue').value = '';
  document.getElementById('typeField').value = '';
}

btnAddSample.addEventListener("click",()=>{
    if(listSample.length>0 && nameSample.value !="" && nameRule.value !="" && cboGroupSample.value>0){
        postData()

    }else{
      Toastify({

      text: "No deje campos vacios, por favor!",

      duration: 3000

      }).showToast();


    }
})


const postData=async()=>{
    console.log(listSample)
    console.log(idUser)
    console.log(nameSample.value)
    console.log(nameRule.value)
    console.log(cboGroupSample.value)
        const response=await fetch("http://localhost/LabSuelosUnivo/public/sample/saveField",
        {
            method: "POST",
            headers:{"Content-Type":"application/json"},
            body:JSON.stringify({ list: listSample, idUser: idUser,nameSample: nameSample.value, nameRule: nameRule.value,id_group_sample:cboGroupSample.value })
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {

            }
        }).then(data => {
          location.href="http://localhost/LabSuelosUnivo/public/sample/method/"+data.ID
    })
    .catch(error => {
        console.log(error);
    });
}
