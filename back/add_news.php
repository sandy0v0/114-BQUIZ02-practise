<?php include_once "api/db.php";

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



<fieldset style="width:85%; margin:auto">
        <legend>新增文章</legend>
        <form method="post" >
            <table style="width:80%">
                <tr>
                    <td class="ct">文章標題</td>
                    <td>
                        <input type="text" name="text" id="text" style="width:99%" required>
                    </td>
                </tr>
                <tr>
                    <td class="ct">文章分類</td>
                    <td>
                        <select name="type" id="type" required>
                            <option value="1">健康新知</option>
                            <option value="2">菸害防治</option>
                            <option value="3">癌症防治</option>
                            <option value="4">慢性病防治</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="ct">文章內容</td>
                    <td>
                        <textarea name="news" id="news" style="width:99%; height:250px;" required></textarea>
                    </td>
                </tr>
            </table>
            <table style="width:100%">
                <tr class="ct">
                    <td colspan="2">
                        <input type="submit" value="新增">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>

    