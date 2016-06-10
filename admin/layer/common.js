/**
 * 共用函数
 * Created by PhpStorm.
 * User: Aplum
 * Date: 2016/3/1
 * Time: 12:00
 */

/**
 * 消息提示框
 * @param msg 消息文字
 * @param url 跳转的url
 * @param time_ 等待跳转的时间
 */
function showmsg(msg, url, time_) {
    if(time_ == ''){
        time_ = 2;
    }
    if(url !== undefined && url !== null){
        layer.msg(msg, {time: time_}, function(){
            window.location.href=url;
        });
    } else
        layer.msg(msg, {time: time_});
}

/**
 * 字符串截取函数
 * @param str 要处理的字符串
 * @param len 截取的长度
 * @param hasDot true 加...， false 不加
 * @returns {string} 处理后的字符串
 *
 * 示例： substring('这是我们小时候的照片', 5, 1)
 */
function substring(str, len, hasDot) {
    var newLength = 0;
    var newStr = "";
    var chineseRegex = /[^\x00-\xff]/g;
    var singleChar = "";
    len *= 2;
    var strLength = str.replace(chineseRegex,"**").length;
    for(var i = 0;i < strLength;i++)
    {
        singleChar = str.charAt(i).toString();
        if(singleChar.match(chineseRegex) != null)
        {
            newLength += 2;
        }
        else
        {
            newLength++;
        }
        if(newLength > len)
        {
            break;
        }
        newStr += singleChar;
    }

    if(hasDot && strLength > len)
    {
        newStr += "...";
    }
    return newStr;
}

/**
 * js 可以向php那样使用$_GET
 * @param  {[type]} ){                 var url [description]
 * @return {[type]}     [description]
 *
 * 示例：alert($_GET['str'])
 */
var $_GET = (function(){
    var url = window.document.location.href.toString();
    var u = url.split("?");
    if(typeof(u[1]) == "string"){
        u = u[1].split("&");
        var get = {};
        for(var i in u){
            var j = u[i].split("=");
            get[j[0]] = j[1];
        }
        return get;
    } else {
        return {};
    }
})();