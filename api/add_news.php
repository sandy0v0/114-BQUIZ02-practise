<?php include_once "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 檢查表單資料是否填寫正確
    $title = $_POST['text'] ?? '';
    $type = $_POST['type'] ?? '';
    $news = $_POST['news'] ?? '';

    if ($title && $type && $news) {
        // 如果資料不為空，準備插入資料庫的資料陣列
        $data = [
            'title' => $title,
            'type' => $type,
            'news' => $news,
            'likes' => 0, // 預設 likes 為 0
            'sh' => 1, // 假設預設為顯示
        ];

        // 呼叫 DB 類別的 save 方法儲存資料
        if ($News->save($data)) {
            echo "文章新增成功！";
            // 重新導向至管理頁面或其他頁面
            header("location.href='admin.php'");
            exit;
        } else {
            echo "新增文章失敗，請稍後再試。";
        }
    } else {
        echo "請確保所有欄位都已填寫。";
    }
}
?>
