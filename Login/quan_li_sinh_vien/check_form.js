let checkForm = () =>{
    
    let erro = false
    //checkID
    let id = document.getElementById('id').value
    let regexId =/\d{6}/i;
    if (id.length == 0) {
        document.getElementById('erroID').innerHTML="学生番号を入力しください"
        erro = true;
    }else if(!regexId.test(id)){
        document.getElementById('erroID').innerHTML="学生番号が6数字入力しください"
        erro = true;
    }else{
        document.getElementById('erroID').innerHTML=""
    } 
    //checkName
    let name = document.getElementById('name').value
    let regexName=/^[a-zA-Z ]+$/;    
    if (name.length == 0) {
        document.getElementById('erroName').innerHTML="名前を入力しください"
        erro = true;
    }else if(!regexName.test(name)){
        document.getElementById('erroName').innerHTML="名前がふさわしくない"
        erro = true;
    }else{
        document.getElementById('erroName').innerHTML=""
    }
    //checkType
    let type =document.getElementsByName('type')
    let checkType = false
    for (let index = 0; index < type.length; index++) {
        if (type[index].checked) {
            checkType = true
        }     
    }
    if (!checkType) {
        document.getElementById('erroType').innerHTML=` 性別を選んでください`
        erro = false
        
    }else{
        document.getElementById('erroType').innerHTML=""
    }
    //checkDate
    let checkDate = document.getElementById('date').value
    console.log(checkDate)
    let year = checkDate.split('-')[0]
    if (checkDate.length == 0) {
        document.getElementById('erroDate').innerHTML=` 誕生日を入力しください`
        erro = true;
    }else if(year<1989 || year>2020 ) {
        document.getElementById('erroDate').innerHTML=` 誕生日がふさわしくない`
        erro = true;
    }else{
        document.getElementById('erroDate').innerHTML=""
    } 
    //checkContact 
    let contact =  document.getElementById('contact').value 
    if (contact.length == 0) {
        document.getElementById('erroContact').innerHTML=` 連絡アドレスを入力しください`
        erro = true;
    }else{
        document.getElementById('erroContact').innerHTML=""
    }
    if (erro) {
        return false;
    }
}