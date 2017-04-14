<?php
/*$ch = curl_init('https://www.youtube.com/channel/UC9oEzPGZiTE692KucAsTY1g');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1); // https请求 不验证证书和hosts
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
$output = curl_exec($ch);
curl_close($ch);
echo $output;*/
include './phpQuery.php';

function curlPost($url){
    $ssl = substr($url,0,8) =="https://"?true:false;
    $ch = curl_init();
    $opt = [
        CURLOPT_URL =>$url,
        CURLOPT_POST =>0,
        CURLOPT_HEADER =>0,
        //CURLOPT_POSTFIELDS =>(array)$data,
        CURLOPT_RETURNTRANSFER =>1,
        CURLOPT_TIMEOUT=>600
    ];
    if($ssl){
        $opt[CURLOPT_SSL_VERIFYHOST] = false;
        $opt[CURLOPT_SSL_VERIFYPEER] = false;
    }
    curl_setopt_array($ch,$opt);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
function arrToOne($multi) {
  $arr = array();
  foreach ($multi as $key => $val) {
    if( is_array($val) ) {
      $arr = array_merge($arr, arrToOne($val));
    } else {
      $arr[] = $val;
    }
  }
  return $arr;
}

function arrToString($arr){
    $data = '';
    foreach($arr as $key=>$val){
        $data.=($val.'\n');
    }
    return $data;
}
$album ='/http.*jwjam.com.Jwjam.Article.article_list.album_id=\d*/';
$album_detail = '/http.*jwjam.com.Jwjam.Article.article_detail\/\d*/';
$video_url_preg = '/<iframe.*>.*<\/iframe>/';
$album_title ='/<span class\=\"bottom\_box\"\>([.]*)\<\/span\>/';


phpQuery::newDocumentFile('http://jwjam.com/Jwjam/Article/article_album');
print_r(explode("\n",pq(".bottom_box")->html())[1]);

// $title_data = curlPost('http://jwjam.com/Jwjam/Article/article_album');
// preg_match_all($album_title,$title_data,$title_arr);
// echo $title_data;
// var_dump($title_data);
// var_dump($title_arr);
// $data = curlPost('http://jwjam.com/Jwjam/Article/article_album');
// preg_match_all($album,$data,$arr);
// // var_dump($arr);
// $album_detail_arr =[];
// $count =0;
// foreach($arr[0] as $key=>$val){
//     sleep(1);
//     $album_data = curlPost($val);
//     preg_match_all($album_detail,$album_data,$album_detail_arr[$count]);
//     $count++;
// }
// $album_detail_arr=arrToOne($album_detail_arr);
// $video_url_arr = [];
// $vcount = 0;
// foreach($album_detail_arr as $key=>$val){
//     $video_url_data = curlPost($val);
//     preg_match_all($video_url_preg,$video_url_data,$video_url_arr[$vcount]);
//     $vcount++;
// }

// $fp=fopen('file.txt', 'w');
// fwrite($fp, arrToString(arrToOne($video_url_arr)));
// fclose($fp);



// echo file_get_contents('https://www.youtube.com/channel/UC9oEzPGZiTE692KucAsTY1g');