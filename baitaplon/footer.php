<!-- JS CHUNG -->
<script src="assets/js/common.js"></script>

<!-- JS RIÊNG TỪNG TRANG -->
<?php if (!empty($page_js)): ?>
    <script src="assets/js/<?= $page_js ?>"></script>
<?php endif; ?>
</body>
</html>
