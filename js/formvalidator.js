function validateFormStepOne() {
 
    var date = document.getElementById('datepicker').value;
    var time = document.getElementById('TimeList').value;
    var f = document.getElementById('datepicker');
    //f.style.border = "2px solid green";
    var g = document.getElementById('TimeList');
    //g.style.border = "2px solid green";
    if (date == null || date == "") {
        f.style.border = "2px solid red";
        return false;
    }
    if(time == null || time == "")
    {
        g.style.border = "1px solid red";
        return false;
    }else
    {
        document.getElementById('bookingTwo').submit();
    }
    
}
function validateFormStepThree() {
    var valid = true;
//    var gender = document.getElementById('Gender').value;
    var firstname = document.getElementById('Firstname').value;
    var birthdate = document.getElementById('Birthdate').value;
    var city = document.getElementById('City').value;
    var zipcode = document.getElementById('Zipcode').value;
    var countrycode = document.getElementById('Countrycode').value;
    var lastname = document.getElementById('Lastname').value;
    var country = document.getElementById('Country').value;
    var streetaddress = document.getElementById('Streetaddress').value;
    var email = document.getElementById('Email').value;
    var phonenumber = document.getElementById('Phonenumber').value;

//    var f = document.getElementById('Gender');

    var g = document.getElementById('Firstname');
    g.style.border = "2px solid green";
    var h = document.getElementById('Birthdate');
    h.style.border = "2px solid green";   
    var j = document.getElementById('City');
    j.style.border = "2px solid green";
    var k = document.getElementById('Zipcode');
    k.style.border = "2px solid green";
    var l = document.getElementById('Countrycode');
    l.style.border = "2px solid green";
    var m = document.getElementById('Lastname');
    m.style.border = "2px solid green";
    var p = document.getElementById('Country');
    p.style.border = "2px solid green";
    var q = document.getElementById('Streetaddress');
    q.style.border = "2px solid green";
    var r = document.getElementById('Email');
    r.style.border = "2px solid green";
    var s = document.getElementById('Phonenumber');
    s.style.border = "2px solid green";
//    if (gender == null || gender == "") {
//        f.style.border = "2px solid green";
//        valid = false;
//    } 
    if(firstname == null || firstname == "")
    {
        g.style.border = "2px solid red";
        valid = false;
    } 
    if(birthdate == null || birthdate == "")
    {
        h.style.border = "2px solid red";
        valid = false;
    } 
    if(city == null || city == "")
    {
        j.style.border = "2px solid red";
        valid = false;
    } 
    if(zipcode == null || zipcode == ""){
        k.style.border = "2px solid red";
        valid = false;
    }
    if(countrycode == null || countrycode == "")
    {
        l.style.border = "2px solid red";
        valid = false;
    } 
    if(lastname == null || lastname == "")
    {
        m.style.border = "2px solid red";
        valid = false;
    } 
    if(country == null || country == "")
    {
        p.style.border = "2px solid red";
        valid = false;
    } 
    if(streetaddress == null || streetaddress == "")
    {
        q.style.border = "2px solid red";
        valid = false;
    } 
    if(email == null || email == "")
    {
        r.style.border = "2px solid red";
        valid = false;
    } 
    if(phonenumber == null || phonenumber == "")
    {
        s.style.border = "2px solid red";
        valid = false;
    }else
    {
        document.getElementById('bookingstepthreeform').submit();
    }
    return valid;
}
function validateStepOneCustom() {
    var valid = true;
    var destination = document.getElementById('input-grow').value;
    var date = document.getElementById('date').value;
    var time = document.getElementById('time').value;   
//    var guide = document.getElementByID('DropdownGuide');
    var h = document.getElementById('input-grow');
    h.style.border = "2px solid green";
    var f = document.getElementById('date');
    f.style.border = "2px solid green";
    var g = document.getElementById('time');
    g.style.border = "2px solid green";
    var i = 0;
//    var selectedguide = guide.options[i].selected;
   

    
    
    if (destination == null || destination == "") {
        h.style.border = "2px solid red";
        valid = false;
    }
    if (date == null || date == "") {
        f.style.border = "2px solid red";
        valid = false;
    }
    if(time == null || time == "")
    {
        g.style.border = "2px solid red";
        valid = false;
    }
//    if(selectedguide > 0)
//    {   
//        guide.style.border = "2px solid red";   
//    }
    else
    {
        document.getElementById('bookingStepOneCustom').submit();
        
    }
    return valid;
}

function validateBookingCustom() {
    var valid = true;
    var company = document.getElementById('Company').value;
    var firstname = document.getElementById('Firstname').value;
    var lastname = document.getElementById('Lastname').value;
    var email = document.getElementById('Email').value;
    var phonenumber = document.getElementById('Phonenumber').value;
    
    var f = document.getElementById('Company');
    f.style.border = "2px solid green";
    var g = document.getElementById('Firstname');
    g.style.border = "2px solid green";
    var h = document.getElementById('Lastname');
    h.style.border = "2px solid green";
    var j = document.getElementById('Email');
    j.style.border = "2px solid green";
    var k = document.getElementById('Phonenumber');
    k.style.border = "2px solid green";
    
    if (company == null || company == "") {
        f.style.border = "2px solid red";
        valid = false;
    }
    if(firstname == null || firstname == "") {
        g.style.border = "2px solid red";
        valid = false;
    }
    if(lastname == null || lastname == "")
    {
        h.style.border = "2px solid red";
        valid = false;
    }
    if(email == null || email == "")
    {
        j.style.border = "2px solid red";
        valid = false;
    }
    if(phonenumber == null || phonenumber == "")
    {
        k.style.border = "2px solid red";
        valid = false;
    }else
    {
        document.getElementById('bookingSummary').submit();
    }
}

function validateSeatReservation()
{
    var valid = false;
    for (i=1; i<7 ; i++ ) 
    {
        if(document.getElementById("A" + i).checked)
        {       
            valid = true;
        }

        
        if(document.getElementById("B" + i).checked)
        {
            valid = true;
        }
        
    }
    if(valid)
    {
        document.getElementById("bookingstepTwoForm").submit();
    }else{
        window.alert("Please select a seat");
    }
    
}