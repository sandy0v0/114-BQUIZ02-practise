
<fieldset style="width:70%;margin:auto">
    <legend>新增問卷</legend>
    <table style="width:100%">
        <tr>
            <td class='clo'>問卷名稱</td>
            <td>
                <input type="text" name="subject" id="subject" style="width:80%">
            </td>
        </tr>
        <tr class='clo'>
            <td colspan='2'>
                <div id="options">
                    選項<input type="text" name="option[]" id=""  style="width:80%">
                    <button onclick="more()">更多</button>
                </div>
            </td>
        </tr>
    </table>
    <div class="ct">
        <button onclick="send()">新增</button>｜<button onclick="resetForm()">清空</button>
    </div>
</fieldset>

<script>
    function more(){
        let el=`<div>選項<input type="text" name="option[]" id="" style="width:80%"></div>`
        $("#options").before(el)
    }
    function send(){
        let subject=$("#subject").val()
        let options=$("input[name='option[]']").map((id,item)=>$(item).val()).get()
        //console.log(subject,options)

        $.post("./api/add_que.php",{subject,options},(res)=>{
            //console.log(res)
            location.reload()
        })
    }
    function resetForm(){
        $("input[type='text']").val("")
    }

</script>

<br>


<fieldset style="width:70%;margin:auto">
    <legend>問卷列表</legend>
    <table style="width:100%">
        <tr class='ct'>
            <td class='clo'>問卷名稱</td>
            <td class='clo'>投票數</td>
            <td class='clo'>開放</td>
        </tr>
        <?php 
        // 只取得 main_id = 0 的問卷
        $questions = $Que->all(['main_id' => 0]);  // 加入條件 main_id = 0
        foreach ($questions as $row):
        ?>
        <tr>
            <td width="70%"><?=$row['text'];?></td>
            <td width="15%" class="ct"><?=$row['vote'];?></td>
            <td width="15%" class="ct">
                <button class="show" data-id="<?=$row['id'];?>"><?=($row['sh'] == 1) ? '開放' : '關閉';?></button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</fieldset>


<script>
    $(".show").on("click", function(){
        let id = $(this).data('id'); // 取得按鈕上的問卷 ID
        $.post("./api/show.php", {id}, function(){
            location.reload();  // 當按鈕被點擊後，重新載入頁面以反映狀態變更
        });
    });
</script>
    