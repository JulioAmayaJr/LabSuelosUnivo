const btnSave= document.getElementById("btnSave");
const txtId=document.getElementById("txtId")
const txtName=document.getElementById("txtName")
const divStatus=document.getElementById("divStatus");
const cboStatus=document.getElementById("cboStatus")
const btnNewGroup=document.getElementById("btnNewGroup")
const btnDelete=document.querySelectorAll(".delete-button")

btnNewGroup.addEventListener("click",()=>{
    clearFields()
})

btnSave.addEventListener("click",()=>{
    if(txtId.value==0){
        postData()
    }else if(txtId.value > 0){
        const formData = new FormData();
        formData.append("name", txtName.value);
        formData.append("statu", cboStatus.value);
        

        const url = "http://localhost/LabSuelosUnivo/public/groupSample/update/" + txtId.value;
        fetch(url, {
            method: "POST",
            body: formData
        })
            .then(response => {
                if (response.ok) {
                    location.href = "http://localhost/LabSuelosUnivo/public/groupSample";

                } else {
                    console.log(response);
                }
            }).then(data => {
                if (data === "Se actualizo :D") {
                    location.href = "http://localhost/LabSuelosUnivo/public/groupSample";

                }
                console.log(data)
            })
            .catch(error => {
                console.log(error);
            });
    }
})

function clearFields() {
    txtName.value = "";
    txtId.value = 0;
    divStatus.classList.add("_hidden");
}


btnDelete.forEach(element => {
    element.addEventListener("click", function (event) {
        event.preventDefault();
        const id = element.getAttribute("data-id");
        const name = element.getAttribute("data-name");
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Se eliminara la rama ' + name,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `http://localhost/LabSuelosUnivo/public/groupSample/delete/${id}`;
            }
        });
    });
});

const add = (groupSampleID) => {
    const url = "http://localhost/LabSuelosUnivo/public/groupSample/getById/" + groupSampleID;
    fetch(url, {
        method: "GET",
        headers: { "Content-Type": "application/json" }
    })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {

            }
        })
        .then(data => {
            txtName.value = data.name;
            divStatus.classList.remove("_hidden");
            txtId.value = data.id_group_sample;

            if (data.statu == 1) {
                cboStatus.selectedIndex = 0;
            } else {
                cboStatus.selectedIndex = 1;
            }
        })
        .catch(error => {
            console.log(error);
        });
};

document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll("#tbdata .options button[data-id]");
    buttons.forEach(button => {
        button.addEventListener("click", () => {
            const groupSampleID = button.dataset.id;
            add(groupSampleID);
        });
    });
})


const postData = async () => {
    const formData = new FormData();
    formData.append("name", txtName.value);
    try {
        const response = await fetch("http://localhost/LabSuelosUnivo/public/groupSample/save",
            {
                method: "POST",
                body: formData
            });
        if (response.ok) {
            location.href = "http://localhost/LabSuelosUnivo/public/groupSample/";
        } else {
            console.log("error")
            console.log(response)
        }

    } catch (error) {
        console.log(error)
    }
}