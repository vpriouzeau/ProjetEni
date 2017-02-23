/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function addForm()  {
    var elemParent = document.getElementById("addThemeParent");
    var elem = document.getElementById("form_addTheme");
    var block = document.createElement("div");
    
    if(document.getElementById('formTheme') === null){
        var form = document.createElement("form");
        form.id="formTheme";
        form.action = "web/app_dev.php/staff/test";
        form.method = "get";
        elemParent.insertBefore(form, elem);
        var submit=document.createElement("input");
        submit.type="submit";
        submit.name="valider";
        submit.id="validerTheme";
        document.getElementById("formTheme").appendChild(submit);
    }
    var themeElem = document.getElementById('form_theme');
    var nbQuestion = document.getElementById('form_nbQuestion').value;
    if((document.getElementById("theme"+document.getElementById('form_theme').value)===null) && ((document.getElementById('form_nbQuestion').value.length != 0)&&document.getElementById('form_nbQuestion').value>0)){
        var selectedTheme = themeElem.options[themeElem.selectedIndex].text;
        block.id = "theme"+document.getElementById("form_theme").value;
        var id=document.getElementById('form_theme').value;
        block.innerHTML = "<p>"+selectedTheme+"</p><input type=\"integer\" value=\""+nbQuestion+"\"><button type=\"button\" onClick=\"delForm("+id+")\">X</button>";
        document.getElementById("formTheme").insertBefore(block,document.getElementById("validerTheme")) ;
    }
}

function delForm(id){
    var idSuppElem = document.getElementById("theme"+id);
    document.getElementById("formTheme").removeChild(idSuppElem);
}

function addQuestion()  {
    if(document.getElementById("listQuestions")===null){
        var listQuestion = document.createElement("div");
        listQuestion.id="listQuestions";
        
        document.getElementById("formQuestion").insertBefore(listQuestion, document.getElementById('form_addQuestion'));
    }
    i=document.getElementById('listQuestions').childNodes.length;
    var divQuestion =document.createElement("div");
    divQuestion.id="question"+i;
    divQuestion.className+=" blockQuestion";
    document.getElementById("listQuestions").appendChild(divQuestion);
    divQuestion.innerHTML = "<button class=\"addRep\" type=\"button\" onClick=\"addRep("+i+")\">+</button><button class=\"delQuestion\" type=\"button\" onClick=\"delQuestion("+i+")\">-</button>";
    var labelLibelle = document.createElement("label");
    labelLibelle.innerHTML = "Libelle "+document.getElementById('listQuestions').childNodes.length+" : ";
    labelLibelle.id="libelleQ"+i;
    labelLibelle.className+=" libelleQ";
    divQuestion.appendChild(labelLibelle);
    var txtaQuestion = document.createElement("textarea");
    txtaQuestion.id="txtaQ"+i;
    txtaQuestion.className+=" txtaQ";
    divQuestion.appendChild(txtaQuestion);
    var labelPoid = document.createElement("label");
    labelPoid.innerHTML = "Poid : ";
    labelPoid.id="poidQ"+i;
    labelPoid.className+=" poidQ";
    divQuestion.appendChild(labelPoid);
    var intQuestion = document.createElement("input");
    intQuestion.type="integer";
    intQuestion.value="1";
    intQuestion.id="intQ"+i;
    intQuestion.className+=" intQ";
    divQuestion.appendChild(intQuestion);
    
    
    
}

function delQuestion(id){
    var idSuppElem = document.getElementById("question"+id);
    document.getElementById("listQuestions").removeChild(idSuppElem);
}
function addRep(id) {
    if(document.getElementById("listRep"+id)===null){
        var listRep = document.createElement("div");
        listRep.id="listRep"+id;
        document.getElementById("question"+id).insertBefore(listRep, document.getElementById('addrepQ'+id));
    }
    i=document.getElementById('listRep'+id).childNodes.length;
    var divRep =document.createElement("div");
    divRep.id="rep"+i+"qu"+id;
    divRep.className+=" rep";
    document.getElementById("listRep"+id).appendChild(divRep);
    divRep.innerHTML= "<button class=\"delRep\" type=\"button\" onClick=\"delRep("+i+","+id+")\">-</button>";
    var labelRep = document.createElement("label");
    labelRep.innerHTML = "Reponse "+i+" : ";
    labelRep.id="libelleR"+i;
    labelRep.className+=" libelleR";
    divRep.appendChild(labelRep);
    var txtaR = document.createElement("textarea");
    txtaR.id="txtaR"+i;
    txtaR.className+=" txtaR";
    divRep.appendChild(txtaR);
    var labelCheckRep = document.createElement("label");
    labelCheckRep.innerHTML = "Est Bonne : ";
    labelCheckRep.id="labelleCheckR"+i;
    labelCheckRep.className+=" labelleCheckR";
    divRep.appendChild(labelCheckRep);
    var checkR = document.createElement("input");
    checkR.id="checkR"+i;
    checkR.className+=" checkR";
    checkR.type="checkbox";
    divRep.appendChild(checkR);
}
function delRep(i, id){
    var idSuppElem = document.getElementById("rep"+i+"qu"+id);
    document.getElementById("listRep"+id).removeChild(idSuppElem);
}


