class Form {
	constructor(fId, fName, fParentDOM , fClass) { 
	this.formId = fId; 
	this.formName = fName;
	this.formParentDOM = fParentDOM; 
	this.formClass = fClass;
	}
}

// Classe qui permet de créer un formulaire à partir de 0

Form.prototype.formDOM;

Form.prototype.createForm = function()
{
    let divForm = document.createElement('div');
    divForm.className = this.formClass;
    divForm.setAttribute('id', this.formId);
    this.formParentDOM.appendChild(divForm);

    let form = document.createElement('form');
    form.setAttribute('name', this.formName);
    divForm.appendChild(form);
    this.formDOM = form;
};

Form.prototype.createFormLabel = function(LId, LText, LClass)
{
    let elementHTML = document.createElement('label');
    elementHTML.className = LClass;
    elementHTML.setAttribute("id", LId);

    let labelText = document.createTextNode(LText);
    elementHTML.appendChild(labelText);

    this.formDOM.appendChild(elementHTML);
};

Form.prototype.createFormInputText = function(ITId, ITName, ITClass)
{
    let elementHTML = document.createElement('input');
    elementHTML.className = ITClass;
    elementHTML.setAttribute("id", ITId);
    elementHTML.setAttribute("name", ITName);
    elementHTML.setAttribute("type","text");

    this.formDOM.appendChild(elementHTML);
};

Form.prototype.createFormBouton = function(BId, BName, BClass, BValue)
{
    let elementHTML = document.createElement('input');
    elementHTML.className = BClass;
    elementHTML.setAttribute("id", BId);
    elementHTML.setAttribute("name", BName);
    elementHTML.setAttribute("value", BValue);
    elementHTML.setAttribute("type","button");
    
    this.formDOM.appendChild(elementHTML);
};

Form.prototype.createFormBR = function()
{
    var elementHTML = document.createElement('br');
    this.formDOM.appendChild(elementHTML);
};

// Fonction pour créer des éléments d'un formulaire déjà existant
function createLabel(LId, LText, LClass)
{
    let elementHTML = document.createElement('label');
    elementHTML.className = LClass;
    elementHTML.setAttribute("id", LId);

    let labelText = document.createTextNode(LText);
    elementHTML.appendChild(labelText);

    return elementHTML;
}

function createInputText(ITId, ITName, ITClass)
{
    let elementHTML = document.createElement('input');
    elementHTML.className = ITClass;
    elementHTML.setAttribute("id", ITId);
    elementHTML.setAttribute("name", ITName);
    elementHTML.setAttribute("type","text");

    return elementHTML;
}

function createBouton(BId, BName, BClass, BValue)
{
    let elementHTML = document.createElement('input');
    elementHTML.className = BClass;
    elementHTML.setAttribute("id", BId);
    elementHTML.setAttribute("name", BName);
    elementHTML.setAttribute("value", BValue);
    elementHTML.setAttribute("type","button");
    
    return elementHTML;
}

function createBR()
{
    var elementHTML = document.createElement('br');
    return elementHTML;
}