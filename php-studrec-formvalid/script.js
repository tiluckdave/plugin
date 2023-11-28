function validateForm() {
    var name = document.forms["studentForm"]["name"].value;
    var grade = document.forms["studentForm"]["grade"].value;

    if (name == "" || grade == "") {
        alert("Both name and grade must be filled out");
        return false;
    }

    if (isNaN(grade) || grade < 0 || grade > 100) {
        alert("Grade must be a number between 0 and 100");
        return false;
    }

    return true;
}
