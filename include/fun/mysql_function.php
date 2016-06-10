<?php
header('Content-Type:text/html;charset=utf8');

/*
 * 连接数据库,返回数据库连接状态$conn
 */
function connect_db($localhost='localhost',$user='root',$pwd,$dbname,$code='utf8'){
    $conn = @mysql_connect($localhost,$user,$pwd) or die('数据库连接失败！');
    $db = @mysql_select_db($dbname) or die('数据库使用失败！');
    mysql_query("set names $code");
    return $conn;
}

/*
 *获取列表
 */

function get_list($select='*',$tablename,$condition=''){
    $sql = "select $select from $tablename $condition";
    if($select == ''){
        $select = '*';
    }
    //echo $sql;
    $info = mysql_query($sql);
    $row = array();
    while($list = mysql_fetch_assoc($info)){
        $row[] = $list;
    }
    return $row;
}

/*
 *获取记录总数
 */

function get_count($tablename,$condition=''){
    $sql = "select count(*) as c from $tablename $condition";
    $info = mysql_query($sql);
    $list = mysql_fetch_assoc($info);
    return $list['c'];
}

/*
 *获取一条记录
 */

function get_one($select='*',$tablename,$condition=''){
    $sql = "select $select from $tablename $condition";
    if($select == ''){
        $select = '*';
    }
    return query($sql);
}

function query($sql){
    $info = mysql_query($sql);
    $list = array();
    $list = mysql_fetch_assoc($info);
    return $list;
}


/*
 增加一条记录
 */
function mysql_insert($table,$data){
    $keys = array_keys($data);
    $key = implode($keys,',');
    $values = array_values($data);
    $value = '"'.implode($values,'","').'"';
    $sql = "insert into $table($key) values($value)";
    $result = mysql_query($sql);
    return $result;
}



/*
 *删除一条记录
 */
function mysql_del($tablename,$condition){
    $sql = "delete from $tablename $condition";
    return mysql_query($sql);
}

/*
 *修改一条记录信息
 */
function mysql_update($table,$data,$condition){
    $sql = "update $table set ";
    foreach($data as $key=>$value){
        $sql .= $key.'="'.$value.'",';
    }
    // echo $sql;die;
    $sql = rtrim($sql,',');
    $sql .= ' '.$condition;
    $result = mysql_query($sql);
    return $result;
}


/*
 *每页显示函数
 */
function limit($table,$current,$limit,$connect='',$condition=''){
    $row_start = $limit*($current-1);//获取分页显示当前页面的开始页面数
    $row = get_list('*',$table,"$connect $condition limit $row_start,$limit");//定义需要显示的页码记录
    return $row;
}











?>