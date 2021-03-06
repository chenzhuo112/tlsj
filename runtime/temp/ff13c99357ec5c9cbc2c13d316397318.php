<?php /*a:2:{s:60:"/www/wwwroot/tlsj/application/admin/view/user/user_list.html";i:1577103178;s:57:"/www/wwwroot/tlsj/application/admin/view/public/base.html";i:1577103178;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    
    <link rel="stylesheet" type="text/css" href="/static/layuiadmin/layui/css/layui.css" /><link rel="stylesheet" type="text/css" href="/static/layuiadmin/style/admin.css" />
    
    <link rel="stylesheet" type="text/css" href="/vendor/pace/css/pace-theme-flash.css" />
    <link rel="icon" href="<?php echo get_img_show_url(zf_cache('web_info.web_ico')); ?>" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo get_img_show_url(zf_cache('web_info.web_ico')); ?>" type="image/x-icon"/>
    
</head>
<body>

<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title user_type_tab">
                <li class="layui-this" data-type="">
                    所有会员<span class="layui-badge all_user_num">0</span>
                </li>
                <li data-type="day_new">
                    今日新增<span class="layui-badge day_new_user_num">0</span>
                </li>
                <li data-type="no_activate">
                    未审会员<span class="layui-badge no_activate_user_num">0</span>
                </li>
                <li data-type="activate">
                    己审会员<span class="layui-badge activate_user_num">0</span>
                </li>
                <li data-type="lock">
                    冻结会员<span class="layui-badge lock_user_num">0</span>
                </li>
            </ul>
            <div class="layui-form layui-card-header layuiadmin-card-header-auto">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">ID</label>
                        <div class="layui-input-block">
                            <input type="text" name="id" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">账号</label>
                        <div class="layui-input-block">
                            <input type="text" name="account" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">手机</label>
                        <div class="layui-input-block">
                            <input type="text" name="mobile" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">会员等级</label>
                        <div class="layui-input-block">
                            <select name="level_id" class="layui-input">
                                <option value="">--请选择--</option>
                                <?php foreach($levels as $k=>$v): ?>
                                <option value="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="user_type" value=""/>
                    <div class="layui-inline">
                        <button class="layui-btn layuiadmin-btn-useradmin" lay-submit lay-filter="search_btn">
                            <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="layui-card-body">
                <table id="user_list" lay-filter="user_list"></table>
                <script type="text/html" id="toolbarDemo">
                    <div class="layui-btn-container">
                        <button class="layui-btn layui-btn-sm" lay-event="addUser">
                            <i class="layui-icon layui-icon-add-1"></i>添加
                        </button>
                        <button class="layui-btn layui-btn-sm layui-btn-danger" lay-event="delUser">
                            <i class="layui-icon layui-icon-delete"></i>删除
                        </button>
                        <button class="layui-btn layui-btn-sm" lay-event="sendMail">
                            <i class="layui-icon layui-icon-release"></i>发送邮件
                        </button>
                        <button class="layui-btn layui-btn-sm" lay-event="sendMessage">
                            <i class="layui-icon layui-icon-speaker"></i>发送站内信
                        </button>
                    </div>
                </script>
                <script type="text/html" id="lockInfo">
                    {{# if (d.frozen == 1) { }}
                    正常
                    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="lockUser">锁定</a>
                    {{# }else{ }}
                    冻结
                    <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="unLockUser">解锁</a>
                    {{# } }}
                </script>
                <script type="text/html" id="options">
                    <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</a>
                    <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="editLevel"><i class="layui-icon layui-icon-edit"></i>修改等级</a>
                    <!--<a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="editLeader"><i class="layui-icon layui-icon-edit"></i>修改领导等级</a>-->
                </script>
                <script type="text/html" id="accountInfo">
                    <a href="javaScript:void(0);" lay-event="userLogin" lay-tips="点击登入会员中心">{{
                        d.account }}</a>
                </script>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="/static/layuiadmin/layui/layui.js"></script><script type="text/javascript" src="/static/js/jquery.min.js"></script><script type="text/javascript" src="/static/js/admin.js"></script><script type="text/javascript" src="/vendor/pace/js/pace.min.js"></script>

<script>
    layui.use(['layer', 'table', 'form'], function () {
        var table = layui.table, form = layui.form;
        var tableId = 'user_list';
        var options = {
            id: tableId,
            url: '<?php echo url(""); ?>',
            elem: '#'+tableId,
            toolbar: '#toolbarDemo',
            height: 'full-200',
            cols: [[
                {type: 'checkbox', fixed: 'left', rowspan: 2},
                {field: 'id', title: 'ID', rowspan: 2, width: 80},
                {field: '', title: '账号信息', colspan: 9, align: 'center'},
                {field: 'tjr_num', title: '直推', rowspan: 2},
                {field: 'team_num', title: '团队', rowspan: 2},
                {field: 'is_product', title: '分红牛', rowspan: 2},
                {field: 'is_niuqi', title: '牛郞', rowspan: 2},
                {field: 'is_zilvu', title: '织女', rowspan: 2},
                {title: '操作', templet: '#options', width: 170, rowspan: 2}
            ], [
                {field: 'account', title: '账号', templet: '#accountInfo'},
                {field: 'level', title: '会员等级'},
//                {field: 'leader', title: '领导等级'},
                {field: 'tjr_account', title: '推荐人'},
                {
                    field: 'frozen',
                    title: '账号状态',
                    templet: '#lockInfo',
                    width: 100
                },
                {field: 'invitation_code', title: '邀请码'},
                {field: 'mobile', title: '手机'},
            ]],
            done: function(res, curr, count){

                $('.all_user_num').html(res.userNum.all);
                $('.day_new_user_num').html(res.userNum.dayNew);
                $('.no_activate_user_num').html(res.userNum.noActivate);
                $('.activate_user_num').html(res.userNum.all-res.userNum.noActivate);
                $('.lock_user_num').html(res.userNum.lock);
                //如果是异步请求数据方式，res即为你接口返回的信息。
                //如果是直接赋值的方式，res即为：{data: [], count: 99} data为当前页数据、count为数据总长度
                console.log(res);

                //得到当前页码
                console.log(curr);

                //得到数据总量
                console.log(count);
            },
            request: {
                pageName: 'p',
                limitName: 'p_num'
            },
            page: true,
            limits: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
            limit: 20, //默认采用60
            // skin: 'line', //行边框风格
            even: true, //开启隔行背景
            size: 'sm', //小尺寸的表格
        };

        table.render(options);
        //头工具栏事件
        table.on('toolbar('+tableId+')', function (obj) {
            var checkStatus = table.checkStatus(obj.config.id);
            switch (obj.event) {
                case 'addUser':
                    var url = '<?php echo url("addUser"); ?>';
                    layer.open({
                        type: 2
                        , title: '添加会员'
                        , content: url
                        , area: ['700px', '500px']
                        , shadeClose: true
                        , btnAlign: 'c'
                        , maxmin: true
                        , btn: ['确定', '取消']
                        , yes: function (index, layero) {
                            var iframeWindow = window['layui-layer-iframe' + index]
                                ,
                                submit = layero.find('iframe').contents().find("#submitBtn");

                            //监听提交
                            iframeWindow.layui.form.on('submit(submitBtn)', function (data) {
                                var field = data.field; //获取提交的字段

                                var loadAdd = layer.msg('提交中', {
                                    icon: 16,
                                    time: 0,
                                    shade: 0.1,
                                    offset: '15px'
                                });
                                $.post(url, field, function (res) {
                                    layer.close(loadAdd);
                                    if (res.code == 1) {
                                        table.reload(tableId); //数据刷新
                                        layer.close(index); //关闭弹层
                                        layer.msg(res.msg, {
                                            icon: 6,
                                            offset: '15px'
                                        });
                                    } else {
                                        layer.msg(res.msg, {
                                            icon: 5,
                                            offset: '15px'
                                        });
                                    }
                                });
                            });

                            submit.trigger('click');
                        }
                    });
                    break;
                case 'delUser':
                    var data = checkStatus.data, id = [];
                    console.log(data);
                    for (elem in data) {
                        id.push(data[elem].id);
                    }
                    id = id.join(',');
                    if(id == '') {
                        return layer.msg('请选择要确认的数据');
                    }

                    var url = '<?php echo url("delUser"); ?>?id=' + id;
                    layer.confirm('是否确认删除?', {icon: 3}, function () {
                        var loadAdd = layer.msg('提交中', {icon: 16, time: 0, shade: 0.1, offset: '15px'});
                        $.post(url, {id: data.id}, function (res) {
                            console.log(res);
                            layer.close(loadAdd);
                            if (res.code == 1) {
                                table.reload('user_list'); //数据刷新
                                layer.msg(res.msg, {icon: 6, offset: '15px'});
                            } else {
                                layer.msg(res.msg, {icon: 5, offset: '15px'});
                            }
                        });
                    });
                    break;
                case 'sendMail':
                    var data = checkStatus.data, id = [];
                    console.log(data);
                    for (elem in data) {
                        id.push(data[elem].id);
                    }
                    id = id.join(',');

                    var url = '<?php echo url("sendMail"); ?>?id=' + id;
                    layer.open({
                        type: 2
                        , title: '发送邮件'
                        , content: url
                        , area: ['700px', '500px']
                        , shadeClose: true
                        , btnAlign: 'c'
                        , maxmin: true
                        , btn: ['确定', '取消']
                        , yes: function (index, layero) {
                            var iframeWindow = window['layui-layer-iframe' + index]
                                ,
                                submit = layero.find('iframe').contents().find("#submitBtn");

                            //监听提交
                            iframeWindow.layui.form.on('submit(submitBtn)', function (data) {
                                var field = data.field; //获取提交的字段

                                var loadAdd = layer.msg('提交中', {
                                    icon: 16,
                                    time: 0,
                                    shade: 0.1,
                                    offset: '15px'
                                });
                                $.post(url, field, function (res) {
                                    layer.close(loadAdd);
                                    if (res.code == 1) {
                                        layer.close(index); //关闭弹层
                                        layer.msg(res.msg, {
                                            icon: 6,
                                            offset: '15px'
                                        });
                                    } else {
                                        layer.msg(res.msg, {
                                            icon: 5,
                                            offset: '15px'
                                        });
                                    }
                                });
                            });

                            submit.trigger('click');
                        }
                    });
                    break;
                case 'sendMessage':
                    var data = checkStatus.data, id = [];
                    console.log(data);
                    for (elem in data) {
                        id.push(data[elem].id);
                    }
                    id = id.join(',');

                    var url = '<?php echo url("sendMessage"); ?>?id=' + id;
                    layer.open({
                        type: 2
                        , title: '发送站内信'
                        , content: url
                        , area: ['700px', '500px']
                        , shadeClose: true
                        , btnAlign: 'c'
                        , maxmin: true
                        , btn: ['确定', '取消']
                        , yes: function (index, layero) {
                            var iframeWindow = window['layui-layer-iframe' + index]
                                ,
                                submit = layero.find('iframe').contents().find("#submitBtn");

                            //监听提交
                            iframeWindow.layui.form.on('submit(submitBtn)', function (data) {
                                var field = data.field; //获取提交的字段

                                var loadAdd = layer.msg('提交中', {
                                    icon: 16,
                                    time: 0,
                                    shade: 0.1,
                                    offset: '15px'
                                });
                                $.post(url, field, function (res) {
                                    layer.close(loadAdd);
                                    if (res.code == 1) {
                                        layer.close(index); //关闭弹层
                                        layer.msg(res.msg, {
                                            icon: 6,
                                            offset: '15px'
                                        });
                                    } else {
                                        layer.msg(res.msg, {
                                            icon: 5,
                                            offset: '15px'
                                        });
                                    }
                                });
                            });

                            submit.trigger('click');
                        }
                    });
                    break;
                case 'isAll':
                    layer.msg(checkStatus.isAll ? '全选' : '未全选');
                    break;
            }
        });
        table.on('tool(user_list)', function (obj) {
            var data = obj.data;
            switch (obj.event) {
                case 'edit':
                    var tr = $(obj.tr);

                    var url = '<?php echo url("editUserData"); ?>?id=' + data.id;
                    layer.open({
                        type: 2
                        , title: '编辑' + data.account + '的信息'
                        , content: url
                        , area: ['700px', '500px']
                        , shadeClose: true
                        , btnAlign: 'c'
                        , maxmin: true
                        , btn: ['确定', '取消']
                        , yes: function (index, layero) {
                            var iframeWindow = window['layui-layer-iframe' + index]
                                ,
                                submit = layero.find('iframe').contents().find("#submitBtn");

                            //监听提交
                            iframeWindow.layui.form.on('submit(submitBtn)', function (data) {
                                var field = data.field; //获取提交的字段

                                var loadAdd = layer.msg('提交中', {
                                    icon: 16,
                                    time: 0,
                                    shade: 0.1,
                                    offset: '15px'
                                });
                                $.post(url, field, function (res) {
                                    layer.close(loadAdd);
                                    if (res.code == 1) {
                                        table.reload(tableId); //数据刷新
                                        layer.close(index); //关闭弹层
                                        layer.msg(res.msg, {
                                            icon: 6,
                                            offset: '15px'
                                        });
                                    } else {
                                        layer.msg(res.msg, {
                                            icon: 5,
                                            offset: '15px'
                                        });
                                    }
                                });
                            });

                            submit.trigger('click');
                        }
                    });
                    break;
                case 'editLevel':
                    var tr = $(obj.tr);

                    var url = '<?php echo url("editLevel"); ?>?id=' + data.id;
                    layer.open({
                        type: 2
                        , title: '编辑' + data.account + '的信息'
                        , content: url
                        , area: ['600px', '450px']
                        , btnAlign: 'c'
                        , shadeClose:true
                        , maxmin: true
                        , btn: ['确定', '取消']
                        , yes: function (index, layero) {
                            var iframeWindow = window['layui-layer-iframe' + index]
                                ,
                                submit = layero.find('iframe').contents().find("#submitBtn");

                            //监听提交
                            iframeWindow.layui.form.on('submit(submitBtn)', function (data) {
                                var field = data.field; //获取提交的字段

                                var loadAdd = layer.msg('提交中', {
                                    icon: 16,
                                    time: 0,
                                    shade: 0.1,
                                    offset: '15px'
                                });
                                $.post(url, field, function (res) {
                                    layer.close(loadAdd);
                                    if (res.code == 1) {
                                        table.reload(tableId); //数据刷新
                                        layer.close(index); //关闭弹层
                                        layer.msg(res.msg, {
                                            icon: 6,
                                            offset: '15px'
                                        });
                                    } else {
                                        layer.msg(res.msg, {
                                            icon: 5,
                                            offset: '15px'
                                        });
                                    }
                                });
                            });

                            submit.trigger('click');
                        }
                    });
                    break;
                case 'editLeader':
                    var tr = $(obj.tr);

                    var url = '<?php echo url("editLeader"); ?>?id=' + data.id;
                    layer.open({
                        type: 2
                        , title: '编辑' + data.account + '的信息'
                        , content: url
                        , area: ['600px', '450px']
                        , btnAlign: 'c'
                        , shadeClose:true
                        , maxmin: true
                        , btn: ['确定', '取消']
                        , yes: function (index, layero) {
                            var iframeWindow = window['layui-layer-iframe' + index]
                                ,
                                submit = layero.find('iframe').contents().find("#submitBtn");

                            //监听提交
                            iframeWindow.layui.form.on('submit(submitBtn)', function (data) {
                                var field = data.field; //获取提交的字段

                                var loadAdd = layer.msg('提交中', {
                                    icon: 16,
                                    time: 0,
                                    shade: 0.1,
                                    offset: '15px'
                                });
                                $.post(url, field, function (res) {
                                    layer.close(loadAdd);
                                    if (res.code == 1) {
                                        table.reload(tableId); //数据刷新
                                        layer.close(index); //关闭弹层
                                        layer.msg(res.msg, {
                                            icon: 6,
                                            offset: '15px'
                                        });
                                    } else {
                                        layer.msg(res.msg, {
                                            icon: 5,
                                            offset: '15px'
                                        });
                                    }
                                });
                            });

                            submit.trigger('click');
                        }
                    });
                    break;
                case 'userLogin':
                    layer.confirm('是否确认登录该会员账号?', {icon: 3, button:['登录']}, function () {
                        var url = '<?php echo url("userLogin"); ?>';
                        var loadAdd = layer.msg('登录中', {
                            icon: 16,
                            time: 0,
                            shade: 0.1,
                            offset: '15px'
                        });
                        $.post(url, {id: data.id}, function (res) {
                            layer.close(loadAdd);
                            if (res.code == 1) {
                                layer.msg(res.msg, {icon: 6, offset: '15px'});
                                layer.confirm('是否打开会员中心', {icon:3}, function () {
                                    layer.closeAll();
                                    window.open('/');
                                });
                            } else {
                                layer.msg(res.msg, {icon: 5, offset: '15px'});
                            }
                        });
                    });
                    break;
                case 'lockUser':
                    layer.prompt({
                        formType: 2,
                        title: '请输入锁定原因'
                    }, function (value, index, elem) {
                        var url = '<?php echo url("lockUser"); ?>';
                        var loadAdd = layer.msg('操作中', {
                            icon: 16,
                            time: 0,
                            shade: 0.1,
                            offset: '15px'
                        });
                        $.post(url, {id: data.id, note: value}, function (res) {
                            layer.close(loadAdd);
                            if (res.code == 1) {
                                table.reload(tableId); //数据刷新
                                layer.close(index); //关闭弹层
                                layer.msg(res.msg, {icon: 6, offset: '15px'});
                            } else {
                                layer.msg(res.msg, {icon: 5, offset: '15px'});
                            }
                        });
                    });
                    break;
                case 'unLockUser':
                    layer.confirm('是否确认对该会员解除锁定?', {icon: 3}, function () {
                        var url = '<?php echo url("unLockUser"); ?>';
                        var loadAdd = layer.msg('操作中', {
                            icon: 16,
                            time: 0,
                            shade: 0.1,
                            offset: '15px'
                        });
                        $.post(url, {id: data.id}, function (res) {
                            layer.close(loadAdd);
                            if (res.code == 1) {
                                table.reload(tableId); //数据刷新
                                layer.msg(res.msg, {icon: 6, offset: '15px'});
                            } else {
                                layer.msg(res.msg, {icon: 5, offset: '15px'});
                            }
                        });
                    });
                    break;
            }
        });
        $(document).on('click', '.user_type_tab li', function () {
            $('input[name="user_type"]').val($(this).data('type'));
            $(this).addClass('layui-this').siblings('li').removeClass('layui-this');
            $('button[lay-filter="search_btn"]').trigger('click');
        });
        form.on('submit(search_btn)', function (data) {
            var field = data.field;

            //执行重载
            table.reload(tableId, {
                where: field
                , page: {
                    curr: 1
                }
            });
        });
    });
</script>

</body>
</html>