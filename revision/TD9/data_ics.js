
function date8chiffres() {
    var date = new date();
    var m = date.getMonth()+1;
    var j = date.getDate;
    var a = date.getFullYear;

    return a + ((m < 10) ? '0'+m : m) + ((j < 10) ? '0'+j : j);
}

