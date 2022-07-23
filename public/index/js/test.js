/**
 * Created by fuximin on 2019/9/20.
 */
$(function(){
    $.fn.extend({
        "suspensionTips": function (options) {
            var tips = {
                config : {
                    verticalMargin : 13, // 垂直边距
                    horizontalMargin: 13, // 水平边距
                    position: 'top', // 浮动位置, 默认上方,支持top、bottom、left、right
                    sharpX : 23, // Tips突出部分中心店距离左右两边的长度
                    sharpY : 20, // Tips突出部分中心店距离上边的高度
                    content: "",
                    width : 200,
                    positionClass : 'common-tips'

                },
                init : function (options) {
                    this.config.positionClass = 'common-tips'
                    this.config = $.extend({}, this.config, options);
                    var div = $("<div></div>");
                    div.addClass("common-tips-container common-tips-hide");
                    div.text(this.config.content);
                    div.attr("id","common-tips");
                    $(document.body).append(div);
                    div.css({
                        "width" : this.config.width + "px",
                        // "animation":"common-tips-show " + this.config.speed + "s ease-in",
                        // "-webkit-animation":"common-tips-show " + this.config.speed + "s ease-in",
                    });
                    this.calcTop(div);
                    this.calcLeft(div);

                    div.addClass("common-tips-animation");
                    div.addClass(this.config.positionClass);
                    div.removeClass("common-tips-hide");
                },
                calcTop : function(tipsDiv){
                    //计算top位置
                    var top = this.config.elementPosition.top - tipsDiv.outerHeight() - this.config.verticalMargin;
                    if(this.config.mousePosition.top < (tipsDiv.outerHeight() + this.config.verticalMargin) || this.config.position == "bottom"){
                        top = top + tipsDiv.outerHeight() + this.config.verticalMargin + this.config.elementHeight + this.config.verticalMargin;
                        // tipsDiv.addClass("common-tips-bottom-left");
                        this.config.positionClass += '-bottom';
                    }else{
                        this.config.positionClass += '-top';
                    }

                    if(this.config.position == "left" || this.config.position == "right"){
                        top = this.config.elementPosition.top + this.config.elementHeightHalf - this.config.sharpY;
                    }

                    tipsDiv.css("top", top);
                },
                calcLeft : function (tipsDiv) {
                    //计算left位置
                    var left = 0;
                    var windowWidth = window.innerWidth;//document.body.offsetWidth;
                    var marginRight = windowWidth - this.config.mousePosition.left;
                    if(this.config.position == "top" || this.config.position == "bottom"){
                        if(marginRight < (tipsDiv.outerWidth() - this.config.sharpX)){
                            //如果鼠标局里右边的距离小于tips框的宽度，则表示放不下了，那么就应该往左边偏
                            left = this.config.elementPosition.left - tipsDiv.outerWidth() + this.config.sharpX + this.config.elementWidthHalf;
                            this.config.positionClass += '-left';
                        }else{
                            left = this.config.elementPosition.left + this.config.elementWidthHalf - this.config.sharpX;
                            this.config.positionClass += '-right';
                        }
                    }else if(this.config.position == "left"){
                        if(this.config.mousePosition.left < tipsDiv.outerWidth()){
                            //鼠标的坐标位置小于div的宽度就得出现在右边
                            this.config.positionClass = "common-tips-right-right";
                            left = this.config.elementPosition.left + this.config.elementWidth + this.config.horizontalMargin;
                        }else{
                            //否则在左边
                            this.config.positionClass = "common-tips-left-left";
                            left = this.config.elementPosition.left - tipsDiv.outerWidth() - this.config.horizontalMargin;

                        }
                    }else{
                        this.config.positionClass = "common-tips-right-right";
                        left = this.config.elementPosition.left + this.config.elementWidth + this.config.horizontalMargin;
                    }

                    tipsDiv.css("left", left);
                }
            }
            $(this).on("mouseover", function(e){
                var mousePosition = {
                    top : e.clientY - e.offsetY,
                    left : e.clientX - e.offsetX + $(this).outerWidth()/2
                };
                options.element=$(this);
                options.elementPosition= $(this).offset();
                options.elementWidth=$(this).outerWidth();
                options.elementWidthHalf=$(this).outerWidth()/2;
                options.elementHeight = $(this).outerHeight();
                options.elementHeightHalf = $(this).outerHeight()/2;
                options.mousePosition = mousePosition;
                // options.positionClass = 'common-tips';
                tips.init(options);

            });
            $(this).on("mouseout", function(){
                $("#common-tips").addClass("common-tips-container-hide");
                document.getElementById("common-tips").addEventListener('webkitAnimationEnd', function () {
                   $("#common-tips").remove();
                }, false);
            });
        }
    });

    $("#img1").suspensionTips({"content": "这是出现在上方的提示信息。", position:"top"});
    $("#img2").suspensionTips({"content": "这是出现在右方的提示信息。", position:"right"});
    $("#exitLogin").suspensionTips({"content": "退出登录", position:"bottom"});
    $("#adminL").suspensionTips({"content": "管理员登录", position:"bottom"});
    $("#img4").suspensionTips({"content": "这是出现在左方的提示信息。", position:"left"});
    $("#myInfo").suspensionTips({"content": "查看我的信息", position:"right"});

});

