function check(form){
    var flag = 0;
    if(form.name.value == ""){
        document.getElementById("error-name").innerHTML = "名前を入力してください";
        flag = 1;
        // console.log("1");
    }else{
        document.getElementById("error-name").innerHTML ="";
    }
    if(form.kana.value == "" || !form.kana.value.match(/^[ァ-ンヴー]*$/)){
        document.getElementById("error-kana").innerHTML = "カナ文字を入力してください";
        flag = 1;
        // console.log("2");
    }else{
        document.getElementById("error-kana").innerHTML ="";
    }
    var tel = form.tel.value.replace(/[━.*‐.*―.*－.*\-.*ー.*\-]/gi,'');
    if(tel == ""　|| !tel.match(/^[0-9]+$/)){
        document.getElementById("error-tel").innerHTML = "電話番号を入力してください";
        flag = 1;
        // console.log("3");
    }else{
        document.getElementById("error-tel").innerHTML ="";
    }
    if(form.mail.value == "" || !form.mail.value.match(/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
        document.getElementById("error-mail").innerHTML = "メールアドレスを入力してください";
        flag = 1;
        // console.log("4");
    }else{
        document.getElementById("error-mail").innerHTML ="";
    }
    if(flag){
        console.log("false");
        return false;
    }
    console.log("true");
    return true;
}