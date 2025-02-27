<style>
    .type{
        border: 1px solid #999;
        padding: 5px 10px;
        margin-left: -1px;

    }

    .types{
        display: flex;
    }

    .text{
        width: 98%;
        height: 450px;
        border: 1px solid #999;
        display: none;
    }

    .active{
        display: block;
    }



</style>

<div class="types">
<div class='type'>健康新知</div>
<div class='type'>菸害防治</div>
<div class='type'>癌症防治</div>
<div class='type'>慢性病防治</div>
</div>
  
<div class="texts">
    <div class="text active">

    </div>
    <div class="text">

    </div>
    <div class="text">

    </div>
    <div class="text">

    </div>
</div>

<script>
    $(".type").on('click',function(){
        let idx=$(this).index();
        $(".text").removeClass("active")
        $(".text").eq(idx).addClass('active')
    })
</script>



