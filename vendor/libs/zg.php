<!-- Код на JavaScript, отображающий параметры GZip-сжатия. -->
<script language="JavaScript">
    <!--
    // Возвращает Cookie с указанным именем.
    function getCookie(name) {
        var p = name + "=";
        var si = document.cookie.indexOf(p);
        if (si == -1) return null;
        var ei = document.cookie.indexOf(";", si + p.length);
        if (ei == -1) ei = document.cookie.length;
        return unescape(document.cookie.substring(si + p.length, ei));
    }
    var b = getCookie("page_size_before");
    var a = getCookie("page_size_after");
    if (a && b) {
        document.write(
            "[GZip: " +
            "<span title='стало'>"+a+"</span>/" +
            "<span title='было'>"+b+"</span> " +
            "<span title='откусили'>("+(100-Math.round(a/b*100))+"%)</span>" +
            "]"
        )
    } else {
        document.write("[GZip выключен]");
    }
    //-->
</script>
