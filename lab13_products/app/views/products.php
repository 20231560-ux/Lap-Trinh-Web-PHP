<!DOCTYPE html>
<html>
<head>
    <title>Products Ajax</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<h2>Quản lý sản phẩm (Live Search + Ajax Delete)</h2>

<input type="text" id="txtSearch" placeholder="Tìm theo tên hoặc mã...">
<p id="status"></p>

<table border="1" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Name</th>
            <th>Price</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="tbData"></tbody>
</table>

<script>
const BASE = '/Labs/lab13_products/public/index.php';
let timer = null;

function renderTable(data) {
    let html = '';
    if (data.length === 0) {
        html = '<tr><td colspan="6">Không tìm thấy dữ liệu</td></tr>';
    } else {
        data.forEach(item => {
            html += `
                <tr>
                    <td>${item.id}</td>
                    <td>${item.code}</td>
                    <td>${item.name}</td>
                    <td>${item.price}</td>
                    <td>${item.created_at}</td>
                    <td>
                        <button class="btnDelete" data-id="${item.id}">Xóa</button>
                    </td>
                </tr>
            `;
        });
    }
    $('#tbData').html(html);
}

function loadData(q = '') {
    $('#status').text('Đang tải...');
    $.ajax({
        url: BASE + '/api/products/search',
        method: 'GET',
        data: { q: q },
        dataType: 'json',
        success: function(res) {
            if (!res.success) {
                alert(res.message);
                return;
            }
            $('#status').text('');
            renderTable(res.data);
        },
        error: function(xhr) {
            alert('Lỗi Ajax: ' + xhr.status);
        }
    });
}

// Live search debounce 300ms
$('#txtSearch').on('keyup', function() {
    clearTimeout(timer);
    const q = $(this).val().trim();
    timer = setTimeout(() => {
        loadData(q);
    }, 300);
});

// Delete
$(document).on('click', '.btnDelete', function() {
    const id = $(this).data('id');
    if (!confirm('Bạn chắc chắn muốn xóa?')) return;

    $.ajax({
        url: BASE + '/api/products/delete',
        method: 'POST',
        data: { id: id },
        dataType: 'json',
        success: function(res) {
            if (!res.success) {
                alert(res.message);
                return;
            }
            loadData($('#txtSearch').val());
        },
        error: function(xhr) {
            alert('Lỗi Ajax: ' + xhr.status);
        }
    });
});

// Load lần đầu
loadData();
</script>

</body>
</html>
