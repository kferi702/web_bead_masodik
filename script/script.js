function sortTable(columnName) {
    var sort = $("#sort").val();
    $.ajax({
        url: 'sorting_table.php',
        type: 'post',
        data: {
            columnName: columnName,
            sort: sort},
        success: function (valasz) {
            $("#database tr:not(:first)").remove();
            
            $("#database").append(valasz);
            if (sort == "asc") {
                $("#sort").val("DESC");
            } else {
                $("#sort").val("ASC");
            }
        }
    });
}


$(documnt).ready(function(){
  function load_data(page)
  {
      $.ajax({
          url:"paging.php",
          method:"POST",
          data:{page:page},
          success:function(valasz){
              $('#paging_data').html(data);
          }
      })
  }
})

