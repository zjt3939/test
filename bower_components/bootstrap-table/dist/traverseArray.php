<?php
$data =[
    ['id'=>1,'name'=>'ztt1','pid'=>0],
    ['id'=>2,'name'=>'ztt2','pid'=>0],
    ['id'=>3,'name'=>'ztt3','pid'=>1],
    ['id'=>4,'name'=>'ztt4','pid'=>2],
    ['id'=>5,'name'=>'ztt5','pid'=>2],
    ['id'=>6,'name'=>'ztt6','pid'=>4],
    ['id'=>7,'name'=>'ztt7','pid'=>5],
    ['id'=>8,'name'=>'ztt8','pid'=>4]
];

$res = [];
$tree = [];
//整理数组
foreach($data as $key=>$vo){
    $res[$vo['id']] = $vo;
    $res[$vo['id']]['children'] = [];
}

unset($data);

//查询子孙
foreach($res as $key=>$vo){
    if($vo['pid']!=0){
        $res[$vo['pid']] ['children'][]=&$res[$key];

    }
}

//去掉杂质
foreach($res as $key=>$vo){
    if($vo['pid']==0){
        $tree[] = $vo;
    }
}

unset($res);

$tree = json_encode($tree);
// echo $tree;
print_r($tree);