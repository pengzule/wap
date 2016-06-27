function relogin1(id) {
    g_pop_a = new Popup({
		contentType: 1,//有4种类型,1代表iframe,使用1时，setContent方法也要对应使用相应的参数setContent("contentUrl","iframe地址");
					   //2代表一般html内容 对应setContent("contentHtml","html内容");
					   //3代表确认框，有确定取消按钮 对应setContent("confirmCon","确定要提交吗？");
					   //4代表alert框 对应setContent("alertCon","alert内容");
		isHaveTitle: true,// 是否有标题
		scrollType: "no",// 弹出内容里是否有滚动条
		isBackgroundCanClick: false,// 背景层是否能够点击
		isSupportDraging: true,// 是否能够拖动窗口
		isShowShadow: true,// 是否显示窗口阴影
		isReloadOnClose: true,//关闭窗口是否重新加载父页面
		width: 400,// 窗口宽
		height: 600// 窗口高
			
    });
    g_pop_a.setContent("title", "我要应聘");//设置窗口标题名称
    g_pop_a.setContent("contentUrl", 'regapp.asp?id='+id);// 设置窗口内容
    g_pop_a.build();
    g_pop_a.show();
}


function relogin2() {
    g_pop = new Popup({
		contentType: 2,//有4种类型,1代表iframe,使用1时，setContent方法也要对应使用相应的参数setContent("contentUrl","iframe地址");
					   //2代表一般html内容 对应setContent("contentHtml","html内容");
					   //3代表确认框，有确定取消按钮 对应setContent("confirmCon","确定要提交吗？");
					   //4代表alert框 对应setContent("alertCon","alert内容");
		isHaveTitle: true,// 是否有标题
		scrollType: "no",// 弹出内容里是否有滚动条
		isBackgroundCanClick: false,// 背景层是否能够点击
		isSupportDraging: true,// 是否能够拖动窗口
		isShowShadow: true,// 是否显示窗口阴影
		isReloadOnClose: true,//关闭窗口是否重新加载父页面
		width: 600,// 窗口宽
		height: 400// 窗口高
			
    });
    g_pop.setContent("title", "注册");//设置窗口标题名称
    g_pop.setContent("contentUrl", "register.asp");// 设置窗口内容
    g_pop.build();
    g_pop.show();
}

