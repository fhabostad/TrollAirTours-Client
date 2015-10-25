function validateFormStepOne() {
    var date = document.getElementById('datepicker').value;
    var time = document.getElementById('TimeList').value;
    if (date == null || date == "") {
        alert("You have to select a date!");
        return false;
    }else if(time == null || time == "")
    {
        alert("You have to select a Time!");
        return false;
    }else
    {
        document.getElementById('bookingTwo').submit();
    }
}