const Id = document.getElementById("Id").value;
let list1 = [];
let list2 = [];

const divList1 = document.getElementById("list1");
const divList2 = document.getElementById("list2");
const btnSum = document.getElementById("btnSum");
const btnMinus = document.getElementById("btnMinus");
const btnMultiplication = document.getElementById("btnMultiplication");
const btnDivision = document.getElementById("btnDivision");

document.addEventListener("DOMContentLoaded", () => {
    add(Id);
    renderList();
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
        listHtml += `<div onclick="selectOption('list1', ${index})" class="option ${selectedClass}" data-value="${item.field}">${item.field}</div>`;
    });

    list2.forEach((item, index) => {
        let selectedClass = item.selected ? "selected" : "";
        let isSign = ['+', '-', '*', '/'].includes(item.field);
        listHtml2 += `<div onclick="${isSign ? '' : `selectOption('list2', ${index})`}" class="option ${selectedClass}" data-value="${item.field}">${item.field}</div>`;
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
    if (!selectedOption) return false;

    if (direction == "Down" && selectedOption.listType == "list1") {

        if (list2.length === 0 || ['+', '-', '*', '/'].includes(list2[list2.length - 1].field)) {
            let optionMove = list1.splice(selectedOption.index, 1)[0];
            list2.push(optionMove);
            selectedOption = {
                index: list2.length - 1,
                listType: 'list2'
            };
        }
    } else if (direction == "Up" && selectedOption.listType == "list2") {
        let optionMove = list2.splice(selectedOption.index, 1)[0];
        list1.push(optionMove);
        selectedOption = {
            index: list1.length - 1,
            listType: 'list1'
        };


        if (selectedOption.index > 0 && ['+', '-', '*', '/'].includes(list2[selectedOption.index - 1]?.field)) {
            list2.splice(selectedOption.index - 1, 1);
            selectedOption.index -= 1;
        }
    }

    renderList();
}


btnSum.addEventListener("click", () => {
  addSign('+')
});
btnMinus.addEventListener("click", () => {
  addSign('-')
});
btnMultiplication.addEventListener("click", () => {
  addSign('*')
});
btnDivision.addEventListener("click", () => {
  addSign('/')
});


function addSign(sign) {

    if (list2.length > 0 && ['+', '-', '*', '/'].includes(list2[list2.length - 1].field)) {
        list2[list2.length - 1] = { field: sign, selected: false };
    } else {
        list2.push({ field: sign, selected: false });
    }
    renderList();
}
