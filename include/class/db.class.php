<?php
/**
 * Created by PhpStorm.
 * User: Cafa
 * Date: 2016/6/8
 * Time: 22:28
 */
class proPdo
{
    private static $instance;
    public $dsn;
    public $dbuser;
    public $dbpass;
    public $sth;
    public $dbh;
    public $page_size = 10;

    public  function __construct()
    {
        header("Content-Type:text/html; charset=utf-8");
        $this->dsn = 'mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
        $this->dbuser = DB_USER;
        $this->dbpass = DB_PASS;
        $this->connect();
        $this->dbh->query('SET NAMES '.DB_CHARSET);
    }

    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new proPdo();
        }
        return self::$instance;
    }

    //连接数据库
    private function connect()
    {
        try
        {
            $this->dbh = new PDO($this->dsn,$this->dbuser,$this->dbpass);
        }
        catch (PDOException $e)
        {
            exit('连接失败:'.$e->getMessage());
        }
    }

    //获取数据表里的字段
    public function getFields($table)
    {
        $this->sth = $this->dbh->query("DESCRIBE $table");
        $this->getPDOError();
        $this->sth->setFetchMode(PDO::FETCH_ASSOC);
        $result = $this->sth->fetchAll();
        $this->sth = null;
        return $result;
    }

    public function getAllTable(){
        $sql = "show tables";
        $rows = $this->doSql($sql);
        $tables = array();
        foreach ($rows as $row){
            $items = array();
            $table = $row['Tables_in_'.DB_NAME];
            $sql = "show columns from  {$table}";
            $items = $this->doSql($sql);
            $columns = array();
            foreach ($items as $item){
                $columns[]=$item['Field'];
            }
            $tables[$table]= $columns;
        }
        return $tables;
    }

    //获取要操作的数据
    private function getCode($table,$args)
    {
        $allTables = $this->getAllTable();/*返回所有的表及其字段*/
        $table = DB_PRE.$table;
        if (!is_array($allTables[$table]))
        {
            exit('表名错误或未更新缓存!');
        }
        $code = '';
        if (is_array($args))
        {
            foreach ($args as $k => $v)
            {
                $code .= "`$k`='$v',";
            }
        }
        $code = substr($code,0,-1);
        return $code;
    }

    /**
     * @comment 插入数据
     * @author Wei.li <php.wei.li@gmail.com>
     * @date  2015-4-20上午9:16:37
     * @param string $table  array $args
     * @return  integer id
     */
    public function insert($table,$args,$debug = null)
    {
        $sql = "INSERT INTO `".DB_PRE."$table` SET ";
        $code = $this->getCode($table,$args);

        $sql .= $code;
        if ($debug)echo $sql;
        if ($this->dbh->exec($sql))
        {
            $this->getPDOError();
            return $this->dbh->lastInsertId();
        }
        return false;
    }

    //查询数据
    public function fetch($table,$condition = '',$sort = '',$page = '',$field = '*',$debug = false)
    {
        $sql = "SELECT {$field} FROM `".DB_PRE."{$table}`";
        if (false !== ($con = $this->getCondition($condition)))
        {
            $sql .= $con;
        }
        if ($sort != '')
        {
            $sql .= " ORDER BY $sort";
        }
        if ($page != ''){
            $page_size = $this->page_size;
            $limit = ($page-1)*$page_size;
            $sql .= " LIMIT $limit , $page_size";
        }
        if ($debug)echo $sql;
        $this->sth = $this->dbh->query($sql);
        $this->getPDOError();
        $this->sth->setFetchMode(PDO::FETCH_ASSOC);
        $result = $this->sth->fetchAll();
        $this->sth = null;
        return $result;
    }

    //查询数据
    public function fetchOne($table,$condition = null,$field = '*',$debug = false)
    {
        $sql = "SELECT {$field} FROM `".DB_PRE."{$table}`";
        if (false !== ($con = $this->getCondition($condition)))
        {
            $sql .= $con;
        }
        if ($debug)echo $sql;
        $this->sth = $this->dbh->query($sql);
        $this->getPDOError();
        $this->sth->setFetchMode(PDO::FETCH_ASSOC);
        $result = $this->sth->fetch();
        $this->sth = null;
        return $result;
    }

    /**
     * @comment查询数据 返回id
     * @author Wei.li <php.wei.li@gmail.com>
     * @date  2015-4-20上午9:35:16
     * @param string tableName , string condition
     * @return
     */
    public function fetchId($table,$condition = null,$debug = false){
        $sql = "SELECT id FROM `".DB_PRE."{$table}`";
        if (false !== ($con = $this->getCondition($condition)))
        {
            $sql .= $con;
        }
        if ($debug)echo $sql;
        $this->sth = $this->dbh->query($sql);
        $this->getPDOError();
        $this->sth->setFetchMode(PDO::FETCH_ASSOC);
        $result = $this->sth->fetch();
        $this->sth = null;
        return $result['id'];
    }

    //获取查询条件
    public function getCondition($condition='')
    {
        if ($condition != '')
        {
            $con = ' WHERE';
            if (is_array($condition))
            {
                $i = 0;
                foreach ($condition as $k => $v)
                {
                    if ($i != 0){
                        $con .= " AND $k = '$v'";
                    }else {
                        $con .= " $k = '$v'";
                    }
                    $i++;
                }
            }elseif (is_string($condition))
            {
                $con .= " $condition";
            }else {
                return false;
            }
            return $con;
        }
        return false;
    }

    //获取记录总数
    public function counts($table,$condition = '',$debug = false)
    {
        $sql = "SELECT COUNT(*) AS num FROM `".DB_PRE."$table`";
        if (false !== ($con = $this->getCondition($condition)))
        {
            $sql .= $con;
        }
        if ($debug) echo $sql;
        $count = $this->dbh->query($sql);
        $this->getPDOError();
        return $count->fetchColumn();
    }

    //按SQL语句查询
    public function doSql($sql,$model='many',$debug = false)
    {
        if ($debug)echo $sql;
        $this->sth = $this->dbh->query($sql);
        $this->getPDOError();
        $this->sth->setFetchMode(PDO::FETCH_ASSOC);
        if ($model == 'many')
        {
            $result = $this->sth->fetchAll();
        }else {
            $result = $this->sth->fetch();
        }
        $this->sth = null;
        return $result;
    }

    //修改数据
    public function update($table,$args,$condition,$debug = null)
    {

        $code = $this->getCode($table,$args);
        $sql = "UPDATE `".DB_PRE."$table` SET ";
        $sql .= $code;

	    //查询是否与上次完全一样
	    if(is_array($args) && is_array($condition)){
		    if($this->fetchOne($table,array_merge($args,$condition))){
				return true;
		    }
	    }


        if (false !== ($con = $this->getCondition($condition)))
        {
            $sql .= $con;
        }
        if ($debug)echo $sql;
        if (($rows = $this->dbh->exec($sql)) > 0)
        {
            $this->getPDOError();
            return $rows;
        }
        return false;
    }

    //字段递增
    public function increase($table,$condition,$field,$debug=false)
    {
        $sql = "UPDATE `".DB_PRE."$table` SET $field = $field + 1";
        if (false !== ($con = $this->getCondition($condition))){
            $sql .= $con;
        }
        if ($debug)echo $sql;
        if (($rows = $this->dbh->exec($sql)) > 0){
            $this->getPDOError();
            return $rows;
        }
        return false;
    }

    //删除记录
    public function del($table,$condition,$debug = false)
    {
        $sql = "DELETE FROM `".DB_PRE."$table`";
        if (false !== ($con = $this->getCondition($condition)))
        {
            $sql .= $con;
        }else {
            exit('条件错误!');
        }
        if ($debug)echo $sql;
        if (($rows = $this->dbh->exec($sql)) > 0)
        {
            $this->getPDOError();
            return $rows;
        }else {
            return false;
        }
    }


    /**
     * 执行无返回值的SQL查询
     *
     */
    public function execute($sql)
    {
        $this->dbh->exec($sql);
        $id = $this->dbh->lastInsertId();
        $data = array();
        if($id){
            $data['info'] = '成功';
            $data['status']='T';
            $data['id']=$id;
        }else{
            $err_info = $this->dbh->errorInfo();
            $data['info'] = $err_info[2];
            $data['status']='F';
        }
        return $data;
    }

    /**
     * 捕获PDO错误信息
     */
    private function getPDOError()
    {
        $err_info = '';
        if ($this->dbh->errorCode() != '00000')
        {
            $error = $this->dbh->errorInfo();
            if(strstr($error[2], 'Duplicate entry')){
                $err_info  ='总登记号重复';
            }else{
                $err_info = $error[2];
            }
        }
        return $err_info;
    }

    //关闭数据连接
    public function __destruct()
    {
        $this->dbh = null;
    }
}
