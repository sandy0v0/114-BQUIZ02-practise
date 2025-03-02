<?php include_once "db.php";  

$id = $_POST['id'];  // 接收傳來的問卷 ID
$row = $Que->find($id);  // 根據 ID 查詢該問卷資料

// 切換問卷顯示狀態
if ($row['sh'] == 0) {
    $row['sh'] = 1;  // 如果是關閉 (sh=0)，設為開放 (sh=1)
} else {
    $row['sh'] = 0;  // 如果是開放 (sh=1)，設為關閉 (sh=0)
}

$Que->save($row);  // 儲存更新後的問卷資料
?>
