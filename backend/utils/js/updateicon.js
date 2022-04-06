// var contents="<?php require_once './writeblog.php' ?>";
        layui.use(
            'layer',
            function() {
                var $ = layui.jquery,
                    layer = layui.layer;
                //layer.msg('hello');


                //触发事件，例如button的onclick()等
                var active = {
                    notice: function() {

                        console.log("执行了");


                        layer.open({
                            type: 1 //设置基本层的类型，1代表页面层
                                ,
                            title: "分享新鲜事..." //true显示标题栏，false不显示标题栏
                                ,
                            closeBtn: false,
                            area: '800px;' //宽高
                                ,
                            shade: 0.8 //遮罩
                                ,
                            id: 'LAY_layuipro' //设定一个id，防止重复弹出
                                ,
                            btn: ['就这样', '我再想想'],
                            btnAlign: 'c' //按钮对齐方式
                                ,
                            moveType: 1 //拖拽模式
                                ,
                            content: contents,
                            success: function(layero) {
                                var btn = layero.find('.layui-layer-btn');
                                btn.find('.layui-layer-btn0').attr({
                                    href: 'http://www.layui.com/',
                                    target: '_blank'
                                });
                            }
                        });

                    }
                };
                $('#layerDemo .layui-btn').on('click', function() {
                    var othis = $(this),
                        method = othis.data('method');
                    active[method] ? active[method].call(this, othis) : '';
                });
            }
        );