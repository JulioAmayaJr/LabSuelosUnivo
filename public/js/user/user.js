const btnEdit = document.querySelectorAll('#btnEdit');
const btnNewUser = document.getElementById('btnNewUser');
const txtFullName = document.getElementById("txtFullName");
const cboRol = document.getElementById('cboRol');
const imgUser = document.getElementById('imgUser');
const divStatus = document.getElementById("divStatus");
const cboStatus = document.getElementById("cboStatus");
const btnSave = document.getElementById("btnSave");
const txtId = document.getElementById("txtId");
const txtImage = document.getElementById("txtImage");


const add = (e) => {
    const userId = e.target.dataset.id
    console.log(userId);
    getData(userId);
}


btnEdit.forEach((boton) => boton.addEventListener("click", add))

btnSave.addEventListener('click', () => {
    if (txtId.value == 0) {
        //Llamando al metodo post
        postData();
    } else if (txtId.value == 1) {
        getData();

    }
});

//Limpiar campos
function clearFields() {
    txtFullName.value = "";
    cboRol.value = "-- Seleccione un cargo --";
    imgUser.src = "https://images.unsplash.com/photo-1519648023493-d82b5f8d7b8a?w=300";
    txtId.value = 0;
    divStatus.classList.add("_hidden");
}

btnNewUser.addEventListener('click', () => {
    clearFields();
});

function validate() {
    if (txtFullName != "" && cboRol.value != "") {
        formData.append("name", txtFullName.value);
        formData.append("id_rol", cboRol.value);
        formData.append("image", txtImage.files[0]);
        return true;
    } else {
        return false;

    }
}

const postData = async () => {
    const formData = new FormData();
    console.log(formData)
    console.log(txtImage.files[0])
    formData.append("name", txtFullName.value);
    formData.append("id_rol", cboRol.value);
    formData.append("image", txtImage.files[0]);
    try {
        const response = await fetch("http://localhost/LabSuelosUnivo/public/user/save",
            {
                method: "POST",

                body: formData
            });
        if (response.ok) {
            location.href = "http://localhost/LabSuelosUnivo/public/user/";
        } else {
            console.log("NOOO")
            console.log(response)
        }

    } catch (error) {
        console.log(error)
    }
}

const getData = async (userId) => {
    try {
        const response = await fetch("http://localhost/LabSuelosUnivo/public/user/getById/" + userId,
            {
                method: "GET",
                headers: { "Content-Type": "application/json" }
            });
        if (response.ok) {
            const contentType = response.headers.get('content-type');
            if (contentType && contentType.indexOf('application/json') !== -1) {
                const data = await response.json();

                txtFullName.value = data.full_name;
                cboRol.value = data.id_rol;
                txtId.value = data.id_user;
                imgUser.src = "img/" + data.image;
                divStatus.classList.remove("_hidden");

                if (data.status == 1) {

                    cboStatus.selectedIndex = 0
                } else {
                    cboStatus.selectedIndex = 1
                }

            } else {
                console.log("Respuesta no es JSON");
            }
        } else {
            console.log("NOOO")
            console.log(response)
        }

    } catch (error) {
        console.log(error)
    }
}



