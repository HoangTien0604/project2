<?php
require_once "config.php";

/* GHI NHẬN DỊ THƯỜNG */
if (isset($_POST['report'])) {
    $sql = "INSERT INTO anomalies (code, danger_level, description)
            VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $_POST['code'],
        $_POST['danger'],
        $_POST['description']
    ]);
}

/* VÔ HIỆU HÓA */
if (isset($_GET['neutralize'])) {
    $sql = "UPDATE anomalies SET status = 'Đã vô hiệu' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_GET['neutralize']]);
}

/* LẤY DANH SÁCH */
$stmt = $conn->query("SELECT * FROM anomalies ORDER BY reported_at DESC");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trung tâm kiểm soát dị thường</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>TRUNG TÂM KIỂM SOÁT DỊ THƯỜNG</h1>

<form method="POST">
    <input type="text" name="code" placeholder="Mã dị thường (VD: ANOM-XXX)" required>

    <select name="danger">
        <option>Thấp</option>
        <option>Trung bình</option>
        <option>Cao</option>
        <option>Thảm họa</option>
    </select>

    <textarea name="description" placeholder="Mô tả hiện tượng dị thường..." required></textarea>

    <button name="report">Ghi nhận dị thường</button>
</form>

<?php foreach ($data as $a): ?>
    <div class="anomaly">
        <h3><?= htmlspecialchars($a['code']) ?></h3>
        <span class="badge <?= $a['status'] === 'Đang hoạt động' ? 'active' : 'disabled' ?>">
            <?= $a['status'] ?>
        </span>

        <p><b>Mức độ:</b> <?= $a['danger_level'] ?></p>
        <p><?= nl2br(htmlspecialchars($a['description'])) ?></p>
        <small>Ghi nhận lúc: <?= $a['reported_at'] ?></small><br>

        <?php if ($a['status'] === 'Đang hoạt động'): ?>
            <a href="?neutralize=<?= $a['id'] ?>">Vô hiệu hóa</a>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

</body>
</html>
