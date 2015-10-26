function validateFormStepOne() {
    var date = document.getElementById('datepicker').value;
    var time = document.getElementById('TimeList').value;
    var f = document.getElementById('datepicker');
    var g = document.getElementById('TimeList');
    if (date == null || date == "") {
        f.style.border = "2px solid red";
        return false;
    }else if(time == null || time == "")
    {
        g.style.border = "1px solid red";
        return false;
    }else
    {
        document.getElementById('bookingTwo').submit();
    }
}