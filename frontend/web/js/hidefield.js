// Function to toggle visibility of the fields based on selected process
function toggleVisibility(processValue) {
    switch (processValue) {
        case 'Accreditation of SRE - F2F':
            hideFields(['#program-field', '#duration-field', '#platform-field', '#business_name-field', '#transaction-field', '#disbursement-field']);
            break;
        case 'Accreditation of SRE - Online':
            hideFields(['#program-field', '#duration-field', '#platform-field', '#business_name-field', '#transaction-field', '#disbursement-field']);
            break;
        case 'BMBE Registration - F2F':
            hideFields(['#program-field', '#duration-field', '#platform-field', '#business_name-field', '#transaction-field', '#disbursement-field']);
            break;
        case 'Training and Development - F2F':
            hideFields(['#region-field', '#contact-field', '#email-field', '#transaction-field', '#disbursement-field']);
            break;
        default:
            showAllFields();
    }
}

// Function to hide specified fields
function hideFields(fields) {
    fields.forEach(function(field) {
        $(field).closest('.form-group').hide();
    });
}

// Function to show all fields
function showAllFields() {
    $('.form-group').show();
}

// Triggering the function initially
toggleVisibility($('#process-dropdown').val());

// Binding change event to the dropdown
$('#process-dropdown').change(function() {
    toggleVisibility($(this).val());
});

// $('#age-distribution').change(function() {
//     var ageDistribution = $(this).val();
//     var ageField = $('#age-field');
//     var selectedRange = ageDistribution.split('-');

//     // Get the lower and upper bounds of the selected range
//     var lowerBound = parseInt(selectedRange[0]);
//     var upperBound = parseInt(selectedRange[1]);

//     var enteredAge = parseInt(ageField.val());

//     if (enteredAge < lowerBound || enteredAge > upperBound) {
//         // Display a warning message if the entered age exceeds the selected range
//         alert('The entered age is outside the selected age range. Please enter an age within the range ' + ageDistribution);
//     }

//     switch(ageDistribution) {
//         case '18-25':
//             ageField.val('18-25');
//             break;
//         case '26-33':
//             ageField.val('26-33');
//             break;
//         case '34-41':
//             ageField.val('34-41');
//             break;
//         case '42-49':
//             ageField.val('42-49');
//             break;
//         case '50-57':
//             ageField.val('50-57');
//             break;
//         case '58-65':
//             ageField.val('58-65');
//             break;
//         case '66 and above':
//             ageField.val('66 and above');
//             break;
//         default:
//             ageField.val('');
//     }
// });