<? 
function get_url ($url,$cookie=false) { 
    $url = parse_url($url); 
    $query = $url[path]."?".$url[query]; 
    ec("Query:".$query); 
    $fp = fsockopen( $url[host], $url[port]?$url[port]:80 , $errno, $errstr, 30); 
    if (!$fp) { 
        return false; 
    } else { 
        $request = "GET $query HTTP/1.1"; 
        $request .= "Host: $url[host]"; 
        $request .= "Connection: Close"; 
        if($cookie) $request.="Cookie: $cookie\n"; 
            $request.=""; 
            fwrite($fp,$request); 
            while(!@feof($fp)) { 
            $result .= @fgets($fp, 1024); 
        } 
        fclose($fp); 
        return $result; 
    } 
} 
//获取url的html部分，去掉header 
function GetUrlHTML($url,$cookie=false) { 
    $rowdata = get_url($url,$cookie); 
        if($rowdata) 
        { 
            $body= stristr($rowdata,""); 
            $body=substr($body,4,strlen($body)); 
            return $body; 
        } 
    return false; 
}
echo GetUrlHTML('http://www.baidu.com');
echo "222";


?> 