var fecmHook = {
	url : 'http://fecm.cn',	//后端接受的地址
	whiteList : ['libs.baidu.com','ib.sinaapp.com','upcdn.b0.upaiyun.com','cdn.staticfile.org','cdn.bootcss.com','cdnjs.cloudflare.com','ajax.googleapis.com','code.jquery.com','js.cdnbee.com','bdimg.share.baidu.com','assets-cdn.github.com'],	//白名单
	jsLink : [],	//用于存放第三方js的链接
	base64 : {	//base64编码解码
		table:[
           'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H',
           'I', 'J', 'K', 'L', 'M', 'N', 'O' ,'P',
           'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X',
           'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f',
           'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n',
           'o', 'p', 'q', 'r', 's', 't', 'u', 'v',
           'w', 'x', 'y', 'z', '0', '1', '2', '3',
           '4', '5', '6', '7', '8', '9', '+', '/'
 	  	],
		UTF16ToUTF8 : function(str) {
			var res = [], len = str.length;
			for (var i = 0; i < len; i++) {
				var code = str.charCodeAt(i);
				if (code > 0x0000 && code <= 0x007F) {
					res.push(str.charAt(i));
	           } else if (code >= 0x0080 && code <= 0x07FF) {
					var byte1 = 0xC0 | ((code >> 6) & 0x1F);
					var byte2 = 0x80 | (code & 0x3F);
					res.push(
						String.fromCharCode(byte1),
						String.fromCharCode(byte2)
					);
	           } else if (code >= 0x0800 && code <= 0xFFFF) {
					var byte1 = 0xE0 | ((code >> 12) & 0x0F);
					var byte2 = 0x80 | ((code >> 6) & 0x3F);
					var byte3 = 0x80 | (code & 0x3F);
					res.push(
						String.fromCharCode(byte1),
						String.fromCharCode(byte2),
						String.fromCharCode(byte3)
					);
	        	}
       		}
       		return res.join('');
   		},
  		UTF8ToUTF16 : function(str) {
			var res = [], len = str.length;
			var i = 0;
			for (var i = 0; i < len; i++) {
				var code = str.charCodeAt(i);
				if (((code >> 7) & 0xFF) == 0x0) {
					res.push(str.charAt(i));
				} else if (((code >> 5) & 0xFF) == 0x6) {
					var code2 = str.charCodeAt(++i);
					var byte1 = (code & 0x1F) << 6;
					var byte2 = code2 & 0x3F;
					var utf16 = byte1 | byte2;
					res.push(Sting.fromCharCode(utf16));
				} else if (((code >> 4) & 0xFF) == 0xE) {
					var code2 = str.charCodeAt(++i);
					var code3 = str.charCodeAt(++i);
					var byte1 = (code << 4) | ((code2 >> 2) & 0x0F);
					var byte2 = ((code2 & 0x03) << 6) | (code3 & 0x3F);
					utf16 = ((byte1 & 0x00FF) << 8) | byte2
					res.push(String.fromCharCode(utf16));
				}
			}
       		return res.join('');
  	 	},
		encode : function(str) {
			if(!str) return '';
			var utf8  = this.UTF16ToUTF8(str);
			var i = 0;
			var len = utf8.length;
			var res = [];
			while (i < len) {
				var c1 = utf8.charCodeAt(i++) & 0xFF;
				res.push(this.table[c1 >> 2]);
				if (i == len) {
					res.push(this.table[(c1 & 0x3) << 4]);
					res.push('==');
				break;
				}
				var c2 = utf8.charCodeAt(i++);
				if (i == len) {
					res.push(this.table[((c1 & 0x3) << 4) | ((c2 >> 4) & 0x0F)]);
					res.push(this.table[(c2 & 0x0F) << 2]);
					res.push('=');
					break;
				}
				var c3 = utf8.charCodeAt(i++);
				res.push(this.table[((c1 & 0x3) << 4) | ((c2 >> 4) & 0x0F)]);
				res.push(this.table[((c2 & 0x0F) << 2) | ((c3 & 0xC0) >> 6)]);
				res.push(this.table[c3 & 0x3F]);
			}
 			return res.join('');
		},
		decode : function(str) {
			if(!str) return '';
			var len = str.length;
			var i   = 0;
			var res = [];
			while (i < len) {
				code1 = this.table.indexOf(str.charAt(i++));
				code2 = this.table.indexOf(str.charAt(i++));
				code3 = this.table.indexOf(str.charAt(i++));
				code4 = this.table.indexOf(str.charAt(i++));
				c1 = (code1 << 2) | (code2 >> 4);
				c2 = ((code2 & 0xF) << 4) | (code3 >> 2);
				c3 = ((code3 & 0x3) << 6) | code4;
				res.push(String.fromCharCode(c1));
				if(code3 != 64) res.push(String.fromCharCode(c2));
				if(code4 != 64) res.push(String.fromCharCode(c3));
			}
			return this.UTF8ToUTF16(res.join(''));
		}
	},
	ajax : function(url, fnOnSucc){	//ajax方法
		var oAjax=null;
		if(window.ActiveXObject){
			oAjax=new ActiveXObject("Msxml2.XMLHTTP")||new ActiveXObject("Microsoft.XMLHTTP");
		}
		else{
			oAjax=new XMLHttpRequest();
		}
		oAjax.open('get', fecmHook.url+"/Api/downPage/url/"+fecmHook.base64.encode(url), true);
		oAjax.onreadystatechange=function (){
			if(oAjax.readyState==4){
				if(oAjax.status==200){
					if(fnOnSucc){
						fnOnSucc(oAjax.responseText);
					}
				}
			}
		};
		oAjax.send();
	},
	alertHook : {	//alert的Hook
		checkHook : function(){	//检测当前的hook
			alertInfo = alert.toString();
			if (alertInfo.length < 40 && alertInfo.indexOf("[native code]") != -1) {
				fecmHook.alertHook.startHook();
			}
		},
		startHook : function(){	//设置alert的hook
			var _backAlert = alert;
			window.alert = function(str){
				_backAlert(str);
				new Image().src = fecmHook.url+'/Api/addVul/category/1';
			}
		},
	},
	getJsLink : {	//获取字符串里所有url为javascript脚本
		deepNum : 0,
		getStrContent : function(strContent){
			if(fecmHook.getJsLink.deepNum > 3){
				return false;
			}
			urlLinks = strContent.match(/(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:/~\+#]*[\w\-\@?^=%&/~\+#])?/gim);
			urlLinks.map(function(urlAddr){
				for(var i = 0; i < fecmHook.whiteList.length;i++){
					if(fecmHook.whiteList[i] == urlAddr){
						return false;
					}
				}
				fecmHook.ajax(urlAddr,function(content){
					var regContent = new RegExp(/^(\S|\s){1,5}(\(function|function|\/\/|\/\*|var|let|alert|confirm|prompt)/);
					if(regContent.test(content)){
						console.log(urlAddr)
						fecmHook.jsLink.push(urlAddr);
						fecmHook.getJsLink.deepNum++;
						fecmHook.getJsLink.getStrContent(content);
					}
				})
			})
			return true;
		}
	},
	checkJsContent : function(jsUrl){	//检测javascript文件里的内容
		baseNum = 0;
		fecmHook.ajax(jsUrl,function(content){
			if(content.length < 1500){
				baseNum++;
			}
			if(content.indexOf("do=keepsession") != -1){
				baseNum+=2;
			}
			if(content.indexOf("document.cookie") != -1){
				baseNum+2;
			}
			if(content.indexOf("keep=new Image();keep.src") != -1){
				baseNum+3;
			}
			if(content.indexOf("escape((function(){try{return") != -1){
				baseNum++;
			}
			if(content.indexOf("window.opener && window.opener.location.href") != -1){
				baseNum+=2;
			}
			if(new RegExp(/do=api&id=[a-zA-z0-9]{2,10}&/).test(content)){
				baseNum+=4;
			}
			if(new RegExp(/&cookie=.*&opener/).test(content)){
				baseNum+2;
			}
			if(jsUrl.indexOf("xss") != -1){
				baseNum+=2;
			}
			if(baseNum > 5){
				new Image().src = fecmHook.url+'/Api/addVul/category/2/url/fecmHook.base64.encode(url)';
			}
		})
	}
};

(function(){
	fecmHook.alertHook.checkHook();
	if(fecmHook.getJsLink.getStrContent(document.getElementsByTagName("html")[0].innerHTML)){
		fecmHook.jsLink.map(function(jsUrl){
			fecmHook.checkJsContent(jsUrl);
		})
	}
	setTimeout(arguments.callee,60000);
})();