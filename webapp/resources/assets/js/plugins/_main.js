$( document ).ready(function() {
  console.log( "ready!" );
  $("#dataTable1").dataTable({
    "sPaginationType": "full_numbers",
    aoColumnDefs: [
      {
        bSortable: false,
        aTargets: [0, -1]
      }
    ]
  });
  $('.table').each(function() {
    return $(".table #checkAll").on('click', function() {
      console.log('#checkAll');
      if ($(".table #checkAll").is(":checked")) {
        return $(".table input[type=checkbox]").each(function() {
          return $(this).prop("checked", true);
        });
      } else {
        return $(".table input[type=checkbox]").each(function() {
          return $(this).prop("checked", false);
        });
      }
    });
  })
});
