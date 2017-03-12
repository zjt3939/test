<?php
// $a = [
//     ['key1'=>940,'key2'=>'blah'],
//     ['key1'=>20,'key2'=>'this'],
//     ['key1'=>50,'key2'=>'that'],
// ];
// print_r($a);
// function asc_number_sort($x,$y){
//     if($x['key1']>$y['key1']){
//         return true;
//     }elseif($x['key1']<$y['key2']){
//         return false;
//     }else{
//         return 0;
//     }
// }

// $b =$a;
// function string_sort($x,$y){
//     return strcasecmp($x['key2'],$y['key2']);

// }

// usort($b,'string_sort');
// print_r($b);

// var_dump(usort($a,'asc_number_sort'));
// print_r($a);


// $a ='c_6';
// $c = substr_count($a,'c');
// echo $c;
// $b = explode('_',$a)[1];
// var_dump($b);



// $a = 'ss_ss';
// $b = explode('_',$a);
// print_r($b);
// echo "<br>";
// print_r($a);
function mysort($a,$b){
    if($a==$b) return 0;
    return $a>$b?1:-1;
}

$a =array(2,4,1,5,3);
usort($a,'mysort');
print_r($a);