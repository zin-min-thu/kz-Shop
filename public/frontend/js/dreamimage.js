(function($) {
    $.fn.dreamimage = function() {
        var cs, x = 0;
        if ($("#dreambackground")[0] == undefined) {
            $("body").append('<div id="dreamland" style="position: fixed;padding: 0px;display: none;top:0px;left:0px;"><div id="dreambackground" style="position: fixed;height: 100%;z-index:1000;width: 100%;background-color: rgba(0, 0, 0, 0.7);"></div><div id="tool"><svg height="50" width="50" style="cursor:pointer;float: right;z-index: 10005;position: fixed;"><rect x="0" y="0" height="50" width="50" fill="white" style="display: none;" /><path d="M 5 5 L 45 45" stroke="white" stroke-width="1" /><path d="M 45 5 L 5 45" stroke="white" stroke-width="1" /></svg><span style="width: 120px;background-color: #555;color: #fff;text-align: center;padding: 5px 0;border-radius: 6px;position: absolute;z-index: 100000;left:50px;top:10px;display:none;">Close</span></div><div id="dreamcontent" style="text-align: center;height: 95%;width: 95%;z-index:10001;padding: 40px;position: fixed;"><img src="#" style="transform: rotate(0deg);height: 100%;width: 100%; box-shadow: 0 0 25px #111111;" alt="Unable to load image"></img></div><span style="position: fixed;bottom: 15px;right: 15px;padding: 10px 15px 10px 15px;color: white;background-color: rgb(51, 102, 153);border: 1px solid rgba(0,0,0,0.95);border-radius: 10px;cursor: pointer;z-index: 100000;">Rotate</span>');
            $("#dreamland > span").click(function() {
                if (x == 270)
                    x = 0;
                else
                    x = x + 90;
                $("#dreamland > #dreamcontent > img").css("transform", "rotate(" + x + "deg)");
            })
            $("#dreamland > #tool > svg").click(function() {
                $("#dreamland").hide(200);
                x = 0;
                $("#dreamland > #dreamcontent > img").css("transform", "rotate(" + x + "deg)");
                if (cs == undefined)
                    $("body").css("overflow", "auto");
                else
                    $("body").css("overflow", cs);
            });
            $("#dreamland > #tool > svg").hover(function() {
                $("#dreamland > #tool > span").show(100);
                $("#dreamland > #tool > svg > rect").css("display", "block");
                $("#dreamland > #tool > svg > path").attr("stroke", "black");
            }, function() {
                $("#dreamland > #tool > span").hide(100);
                $("#dreamland > #tool > svg > rect").css("display", "none");
                $("#dreamland > #tool > svg > path").attr("stroke", "white");
            });
        }
        $(this).css("cursor", "pointer");
        $("#dreamland > #dreamcontent > img").hover(function() {
                $("#dreamland > #sub").fadeIn(100);
            },
            function() {
                $("#dreamland > #sub").fadeOut(100);
            });
        $(this).click(function() {
            cs = $("body").css("overflow");
            $("body").css("overflow", "hidden");
            $("#dreamland > #sub").hide();
            if ($(this).attr("img-large") == undefined)
                var src = $(this).attr("src");
            else
                var src = $(this).attr("img-large");
            if ($(this).attr("title") != undefined)
                var title = $(this).attr("title");
            else
                var title = src;
            if (title.length > 48)
                title = title.slice(0, 48) + "...";
            $("#dreamland > #sub").text(title);
            $("#dreamcontent > img").attr("src", src);
            $("#dreamland").show(200);
        });
    }
}(jQuery));