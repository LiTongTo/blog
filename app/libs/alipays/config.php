<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016101800717604",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpgIBAAKCAQEA2bkR78gtsqx5Olcbi41SGOPL9z1/ik5Lc7WWF3bVULlkUGDCQj/aj7ChpHUa5C5o9lGYFgSBL7ei5fTRKzp91ItG+69z/cEUEn6rEyjj/rJ6p3g8WC4URR00AGZfe3Fx6/c3KdGHB1+/T2qLLBZsMJKCgvojbsHxA96D1j8EEgdU6zVsIj5wDOqs3SfbtioteRsyhOzMOtxrd7gd6R3WHBgXKCGunCoLaeLLn8nTMFLyUO/Yjw4R/GvvqwYoAmypLD/phyNg71TiNFhIqUVYs2bXFZqynExLtoOruVH7WPVZlGzjgTJnDsspCM1bG0yOcODXPz7Z9SJiV4cbBi9oBwIDAQABAoIBAQC1dIT6br+HVi+C6+5NFG8Dx3bKjDqrri08Nm7tB2Epchmk07+TL1ycvP06706GNhfMkpxKXV69wjLFrJBXktwkNB/oy4XESxLLhz5VLZM3RtDqmk7Qvzatk3UvkCKr4xSrMNKMy8/Z2Xa8XXO4PsfUg4a6WncFbCXOr7j46nQeAOv4TWHV1nfm1BsWb/0dWaOFubr4e416jZreqkUtl75bVQAKCsdj5xhT+FAacJPIvdGCgZ+KXibzOrpkdEzttiK/CkrvItvHX7tPRVZEm5lklJVlCYg6myPHWFk9jDriZCkKkM+TFoZZw4co/mHIkEHX3lNRcO3QiG379MI8Q9FhAoGBAPuHMGwzusreA7DfxyjbNWfnODn1WXfLzKOXKG0JKPXmS5V39EOP4XB0G+/iNItvGFsJpspFRRdaK2/K9PyaGWTX/CDRI/XXiQavexaJBGEmf9Q4lIlohL58UEESKzHOTsdzYj5CHikdvvsGAbVqwGcHPfXloAR+0hVDPLzMF30bAoGBAN2YBPPEoWPEMLXJUdV1EXOgaQOJYH7eaJnLRvzvWBbFM/81Z3kdbRZX19MfWWiOnwyjOmxKDvB3T9PZn71K87Uqhwqj0qKYLtU0qIa5rSHE96/43pQerCs4roLnUWrkEB+C88NkqIxhczZ7gTl7mCjzCZWERTRbMafQ/frIxcuFAoGBAIuZE1nqN/Ch2aCQAkP9rZ1WKdGZByfCt3fPzAMAA3i+cRKquanJsBAukNbJT+pXJUhZifVXDqqQQ+1O0jtj91YNvYQlLvUhw44vVHxEXWbh7C5HnMDKfmoOKqiCwfBplTWDJ3JwVbbyKG2/frFGZzSHQ283G2GDVWuxnoMWLq8jAoGBAJRK8bV4t1CesMJW8c7Zw04P4Xceblc42+NgKCeIvPiwDDYUNSTWTnSPYL3G0vynxUSdz7E8dnbyQZfSoZX6HNH2ndy++W0aTu0bilRu2bApsmAvOjUBudJK4m50AwZ3jVqpNhxitnELniCt0jL3xUJSMu2+UNnS1Y4qzG0SA1xJAoGBALwHgId0xY1FzbRxPO619cSVLmib1zruHmouR29d872uAuLQXoIxHpBwVidERlDqXHXaTnT54eTHc+faw6LBDpXPJjTd+EGwSJoTxCdK9au273dVCPOFdNRuTly/jMjDzPURfpginWCNNc1JrC0Xu+A5hJYNObHuRez9ujP9t3lT",
		
		//异步通知地址
		'notify_url' => "http://工程公网访问地址/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",
		
		//同步跳转
		'return_url' => "http://localhost/alipays/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA1F3NTEDg+FEyi6+Dg9EjOB0ZpMKocsFwju1Mw4H2hd6PkLzTwj/b0kRGahgXuGOtTdot2py7q/iJUyeS0pUjB2R9g8s4ANPxyUzJLWCAlpP9fxKkOkuT+qmEEzr9fO5p/eGJaxA6nLfCo3hSOIoVucrKZoixgChwLmkfp35zSKqpl+U63j/60HrMwCAGhuSLgFlDV33vvsgxJ0jij8zZC0IwmaqepZJPHNfW9fdFF/tHQ6k2PzZ1BeLvwTmkQXprMsjhNrUdfmOV7NNl9Z7PAdorVvMlJ6mea19SE7vcmvekgFKpUF1qlxk40hDM6N/5ZP8OSvvf5lRsXE+p9WkczQIDAQAB",
		
	
);