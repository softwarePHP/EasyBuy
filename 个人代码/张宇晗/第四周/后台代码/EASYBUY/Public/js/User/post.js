/**
 * Created by Lucifer on 2016/11/23.
 */

<?
var content = $('#userid').html();
if(content !== "" && title1.value.length !== 0)
{
    $.ajax(
        {
            type: "post",
            async:false,
            dataType: 'html',
            url: "http://localhost/EASYBUY/home/user/update",
            data: "content="+content,
            success: function(msg)
            {
                if(data.info == "成功")
                {
                    alert("传值成功");
                }
                else
                {
                    alert("传值失败");
                }
            },
            error:function(msg)
            {
                alert("失败");
            }

        });
?>