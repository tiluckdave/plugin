$(document).ready(function() {
    $('button').on('click', function() {
        var value = $(this).text();

        if (value === '=') {
            calculate();
        } else if (value === 'C') {
            clearDisplay();
        } else {
            appendToDisplay(value);
        }
    });
});

function appendToDisplay(value) {
    $('#display').val($('#display').val() + value);
}

function calculate() {
    try {
        $('#display').val(eval($('#display').val()));
    } catch (error) {
        $('#display').val('Error');
    }
}

function clearDisplay() {
    $('#display').val('');
}
