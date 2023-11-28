$(document).ready(function() {
    // Copy contents from source list to destination list
    $("#copyButton").click(function() {
        // Clear destination list before copying
        $("#destinationList").empty();

        // Copy each item from source to destination
        $("#sourceList li").each(function() {
            $("#destinationList").append("<li>" + $(this).text() + "</li>");
        });
    });

    // Create a new element in the source list
    $("#createButton").click(function() {
        var newItemText = "New Item " + ($("#sourceList li").length + 1);
        $("#sourceList").append("<li>" + newItemText + "</li>");
    });
});
