<?php


/***
所有由用户直接访问到的这些页面

都得先加载init.php
***/
define('ACC',true);
require('./include/init.php');

$goods=new GoodsModel();
$newlist=$goods->getNew(5);

//取女士
$female_id=4;
$felist=$goods->catGoods($female_id);
//取男士
$man_id=1;
$manlist=$goods->catGoods($man_id);

require('./view/front/index.html');



?>