/**
 * Created by Lucifer on 2016/12/11.
 */
$(function(){
    var address=$('#as');
    var names =  $('#address').value();
    var flag = false ;//标记判断是否选中一个
    for(var i=0;i<names.length;i++) {
        if (names[i].checked) {
            flag = true;
            address.value('names[i]');
            break;

        }
    }
    })
