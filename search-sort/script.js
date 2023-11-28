$(document).ready(function () {
    // Initialize arrays
    let integerArray = [];
    let entityArray = [];

    // Event handler for sorting integers
    $("#sortButton").click(function () {
        const input = $("#integerArray").val();
        integerArray = input.split(",").map(Number);
        integerArray.sort((a, b) => a - b);
        $("#result").html(`Sorted Array: [${integerArray}]`);
    });

    
    $("#searchButton").click(function () {
        const searchValue = parseInt(prompt("Enter the integer to search:"));
        if (!isNaN(searchValue)) {
            const foundIndex = integerArray.indexOf(searchValue);
            if (foundIndex !== -1) {
                $("#result").html(`Integer ${searchValue} found at index ${foundIndex}`);
            } else {
                $("#result").html(`Integer ${searchValue} not found in the array`);
            }
        }
    });

    
    $("#addEntityButton").click(function () {
        const entity = $("#entityArray").val();
        if (entity.trim() !== "") {
            entityArray.push(entity);
            $("#entityList").append(`<li class="list-group-item">${entity}</li>`);
            $("#entityArray").val("");
        }
    });
});
