$(document).ready(function() {
    $('#mytable').DataTable({
        responsive: true,
        "language": {
            "sProcessing":   "Đang xử lý...",
            "sLengthMenu":   "Xem _MENU_ bản ghi",
            "sZeroRecords":  "Không tìm thấy dữ liệu nào phù hợp",
            "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ bản ghi",
            "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 bản ghi",
            "sInfoFiltered": "(được lọc từ _MAX_ bản ghi)",
            "sInfoPostFix":  "",
            "sSearch":       "sdfhj kiếm: ",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Đầu tiên",
                "sPrevious": "Trước",
                "sNext":     "Sau",
                "sLast":     "Cuối cùng"
            },
            "oAria": {
              "sSortAscending": ": Sắp xếp tăng dần", "sSortDescending": ": Sắp xếp giảm dần"
            }
        }
    });
});