$(document).ready(function () {
    loadStudents();

    $("#studentForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "index.php?a=api&action=create",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function (res) {
                if (res.success) {
                    loadStudents();
                    $("#studentForm")[0].reset();
                } else {
                    alert(res.message);
                }
            },
            error: function () {
                alert("Lỗi khi lưu dữ liệu");
            }
        });
    });
});

function loadStudents() {
    $.ajax({
        url: "index.php?a=api&action=list",
        type: "GET",
        dataType: "json",
        success: function (res) {
            if (!res.success) {
                alert("Lỗi load dữ liệu");
                return;
            }

            let html = "";
            let i = 1;

            res.data.forEach(function (sv) {
                html += `
                <tr>
                    <td>${i++}</td>
                    <td>${sv.code}</td>
                    <td>${sv.full_name}</td>
                    <td>${sv.email}</td>
                    <td>${sv.dob}</td>
                    <td>
                        <button onclick="deleteStudent(${sv.id})">Xóa</button>
                    </td>
                </tr>
                `;
            });

            $("#studentTable tbody").html(html);
        },
        error: function () {
            alert("Lỗi load dữ liệu");
        }
    });
}

function deleteStudent(id) {
    if (!confirm("Xóa sinh viên này?")) return;

    $.ajax({
        url: "index.php?a=api&action=delete&id=" + id,
        type: "GET",
        dataType: "json",
        success: function () {
            loadStudents();
        }
    });
}
