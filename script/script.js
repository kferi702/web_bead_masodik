$(document).ready(function () {
    pageTable();
    localStorage.setItem("page", 1);
    function pageTable(page)
    {
        var sort = localStorage.getItem("sort");
        var columnName = localStorage.getItem("columnName");
        localStorage.setItem("page", page);
        $.ajax({
            url: "pageandsort.php",
            method: "POST",
            data: {page: page,
                sort: sort,
                columnName: columnName},
            success: function (valasz) {
                $('#page_data').html(valasz);
            }
        })
    }
    $(document).on('click', '.page_link', function () {
        var page = $(this).attr("id");
        pageTable(page);
    });
});
function sortTable(columnName) {

    var page = localStorage.getItem("page");
    var sort = $("#sort").val();
    localStorage.setItem("columnName", columnName);
    localStorage.setItem("sort", sort);
    $.ajax({
        url: 'pageandsort.php',
        type: 'post',
        data: {
            columnName: columnName,
            sort: sort,
            page: page},
        success: function (valasz) {
            $("#page_data tr:not(:first)").remove();

            $('#page_data').html(valasz);
            if (sort == "ASC") {
                $("#sort").val("DESC");
            } else {
                $("#sort").val("ASC");
            }
        }
    });
}