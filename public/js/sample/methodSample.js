const Id=document.getElementById("Id").value;

const add = (Id) => {
    const url = "http://localhost/LabSuelosUnivo/public/sample/methodID/" +Id;
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
            txtUserName.value = data.user_name;

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
