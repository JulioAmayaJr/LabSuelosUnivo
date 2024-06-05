const Id = document.getElementById("Id").value;
let list1 = [];
let list2 = [];

const divList1 = document.getElementById("list1");
const divList2 = document.getElementById("list2");
const btnSum = document.getElementById("btnSum");
const btnMinus = document.getElementById("btnMinus");
const btnMultiplication = document.getElementById("btnMultiplication");
const btnDivision = document.getElementById("btnDivision");
const deleteAll = document.getElementById("deleteAll");
const addMethod=document.getElementById("addMethod");

document.addEventListener("DOMContentLoaded", () => {
    add(Id);
    renderList();
    attachNumberButtonEvents();
});

const add = (Id) => {
    const url = "http://localhost/LabSuelosUnivo/public/sample/methodId/" + Id;
    fetch(url, {
        method: "GET",
        headers: { "Content-Type": "application/json" }
    })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
        })
        .then(data => {
            data.forEach((element) => {
                list1.push({
                    field: element.data.name_field,
                    selected: element.selected
                });
            });
            renderList();
        })
        .catch(error => {
            console.log(error);
        });
};

let selectedOption = null;

function renderList() {
    let listHtml = '';
    let listHtml2 = '';

    list1.forEach((item, index) => {
        let selectedClass = item.selected ? "selected" : "";
        let d="d-sm-inline-block btn btn-secondary m-1 "
        listHtml += `<div onclick="selectOption('list1', ${index})" class="option ${d} ${selectedClass}" data-value="${item.field}">${item.field}</div>`;
    });

    list2.forEach((item, index) => {
        let selectedClass = item.selected ? "selected" : "";
        let d="d-sm-inline-block"
        let isSign = ['+', '-', '*', '/'].includes(item.field);
        listHtml2 += `<div onclick="${isSign ? '' : `selectOption('list2', ${index})`}" class=" ${d}" data-value="${item.field}">${item.field}</div>`;
    });

    divList1.innerHTML = listHtml;
    divList2.innerHTML = listHtml2;

    
}

function selectOption(listType, optionIndex) {
    list1.forEach((option) => option.selected = false);
    list2.forEach((option) => option.selected = false);

    let list = listType == "list1" ? list1 : list2;
    let item = list[optionIndex];

    if (!['+', '-', '*', '/'].includes(item.field)) {
        item.selected = true;
        selectedOption = {
            listType: listType,
            index: optionIndex
        };
    } else {
        selectedOption = null;
    }

    renderList();
}

function moveH(direction) {
    if (direction === "Down" && selectedOption && selectedOption.listType === "list1") {
        if (list2.length === 0 || ['+', '-', '*', '/'].includes(list2[list2.length - 1].field)) {
            let optionMove = list1[selectedOption.index];
            list2.push(optionMove);
            list1[selectedOption.index].selected = false; 
            renderList();
            return;
        }
    } else if (direction === "Up" && list2.length > 0) {
        let lastElementIndex = list2.length - 1;
        let lastElement = list2[lastElementIndex];
        if (['+', '-', '*', '/'].includes(lastElement.field)) {
            if (lastElementIndex > 0 && ['+', '-', '*', '/'].includes(list2[lastElementIndex - 1].field)) {
                list2.splice(lastElementIndex - 1, 2); 
            } else {
                list2.pop(); 
            }
        } else {
            list2.pop();
        }
        renderList();
        return;
    }
}

btnSum.addEventListener("click", () => {
    addSign('+');
});
btnMinus.addEventListener("click", () => {
    addSign('-');
});
btnMultiplication.addEventListener("click", () => {
    addSign('*');
});
btnDivision.addEventListener("click", () => {
    addSign('/');
});
deleteAll.addEventListener("click", () => {
    list2 = [];
    renderList();
});
const valueMethod=document.getElementById("valueMethod")

addMethod.addEventListener("click", () => {
    const divMethod = document.getElementById("divMethod");
    let methodHtml = '';
    let d="d-sm-inline-block";
    list2.forEach(item => {
        methodHtml += `<div class="${d}">${item.field}</div>`;
    });
    divMethod.innerHTML += methodHtml;
    list2 = [];
    renderList();

    if (valueMethod) {
        list1.push({
            field: valueMethod.value,
            selected: false 
        });
    }
    valueMethod.value=""
    renderList();
});

function addSign(sign) {
    if (list2.length > 0 && ['+', '-', '*', '/'].includes(list2[list2.length - 1].field)) {
        list2[list2.length - 1] = { field: sign, selected: false };
    } else {
        list2.push({ field: sign, selected: false });
    }
    renderList();
}

function attachNumberButtonEvents() {
    document.querySelectorAll('.butt').forEach(button => {
        button.addEventListener('click', () => {
            const value = button.textContent.trim();
            if (!isNaN(value) || value === '.') {
                addNumber(value);
            }
        });
    });
}

function addNumber(value) {
    list2.push({ field: value, selected: false });
    renderList();
}
