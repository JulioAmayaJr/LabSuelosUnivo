const Id=document.getElementById("Id").value;
let list1=[]
let list2=[]

const divList1=document.getElementById("list1");
const divList2=document.getElementById("list2");

document.addEventListener("DOMContentLoaded",()=>{

add(Id);
renderList();
})

const add = (Id) => {
    const url = "http://localhost/LabSuelosUnivo/public/sample/methodId/" +Id;
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

let selectedOption


function renderList(){
  let listHtml='';
  let listHtml2="";
  list1.forEach((item,index) => {
    let selectedClass=item.selected ? "selected":"";
    listHtml+=`<div onclick="selectOption('list1',${index})" class="option ${selectedClass}" data-value="${item.field}">${item.field}</div>`;
  });
  list2.forEach((item,index) => {
    let selectedClass=item.selected ? "selected":"";
    listHtml2+=`<div onclick="selectOption('list2',${index})" class="option ${selectedClass}" data-value="${item.field}">${item.field}</div>`;
  });

  divList1.innerHTML=listHtml;
  divList2.innerHTML=listHtml2;
}


function selectOption(listType,optionIndex){
  list1.forEach((option) => option.selected=false);

  list1.forEach((option) => {
    option.selected=false
  });
  list2.forEach((option) => {
    option.selected=false
  });

let list=[]

if(listType=="list1"){
  list=list1}
else {list=list2}

list[optionIndex].selected=true
selectedOption={
  listType: listType,
  index: optionIndex
}

renderList();

}

function moveH(direction){
  if(!selectedOption) return false;

  if(direction=="Down"){
    let optionMove=list1.splice(selectedOption.index,1)[0]
    list2.push(optionMove)
  }
  renderList();
}
