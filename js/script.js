function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)){
        alert("Please only enter numbers from 0 - 9");
        evt.preventDefault();
    }   
}
