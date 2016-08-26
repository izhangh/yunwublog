<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi.cn@gmail.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

class WechatAuthCompany {
    
    /* 消息类型常量 */
    const MSG_TYPE_TEXT     = 'text';
    const MSG_TYPE_IMAGE    = 'image';
    const MSG_TYPE_VOICE    = 'voice';
    const MSG_TYPE_VIDEO    = 'video';
    const MSG_TYPE_FILE     = 'file';
    const MSG_TYPE_NEWS     = 'news';
    const MSG_TYPE_MPNEWS   = 'mpnews';
    
    /**
     * 微信开发者申请的appID
     * @var string
     */
    private $corpid = '';

    /**
     * 微信开发者申请的appSecret
     * @var string
     */
    private $corpsecret = '';

    /**
     * 获取到的access_token
     * @var string
     */
    private $accessToken = '';

    /**
     * 微信api根路径
     * @var string
     */
    private $apiURL    = 'https://qyapi.weixin.qq.com/cgi-bin';

    /**
     * 微信媒体文件根路径
     * @var string
     */
    private $mediaURL  = 'http://qyfile.api.weixin.qq.com/cgi-bin';
    

    /**
     * 构造方法，调用微信高级接口时实例化SDK
     * @param string $appid  微信appid
     * @param string $secret 微信appsecret
     * @param string $token  获取到的access_token
     */
    public function __construct($corpid, $corpsecret, $token = null){
        if($corpid && $corpsecret){
            $this->corpid     = $corpid;
            $this->corpsecret = $corpsecret;

            if(!empty($token)){
                $this->accessToken = $token;
            }
        } else {
            throw new \Exception('参数错误！');
        }
    }

    public function getRequestCodeURL($redirect_uri, $state = null,
        $scope = 'snsapi_userinfo'){
        
        $query = array(
            'appid'         => $this->appId,
            'redirect_uri'  => $redirect_uri,
            'response_type' => 'code',
            'scope'         => $scope,
        );

        if(!is_null($state) && preg_match('/[a-zA-Z0-9]+/', $state)){
            $query['state'] = $state;
        }

        $query = http_build_query($query);
        return "{$this->requestCodeURL}?{$query}#wechat_redirect";
    }

    /**
     * 获取access_token，用于后续接口访问
     * @return array access_token信息，包含 token 和有效期
     */
    public function getAccessToken($type = 'client', $code = null){
        $param = array(
            'corpid'  => $this->corpid,
            'corpsecret' => $this->corpsecret
        );
		$url = "{$this->apiURL}/gettoken";
        $token = self::http($url, $param);
        $token = json_decode($token, true);

        if(is_array($token)){
            if(isset($token['errcode'])){
                throw new \Exception($token['errmsg']);
            } else {
                $this->accessToken = $token['access_token'];
                return $token;
            }
        } else {
            throw new \Exception('获取微信access_token失败！');
        }
    }
    /**
     * 获取授权用户信息
     * @param  string $token acess_token
     * @param  string $lang  指定的语言
     * @return array         用户信息数据，具体参见微信文档
     */
    public function getUserInfo($token, $lang = 'zh_CN'){
        $query = array(
            'access_token' => $token['access_token'],
            'openid'       => $token['openid'],
            'lang'         => $lang,
        );

        $info = self::http("{$this->oauthApiURL}/userinfo", $query);
        return json_decode($info, true);
    }

    /**
     * 上传媒体资源
     * @param  string $filename 媒体资源本地路径
     * @param  string $type     媒体资源类型，具体请参考微信开发手册
     */
    public function mediaUpload($filename, $type){
        $param = array(
            'access_token' => $this->accessToken,
            'type'         => $type
        );

        $filename = realpath($filename);
        if(!$filename) throw new \Exception('资源路径错误！');
        
        $file = array('media' => "@{$filename}");
        $url  = "{$this->mediaURL}/media/upload";
        $data = self::http($url, $param, $file, 'POST');

        return json_decode($data, true);
    }

    /**
     * 获取媒体资源下载地址
     * 注意：视频资源不允许下载
     * @param  string $media_id 媒体资源id
     * @return string           媒体资源下载地址
     */
    public function mediaGet($media_id){
        $param = array(
            'access_token' => $this->accessToken,
            'media_id'     => $media_id
        );

        $url = "{$this->mediaURL}/media/get?";
        return $url . http_build_query($param);
    }

    /**
     * 给指定用户推送信息
     * @param  string $openid  用户的openid
     * @param  array  $content 发送的数据，不同类型的数据结构可能不同
     * @param  string $type    推送消息类型
     */
    public function messageCustomSend($touser,$toparty,$totag, $agentid, $content,$type = self::MSG_TYPE_TEXT,$safe = 0){
        
        //基础数据
        $data = array(
            'touser'=>$touser,
        	'toparty'=>$toparty,
	        'totag'=>$totag,
            'msgtype'=>$type,
	        'agentid'=>$agentid,
	        'safe'=>$safe     
        );

        //根据类型附加额外数据
        $data[$type] = call_user_func(array(self, $type), $content);

        return $this->api('message/send', $data);
    }

    /**
     * 发送文本消息
     * @param  string $openid 用户的openid
     * @param  string $text   发送的文字
     */
    public function sendText($touser,$toparty,$totag, $agentid, $content){
        return $this->messageCustomSend($touser,$toparty,$totag, $agentid, $content, self::MSG_TYPE_TEXT);
    }

    /**
     * 发送图片消息
     * @param  string $openid 用户的openid
     * @param  string $media  图片ID
     */
    public function sendImage($touser,$toparty,$totag, $agentid, $media){
        return $this->messageCustomSend($touser,$toparty,$totag, $agentid, $media, self::MSG_TYPE_IMAGE);
    }

    /**
     * 发送语音消息
     * @param  string $openid 用户的openid
     * @param  string $media  音频ID
     */
    public function sendVoice($touser,$toparty,$totag, $agentid, $media){
        return $this->messageCustomSend($touser,$toparty,$totag, $agentid, $media, self::MSG_TYPE_VOICE);
    }

    /**
     * 发送视频消息
     * @param  string $openid      用户的openid
     * @param  string $media_id    视频ID
     * @param  string $title       视频标题
     * @param  string $discription 视频描述
     */
    public function sendVideo(){
        $video  = func_get_args();
        $openid = array_shift($video);
        return $this->messageCustomSend($openid, $video, self::MSG_TYPE_VIDEO);
    }

    /**
     * 发送图文消息
     * @param  string $openid 用户的openid
     * @param  array  $news   图文内容 [标题，描述，URL，缩略图]
     * @param  array  $news1  图文内容 [标题，描述，URL，缩略图]
     * @param  array  $news2  图文内容 [标题，描述，URL，缩略图]
     *                ...     ...
     * @param  array  $news9  图文内容 [标题，描述，URL，缩略图]
     */
    public function sendNews(){
        $news   = func_get_args();
        $openid = array_shift($news);
        return $this->messageCustomSend($openid, $news, self::MSG_TYPE_NEWS);
    }

    /**
     * 发送一条图文消息
     * @param  string $openid      用户的openid
     * @param  string $title       文章标题
     * @param  string $discription 文章简介
     * @param  string $url         文章连接
     * @param  string $picurl      文章缩略图
     */
    public function sendNewsOnce(){
        $news   = func_get_args();
        $openid = array_shift($news);
        $news   = array($news);
        return $this->messageCustomSend($openid, $news, self::MSG_TYPE_NEWS);
    }

    /**
     * 创建自定义菜单
     * @param  array $button 符合规则的菜单数组，规则参见微信手册
     */
    public function menuCreate($button){
        $data = array('button' => $button);
        return $this->api('menu/create', $data);
    }

    /**
     * 获取所有的自定义菜单
     * @return array  自定义菜单数组
     */
    public function menuGet(){
        return $this->api('menu/get', '', 'GET');
    }

    /**
     * 删除自定义菜单
     */
    public function menuDelete(){
        return $this->api('menu/delete', '', 'GET');
    }

    /**
     * 调用微信api获取响应数据
     * @param  string $name   API名称
     * @param  string $data   POST请求数据
     * @param  string $method 请求方式
     * @param  string $param  GET请求参数
     * @return array          api返回结果
     */
    protected function api($name, $data = '', $method = 'POST', $param = ''){
        $params = array('access_token' => $this->accessToken);

        if(!empty($param) && is_array($param)){
            $params = array_merge($params, $param);
        }

        $url  = "{$this->apiURL}/{$name}";
        if(!empty($data)){
            //保护中文，微信api不支持中文转义的json结构
            array_walk_recursive($data, function(&$value){
                $value = urlencode($value);
            });
            $data = urldecode(json_encode($data));
        }

        $data = self::http($url, $params, $data, $method);

        return json_decode($data, true);
    }
    
    /**
     * 发送HTTP请求方法，目前只支持CURL发送请求
     * @param  string $url    请求URL
     * @param  array  $param  GET参数数组
     * @param  array  $data   POST的数据，GET请求时该参数无效
     * @param  string $method 请求方法GET/POST
     * @return array          响应数据
     */
    protected static function http($url, $param, $data = '', $method = 'GET'){
        $opts = array(
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        );
        /* 根据请求类型设置特定参数 */
        $opts[CURLOPT_URL] = $url . '?' . http_build_query($param);

        if(strtoupper($method) == 'POST'){
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $data;
            
            if(is_string($data)){ //发送JSON数据
                $opts[CURLOPT_HTTPHEADER] = array(
                    'Content-Type: application/json; charset=utf-8',  
                    'Content-Length: ' . strlen($data),
                );
            }
        }

        /* 初始化并执行curl请求 */
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $data  = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        //发生错误，抛出异常
        if($error) throw new \Exception('请求发生错误：' . $error);

        return  $data;
    }
    /**
     * 构造文本信息
     * @param  string $content 要回复的文本
     */
    private static function text($content){
        $data['content'] = $content;
        return $data;
    }

    /**
     * 构造图片信息
     * @param  integer $media 图片ID
     */
    private static function image($media){
        $data['media_id'] = $media;
        return $data;
    }

    /**
     * 构造音频信息
     * @param  integer $media 语音ID
     */
    private static function voice($media){
        $data['media_id'] = $media;
        return $data;
    }

    /**
     * 构造视频信息
     * @param  array $video 要回复的视频 [视频ID，标题，说明]
     */
    private static function video($video){
        $data = array();
        list(
            $data['media_id'],
            $data['title'], 
            $data['description'], 
        ) = $video;

        return $data;
    }

    /**
     * 构造图文信息
     * @param  array $news 要回复的图文内容
     * [    
     *      0 => 第一条图文信息[标题，说明，图片链接，全文连接]，
     *      1 => 第二条图文信息[标题，说明，图片链接，全文连接]，
     *      2 => 第三条图文信息[标题，说明，图片链接，全文连接]， 
     * ]
     */
    private static function news($news){
        $articles = array();
        foreach ($news as $key => $value) {
            list(
                $articles[$key]['title'],
                $articles[$key]['description'],
                $articles[$key]['url'],
                $articles[$key]['picurl']
            ) = $value;

            if($key >= 9) break; //最多只允许10条图文信息
        }

        $data['articles']     = $articles;
        return $data;
    }
    /*
     * 获取jsapi_ticket
     */
	public function getJsapiTicket($access_token){
    	$data = array('access_token' => $access_token,
    				  'type' => 'jsapi');
    	return $this->api("ticket/getticket",'', 'GET', $data);
    }
	/*
     * 发送模板消息
     */
    public function sendTplMsg($touser,$template_id,$url,$topcolor,$par){
    	$data = array('touser' 		=> $touser,
    				  'template_id' => $template_id,
    				  'url'			=> $url,
    				  'topcolor' 	=> $topcolor,
    				  'data'		=> $par);
    	//echo (json_encode($data));
    	return $this->api("message/template/send",$data);
    }
}
?>
