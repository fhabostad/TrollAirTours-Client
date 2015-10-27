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
function validateStepOneCustom() {
    var destination = document.getElementById('input-grow').value;
    var date = document.getElementById('date').value;
    var time = document.getElementById('time').value;   
    var guide = document.getElementById('DropdownGuide').value;
    var h = document.getElementById('input-grow');
    var f = document.getElementById('date');
    var g = document.getElementById('time');
    var j = document.getElementById('DropdownGuide');
    
    if (destination == null || destination == "") {
        h.style.border = "2px solid red";
        return false;
    }if (date == null || date == "") {
        f.style.border = "2px solid red";
        return false;
    }else if(time == null || time == "")
    {
        g.style.border = "2px solid red";
        return false;
    }if (guide == null || guide == "") {
        j.style.border = "2px solid red";
        return false;
    }
    else
    {
        document.getElementById('bookingStepOneCustom').submit();
    }
}
function validateBookingCustom() {
    var company = document.getElementById('Company').value;
    var firstname = document.getElementById('Firstname').value;
    var lastname = document.getElementById('Lastname').value;
    var email = document.getElementById('Email').value;
    var phonenumber = document.getElementById('Phonenumber').value;
    
    var f = document.getElementById('Company');
    var g = document.getElementById('Firstname');
    var h = document.getElementById('Lastname');
    var j = document.getElementById('Email');
    var k = document.getElementById('Phonenumber');
    
    if (company == null || company == "") {
        f.style.border = "2px solid red";
        return false;
    }else if(firstname == null || firstname == "") {
        g.style.border = "2px solid red";
        return false;
    }else if(lastname == null || lastname == "")
    {
        h.style.border = "2px solid red";
        return false;
    }else if(email == null || email == "")
    {
        j.style.border = "2px solid red";
        return false;
    }else if(phonenumber == null || phonenumber == "")
    {
        k.style.border = "2px solid red";
        return false;
    }else
    {
        document.getElementById('bookingSummary').submit();
    }
}