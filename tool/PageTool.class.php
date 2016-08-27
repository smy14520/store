<?php 
 /**
  * PageTool.class.php文件
  * 分页类
  **/

//defined('ACC') || exit('您无权访问该页面！');
class PageTool
{
        private $total; //总条数
        private $perpage; //每页显示的条数
        private $page; //当前页
        private $show; //每页最多显示的条数
        /**
                * 构造函数,执行初始化类
                * $total 总条数
                * $perpage 每页显示的条数
                * $page 当前页,默认为第一页
                * $show 每页最多显示的条数，默认为只显示5个页数
         **/
        public function __construct($total,$perpage,$page=1,$show=5)
        {
                $this->total=$total;
                $this->perpage=$perpage;
                $this->page=$page;
                $this->show=$show;
        }
        /**
                * 分页方法
                * return 分页结果
         **/
        public function getPage()
        {
                //计算总页数,向上取整
                $pages=ceil($this->total/$this->perpage);
                //获取url
                $url=$_SERVER['REQUEST_URI'];
                //分析url
                $parse=parse_url($url);
                $path=$parse['path'];
                //消除原有的page索引，因为page是要我们自己获取
                if(isset($parse['query'])){
                        if (isset($parse['query'])) {
                                //将query字段分割成数组
                                parse_str($parse['query'],$query);
                                //消除
                                if (isset($query['page'])) {
                                        unset($query['page']);
                                }
                        }
                }
                //再次判断$parse['query']字段是否还存在，进而重组url
                if (!empty($query)) {
                        //重组url
                        $url_get=http_build_query($query);
                        $newurl=$path.'?'.$url_get;
                }
                else {
                        $newurl=$path;
                }
                //计算分页导航
                $arr=array(); //存储在页面中显示出来的页码
                //当前页面的显示
                $arr[0]='<span class="page_now">'.$this->page.'</span>';
                $left=$this->page-1;
                $right=$this->page+1;
                $num=1;
                while($left>=1 || $right<=$pages) {
                        if ($left>=1) {
                                //判断url中是否除page字段外还有其它的字段
                                if (strpos($newurl,'?') !== false) {
                                        array_unshift($arr,'<a href="'.$newurl.'&page='.$left.'">['.$left.']</a>');
                                }
                                else {
                                        array_unshift($arr,'<a href="'.$newurl.'?page='.$left.'">['.$left.']</a>');
                                }
                                $left=$left-1;
                        }
                        //每次都要计算$num是否大于5,这样才能够保证在页数多于5时只显示5条
                        $num=count($arr);
                        if ($num>=$this->show) {
                                //压入"上一页"，字段
                                if ($this->page <= 1) {
                                        $above=$this->page;
                                }
                                else {
                                        $above=$this->page-1;
                                }
                                if (strpos($newurl,'?') !== false) {
                                        array_unshift($arr,'<a href="'.$newurl.'&page='.$above.'">上一页</a>');
                                }
                                else {
                                        array_unshift($arr,'<a href="'.$newurl.'?page='.$above.'">上一页</a>');
                                }
                                //压入"下一页"，字段
                                if ($this->page < $pages) {
                                        $next=$this->page+1;
                                }
                                else {
                                        $next=$this->page;
                                }
                                if (strpos($newurl,'?') !== false) {
                                        array_push($arr,'<a href="'.$newurl.'&page='.$next.'">下一页</a>');
                                }
                                else {
                                        array_push($arr,'<a href="'.$newurl.'?page='.$next.'">下一页</a>');
                                }
                                array_push($arr," 共".$pages."页");
                                return implode('',$arr);
                        }
                        if ($right<=$pages) {
                                //判断url中是否除page字段外还有其它的字段
                                if (strpos($newurl,'?') !== false) {
                                        array_push($arr,'<a href="'.$newurl.'&page='.$right.'">['.$right.']</a>');
                                }
                                else {
                                        array_push($arr,'<a href="'.$newurl.'?page='.$right.'">['.$right.']</a>');
                                }
                                $right=$right+1;
                        }
                        //每次都要计算$num是否大于5,这样才能够保证在页数多于5时只显示5条
                        $num=count($arr);
                        if ($num>=$this->show) {
                                //压入"上一页"，字段
                                if ($this->page <= 1) {
                                        $above=$this->page;
                                }
                                else {
                                        $above=$this->page-1;
                                }
                                if (strpos($newurl,'?') !== false) {
                                        array_unshift($arr,'<a href="'.$newurl.'&page='.$above.'">上一页</a>');
                                }
                                else {
                                        array_unshift($arr,'<a href="'.$newurl.'?page='.$above.'">上一页</a>');
                                }
                                if ($this->page < $pages) {
                                        $next=$this->page+1;
                                }
                                else {
                                        echo $right;
                                        $next=$this->page;
                                }
                                //压入"下一页"，字段
                                if (strpos($newurl,'?') !== false) {
                                        array_push($arr,'<a href="'.$newurl.'&page='.$next.'">下一页</a>');
                                }
                                else {
                                        array_push($arr,'<a href="'.$newurl.'?page='.$next.'">下一页</a>');
                                }
                                array_push($arr," 共".$pages."页");
                                return implode('',$arr);
                        }
                }
                //压入"上一页"，字段
                if ($this->page <= 1) {
                        $above=$this->page;
                }
                else {
                        $above=$this->page-1;
                }
                if (strpos($newurl,'?')) {
                        array_unshift($arr,'<a href="'.$newurl.'&page='.$above.'">上一页</a>');
                }
                else {
                        array_unshift($arr,'<a href="'.$newurl.'?page='.$above.'">上一页</a>');
                }
                //在栈尾加入"下一页"，字段
                if ($this->page <= $pages) {
                        $next=$this->page+1;
                }
                else {
                        $next=$this->page;
                }
                if (strpos($newurl,'?') !== false) {
                        array_push($arr,'<a href="'.$newurl.'&page='.$next.'">下一页</a>');
                }
                else {
                        array_push($arr,'<a href="'.$newurl.'?page='.$next.'">下一页</a>');
                }
                //压入"总页数"字段
                array_push($arr," 共".$pages."页");
                return implode('',$arr);
        }
}
//测试
//如果没有page字段，则强制设为1
//$num=isset($_GET['page']) ? $_GET['page'] : 1;
//$page=new PageTool(100,10,$num);
//$pages=$page->getPage();
//echo $pages;
?>