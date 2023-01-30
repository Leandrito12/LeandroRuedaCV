let clic = 1;
function show(){
    if(clic == 1){
        document.getElementById('div-form').style.display = 'flex';
        clic = clic + 1;
    } else {
        document.getElementById('div-form').style.display = 'none';
        clic = 1;
    }

};