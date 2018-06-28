// $(document).ready(function() {
//         $('#myTable').DataTable();
//         $(document).ready(function() {
//             var table = $('#example').DataTable({
//                 "columnDefs": [{
//                     "visible": false,
//                     "targets": 5
//                 }],
//                 "order": [
//                     [5, 'desc']
//                 ],
//                 "displayLength": 100,
//                 "drawCallback": function(settings) {
//                     var api = this.api();
//                     var rows = api.rows({
//                         page: 'current'
//                     }).nodes();
//                     var last = null;
//                     api.column(2, {
//                         page: 'current'
//                     }).data().each(function(group, i) {
//                         if (last !== group) {
//                             $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
//                             last = group;
//                         }
//                     });
//                 }
//             });
//             // Order by the grouping
//             $('#example tbody').on('click', 'tr.group', function() {
//                 var currentOrder = table.order()[0];
//                 if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
//                     table.order([5, 'desc']).draw();
//                 } else {
//                     table.order([5, 'asc']).draw();
//                 }
//             });
//         });
//     });

    $('#customer-list').DataTable({
        dom: 'Bfrtip',
        buttons: [
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            'csv', 'excel', 'print'
        ],
        "order": [
            [5, 'desc']
        ]
    });
