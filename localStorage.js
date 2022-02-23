function onLoad(){
	var table = document.getElementById('table');
	
    if(table === null) 
        return;

    var key=document.getElementById('key').value;
	localStorage.setItem(key, table.innerHTML);
}

function onChange(inputId){
 	let element=document.getElementById(inputId);
	let key=element.options[element.selectedIndex].text;

    //в mainSelect нас не интересуют другие варианты
	if(inputId == 3 && key != "Task 3")
		return;
	
    var item=localStorage.getItem(key);
	if(item ===null) {
		alert("В local storage ничего не сохранено!");
		return;
	}

	alert("Данные из local storage успешно загружены!");
    document.getElementById('table').innerHTML=item;
}