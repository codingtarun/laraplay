$(document).ready(function () {
    /**
     * Alerts Script
     */
    setTimeout(function () {
        $("#alerts")
            .removeClass("animate__bounceInRight")
            .addClass("animate__bounceOutRight");
    }, 5000);

    /**
     * Search Modal Scripts.
     * Check for empty input field before submit.
     */
    $("#searchForm").on("submit", function (e) {
        /**
         * Get the input field value
         */
        var searchInput = $("#search").val().trim();
        if (searchInput === "") {
            /**
             * If input is empty
             * Prevent default action i.e submit form
             */
            e.preventDefault();
            $("#searchHelp").text("Please enter user name").css("color", "red");
        } else {
            /**
             * If input in not empty then submit form
             */
            $("#searchHelp").text("Search Item").css("color", "");
        }
    });

    /**
     * Model Status Switch Script
     */
    $(".status-switch").on("click", function () {
        var isChecked = $(this).is(":checked"); // get status
        var id = $(this).data("model-id"); // get the ID of the model
        var currentStatus = $(this).siblings(".status-label"); // get the current status
        currentStatus.text(isChecked ? "Published" : "Draft");
    });
});
