<?php 
 defined('ACC')||exit('ACC Denied');
   class Mysql extends db{
                private static $ins = null;//保存实例静态成员变量
                private $conf = array();//保存从配置文件读写类传的参数用数组保存
                private $conn = null;//保存连接的资源
        public function __construct(){
                //应该是在构造方法里，读取配置文件
                $this->conf = conf::getIns();
                //连接
                $this->connect($this->conf->host,$this->conf->user,$this->conf->pwd);
                //切换库
                $this->select_db($this->conf->db);
                //设置字符集
                $this->setChar($this->conf->char);
        }
        //析构函数
        public function __destruct(){
        
        }
        //实例化对象
        public static function getIns(){
                        //instanof判断$ins是否是自身的实例
                        if (self::$ins instanceof self){
                                return self::$ins;
                        }else {
                                //不是自身实例，new一个
                                self::$ins = new self();
                                return self::$ins;
                        }
                }
        //负责链接数据库
        public  function connect($h,$u,$p){
                $this->conn = mysql_connect($h,$u,$p);
                if (!$this->conn){
                        $err = new Exception('连接失败');
                        throw $err;
                }
        }
        //负责切换数据库
        public function select_db($db){
                $sql = 'use ' . $db;
                $this->query($sql);
        }
        //设置字符集
        public function setChar($char){
                $sql = 'set names '.$char;
                return $this->query($sql);
        }
        //负责发送sql查询
        public function query($sql){
                $rs = mysql_query($sql,$this->conn);
                log::write($sql);
                return $rs;
        }
        //拼接sql语句
        public function autoExcute($arr,$table,$mode='insert',$where = 'where 1 limit 1'){
                        /*
                         * insert into tbname(username,passwd,email)values('',)
                         * 把所有键名用','接起来
                         * implode(','array_keys($arr));    用implode拼接字符串（返回数组中的键名用，隔开）
                         * implode(','array_values($arr));    用implode拼接字符串（返回数组中的值用，隔开）
                         */
                         
                         
                        if (!is_array($arr)){
                                return false;
                        }
                        if ($mode == 'update'){
                                $sql = 'update '.$table.' set ';
                                foreach ($arr as $k=>$v){
                                        $sql .= $k ."='".$v ."',";
                                }
                                $sql = rtrim($sql,',');
                                $sql .=" ".$where;
                                
                                return $this->query($sql);
                        }
                        $sql = 'insert into ' . $table . '(' .implode(',', array_keys($arr)) . ')';
                        $sql .= 'values(\'';
                        $sql .= implode("','",array_values($arr));
                        $sql .= '\')';
                        
                        return $this->query($sql);
        }
        
        //负责获取多列多行select结果
        public function getAll($sql){                
                $rs = $this->query($sql);
                $list = array();
                while ($row = mysql_fetch_assoc($rs)){
                        $list[] = $row;
                }
                return $list;
        }
        //获取一行的结果
        public function getRow($sql){
                $rs = $this->query($sql);

                return mysql_fetch_array($rs);
        }
        //获取单个的值
        public function getOne($sql){
                $rs = $this->query($sql);
                $row = mysql_fetch_array($rs);
                return $row[0];

        }
        //返回影响行数的函数
        public function affected_rows(){
                return mysql_affected_rows($this->conn);
        }
        //返回最新的auto_increment列的自增长的值
        public function insert_id(){
                return mysql_insert_id($this->conn);
        }
        //关闭资源
        public function close(){
                mysql_close($this->conn);
        }
}


 ?>