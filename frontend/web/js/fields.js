// Define an object to map each process value to an array of field IDs to hide
var processFieldMap = {
    'Accreditation of SRE - F2F': ['#program-field', '#duration-field', '#platform-field', '#business_name-field', '#transaction-field', '#disbursement-field'],
    'Accreditation of SRE - Online': ['#program-field', '#duration-field', '#platform-field', '#business_name-field', '#transaction-field', '#disbursement-field'],
    'BMBE Registration - F2F': ['#program-field', '#duration-field', '#platform-field', '#business_name-field', '#transaction-field', '#disbursement-field'],
    'Training and Development - F2F': ['#region-field', '#contact-field', '#email-field', '#transaction-field', '#disbursement-field'],
    // Add more mappings for other processes as needed
};

// Function to toggle visibility of the fields based on the selected process
function toggleVisibility(processValue) {
    // Loop through each field ID and hide or show them accordingly
    Object.keys(processFieldMap).forEach(function(processName) {
        var fieldsToHide = processFieldMap[processName];
        fieldsToHide.forEach(function(fieldID) {
            var fieldToHide = $(fieldID);
            if (fieldToHide.length > 0) {
                if (processValue === processName) {
                    fieldToHide.closest('.form-group').hide(); // Hide the field and its label
                } else {
                    fieldToHide.closest('.form-group').show(); // Show the field and its label
                }
            }
        });
    });
}

// Triggering the function initially
toggleVisibility($('#process-dropdown').val());

// Binding change event to the dropdown
$('#process-dropdown').change(function() {
    toggleVisibility($(this).val());
});
