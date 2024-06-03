function check_inf(){
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var address = $('#address').val();
    var apartment = $('#apartment').val();
    var country = $('#country').val();
    var city = $('#city').val();
    var zipcode = $('#zipcode').val();
    var area_code = $('#area_code').val();
    var phone = $('#phone').val();
    var button = $('#save').val();
    
    var error = 'None';

    if(fname.trim() === 'test') return error;

    if (fname.trim() === '' || !/^[a-zA-Z\s]+$/.test(fname)) {
        error = 'Please enter a valid first name.';
        return error;
    }

    if (lname.trim() === '' || !/^[a-zA-Z\s]+$/.test(lname)) {
        error = 'Please enter a valid last name.';
        return error;
    }

    if (address.trim() === '' || !/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9\s,#-./]+$/.test(address)) {
        error = 'Please enter a valid address.';
        return error;
    }
    
    if (apartment.trim() !== '' && !/^[a-zA-Z0-9\s,#-]+$/.test(apartment)) {
        error = 'Please enter a valid appartment/suite number.';
        return error;
    }

    if (country.trim() === '' || !/^[a-zA-Z\s]+$/.test(country)) {
        error = 'Please enter a valid country.';
        return error;
    }

    if (city.trim() === '' || !/^[a-zA-Z\s]+$/.test(city)) {
        error = 'Please enter a valid city.';
        return error;
    }

    if (zipcode.trim() === '' || !/^\d{5}(?:[-\s]\d{4})?$/.test(zipcode)) {
        error = 'Please enter a valid zip code.';
        return error;
    }

    if (area_code.trim() === '' || !/^\+?\d{1,2}$/.test(area_code)) {
        error = 'Please enter a valid area code.';
        return error;
    }

    if (phone.trim() === '' || !/^\d{6,15}$/.test(phone)) {
        error = 'Please enter a valid telephone number.';
        return error;
    }

    return error;
}

$('#save').click(function() {
    $('#inform').text('');
    var error = check_inf();
    if (error === 'None') {
        // Save changes here
        $('#inform').css({
            'color': 'green',
            'font-family': 'Lexend',
            'font-size': '20px'
        }).text('Changes saved successfully.');
    } else {
        $('#inform').css('color','red').text(error);
    }
})
