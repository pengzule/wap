function relogin1(id) {
    g_pop_a = new Popup({
		contentType: 1,//��4������,1����iframe,ʹ��1ʱ��setContent����ҲҪ��Ӧʹ����Ӧ�Ĳ���setContent("contentUrl","iframe��ַ");
					   //2����һ��html���� ��ӦsetContent("contentHtml","html����");
					   //3����ȷ�Ͽ���ȷ��ȡ����ť ��ӦsetContent("confirmCon","ȷ��Ҫ�ύ��");
					   //4����alert�� ��ӦsetContent("alertCon","alert����");
		isHaveTitle: true,// �Ƿ��б���
		scrollType: "no",// �����������Ƿ��й�����
		isBackgroundCanClick: false,// �������Ƿ��ܹ����
		isSupportDraging: true,// �Ƿ��ܹ��϶�����
		isShowShadow: true,// �Ƿ���ʾ������Ӱ
		isReloadOnClose: true,//�رմ����Ƿ����¼��ظ�ҳ��
		width: 400,// ���ڿ�
		height: 600// ���ڸ�
			
    });
    g_pop_a.setContent("title", "��ҪӦƸ");//���ô��ڱ�������
    g_pop_a.setContent("contentUrl", 'regapp.asp?id='+id);// ���ô�������
    g_pop_a.build();
    g_pop_a.show();
}


function relogin2() {
    g_pop = new Popup({
		contentType: 2,//��4������,1����iframe,ʹ��1ʱ��setContent����ҲҪ��Ӧʹ����Ӧ�Ĳ���setContent("contentUrl","iframe��ַ");
					   //2����һ��html���� ��ӦsetContent("contentHtml","html����");
					   //3����ȷ�Ͽ���ȷ��ȡ����ť ��ӦsetContent("confirmCon","ȷ��Ҫ�ύ��");
					   //4����alert�� ��ӦsetContent("alertCon","alert����");
		isHaveTitle: true,// �Ƿ��б���
		scrollType: "no",// �����������Ƿ��й�����
		isBackgroundCanClick: false,// �������Ƿ��ܹ����
		isSupportDraging: true,// �Ƿ��ܹ��϶�����
		isShowShadow: true,// �Ƿ���ʾ������Ӱ
		isReloadOnClose: true,//�رմ����Ƿ����¼��ظ�ҳ��
		width: 600,// ���ڿ�
		height: 400// ���ڸ�
			
    });
    g_pop.setContent("title", "ע��");//���ô��ڱ�������
    g_pop.setContent("contentUrl", "register.asp");// ���ô�������
    g_pop.build();
    g_pop.show();
}

