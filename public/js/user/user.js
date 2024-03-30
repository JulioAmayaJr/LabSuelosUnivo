
const btnNewUser = document.getElementById('btnNewUser');
const txtFullName = document.getElementById("txtFullName");
const cboRol = document.getElementById('cboRol');
const imgUser = document.getElementById('imgUser');
const divStatus = document.getElementById("divStatus");
const cboStatus = document.getElementById("cboStatus");
const btnSave = document.getElementById("btnSave");
const txtId = document.getElementById("txtId");
const txtImage = document.getElementById("txtImage");
const btnDelete = document.querySelectorAll(".delete-button");

const add = (userId) => {
    const url = "http://localhost/LabSuelosUnivo/public/user/getById/" + userId;
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
            txtFullName.value = data.full_name;
            cboRol.value = data.id_rol;
            txtId.value = data.id_user;
            imgUser.src = "img/" + data.image;
            divStatus.classList.remove("_hidden");

            if (data.status == 1) {
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
            const userId = button.dataset.id;
            add(userId);
        });
    });
})



btnSave.addEventListener('click', () => {

    if (txtId.value == 0) {
        //Bloque para la creacion de un usuario
        postData();

    } else if (txtId.value > 0) {
        //Bloque para la modificacion de un usuario

        const formData = new FormData();
        formData.append("name", txtFullName.value);
        formData.append("id_rol", cboRol.value);
        formData.append("image", txtImage.files[0]);
        formData.append("status", cboStatus.value);

        const url = "http://localhost/LabSuelosUnivo/public/user/update/" + txtId.value;
        fetch(url, {
            method: "POST",
            body: formData
        })
            .then(response => {
                if (response.ok) {
                    location.href = "http://localhost/LabSuelosUnivo/public/user";

                } else {
                    console.log(response);
                }
            }).then(data => {
                if (data === "Se actualizo :D") {
                    location.href = "http://localhost/LabSuelosUnivo/public/user";

                }
                console.log(data)
            })
            .catch(error => {
                console.log(error);
            });
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

btnDelete.forEach(element => {
    element.addEventListener("click", function () {
        event.preventDefault();
        const id = element.getAttribute("data-id");
        const nombre = element.getAttribute("data-nombre");
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Se eliminara el usuario ' + nombre,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `http://localhost/LabSuelosUnivo/public/user/delete/${id}`;
            }
        });
    });
});

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




