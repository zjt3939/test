<?php
/**
 *  QueryList使用示例
 *  
 * 入门教程:http://doc.querylist.cc/site/index/doc/4
 * 
 * QueryList::Query(采集的目标页面,采集规则[,区域选择器][，输出编码][，输入编码][，是否移除头部])
* //采集规则
* $rules = array(
*   '规则名' => array('jQuery选择器','要采集的属性'[,"标签过滤列表"][,"回调函数"]),
*   '规则名2' => array('jQuery选择器','要采集的属性'[,"标签过滤列表"][,"回调函数"]),
*    ..........
*    [,"callback"=>"全局回调函数"]
* );
 */

require 'vendor/autoload.php';

use QL\QueryList;

/*//采集某页面所有的图片
$data = QueryList::Query('https://www.youtube.com/channel/UCLRCoLpDImkbFw8D3qXFpUQ',array(
    'image' => array('img','src')
    ))->data;
//打印结果
print_r($data);
*/
/*************************************************/

//使用插件
$urls = QueryList::run('Request',array(
        'target' => 'https://www.zhihu.com',
        'referrer'=>'https://www.zhihu.com',
        'method' => 'GET',
        'user_agent'=>'ozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36',
        'cookiePath' => 'd_c0="AGBC_rZEUAuPTveisffwkDYRg7DcM2-UN68=|1487145283"; q_c1=da0bfb9f46514be59b593f29f26ee448|1492050428000|1492050428000; r_cap_id="M2NlNTI3ODQ2NmQ4NDgyYTkzYWNmNDk3YmY3NjkyZTA=|1492050428|55c8ba8a3dc7c3b03c6616a5cf5543b11fb9349f"; cap_id="MmMxZjE5YzlhNmZhNGZhMDk1ZDlmYTBmMGNiYzAyMWQ=|1492050428|0f8bae917b3158177c11ff04a277ae333c09f438"; l_cap_id="NmEyZTFjZTljYWUwNDIyMjliM2Q5NGUwODFmNzZlMmY=|1492050428|753105efe2c5acb530f1f3a391c375dd4b2bc8f8"; _zap=8b4de9d5-1f0f-437a-a1d0-fe6c7d5bcb93; aliyungf_tc=AQAAAA78IxmAngAAu/BdcbFaxZdre5LN; _xsrf=1840c99a91d3a2df85444fb4e630a33c; __utma=51854390.2015510632.1492050433.1492050433.1492153102.2; __utmc=51854390; __utmz=51854390.1492153102.2.2.utmcsr=baidu|utmccn=(organic)|utmcmd=organic; __utmv=51854390.100--|2=registration_date=20170413=1^3=entry_date=20170413=1; z_c0=Mi4wQUdBQ3FKQmNtUXNBWUVMLXRrUlFDeGNBQUFCaEFsVk5NbThXV1FDZ3ZxMG9mNkZ6NEVZUE5JLWxTRHhSUUpjRUxn|1492158696|12dd5b3d1c5a83ac1953ab9bbbc46383f2bfc28c',
    ));
echo($urls->html);


/*$urls = QueryList::run('Request',array(
        'target' => 'https://www.youtube.com/channel/UCLRCoLpDImkbFw8D3qXFpUQ',
        'referrer'=>'https://www.youtube.com/channel/UCLRCoLpDImkbFw8D3qXFpUQ',
        'method' => 'GET',
        'user_agent'=>'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36',
        'cookiePath' => 'VISITOR_INFO1_LIVE=rL7CGxVqS4s; LOGIN_INFO=APSEuhMwRgIhAPj4LwzMZj4bnhsyWXZgLn2dA4WWQBOlANZtfTHoCDspAiEAulQFyhlnsqTkwl2xtvCXN9OpBHPbbgsPN6DPT07tFRw:QUQzY2JKWkpSSWh6dG9BRFhuX3FoTGJjSV9NdlFKWGRHZnZMeUk5bEVlc01LUnJNMC14ZFBKaDN6V2syX0pBUzR4Q3NLZTBUVDlLVUotOHRRT2M2alBTamZWSjZ3V0QyVkF6Rl9jcGtTdmhELVM1dDdqYldkLUZ0em40LUxHYzF6TmQ3cnc3aGp1VmpuNXctdEU3QUdlZ2FQQ0xHTW9feU1R; SID=gwShMf9CAMk8GB6o5ZxcKLDgcdBxmqSZXRKI5Ofu-9BfnUF1P9krlBdBjJAzPwjYCyx7Rg.; HSID=AY5nHQ_TIOnhGg3Hc; SSID=AqRD-Oyz--iX98THM; APISID=G8_EKri5rLWiwEi4/AkbGis7JXZNolRIJ1; SAPISID=orXnJPsP70z576S6/AbLhFMkr4quEcCzwc; CONSENT=YES+CN.zh-CN+20170226-18-0; _ga=GA1.2.1964651267.1491064702; YSC=weZ-XxZe9Rk; PREF=cvdm=grid&f5=30&al=zh-CN&f1=50000000&f4=4000000',
    ));
var_dump($urls);*/