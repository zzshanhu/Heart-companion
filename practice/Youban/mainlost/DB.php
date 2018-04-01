<?php
	class DB{
		//连接到数据库
		function __construct($dbconfig){
			$this->dblink = new mysqli(
				$dbconfig['host'],
				$dbconfig['username'],
				$dbconfig['password'],
				$dbconfig['dbname'],
				$dbconfig['port']
				);
			$this->dblink->query('SET NAMES UTF8');
		}
		//获取单条记录
		function getOneData($filelds,$tablename,$where)
		{
			$sql    = ' SELECT '.$filelds.' FROM '.$tablename.' WHERE '.$where.' LIMIT 1 ';
			$r      = $this->dblink->query($sql);
			if ($r) {
				$data = $r->fetch_array(MYSQLI_ASSOC);
				return $data;
			}else{
				return $r;
			}
		}
		//获取多条记录
		function getData($filelds,$tablename,$where)
		{
			$sql    = ' SELECT '.$filelds.' FROM '.$tablename.' WHERE status = 1 '.$where;
			$r      = $this->dblink->query($sql);
			if ($r) {
				$data = $r->fetch_all(MYSQLI_ASSOC);
				return $data;
			}else{
				return $r;
			}
		}

		//获取每页显示的记录数
		function getNum($filelds,$num,$tablename,$where)
		{
			$sql    = ' SELECT '.$filelds.' AS '.$num.' FROM '.$tablename.' WHERE status = 1 '.$where;
			$numr   = $this->dblink->query($sql);
			if ($numr) {
				$num        = $numr->fetch_array(MYSQLI_ASSOC)[$num];
				return $num;
			}else{
				return $numr;
			}
		}


		//添加数据的方法
        function insertData($tablename, $data){
            $filedA = array();
            foreach ($data as $filed => $value) {
                //收集字段名
                array_push($filedA, $filed);
                //处理字符串类型的数据
                if(is_string($value)){
                   $data[$filed] = '"' . addslashes($value) . '"'; 
                }
            }
            $sql = 'INSERT INTO '.$tablename.'('.implode(', ', $filedA).') VALUES('.implode(', ', $data).')';
            $result = $this->dblink->query($sql);  
            if($result){
                return $this->dblink->insert_id;
            }else{
                return $result;
            }
        }

		//删除数据
        function delData($tablename, $where){
            $sql    = 'DELETE FROM '.$tablename.' WHERE '.$where;
            $r      = $this->dblink->query($sql);
            if($r){
                //执行成功，返回影响的记录数
                return $this->dblink->affected_rows;
            }else{
                return false;
            }
        }
		//修改数据
        function updateData($tablename, $data, $where){
            $filedA = array();
            foreach ($data as $filed => $value) {
                //处理字符串类型的数据
                if(is_string($value)){
                   $value = '"' . addslashes($value) . '"'; 
                }
                //收集字段和值
                $filed .= ' = ' . $value;
                array_push($filedA, $filed);
            }
            $sql    = 'UPDATE '.$tablename.' SET '.implode(', ', $filedA).' WHERE ' . $where;
            
            $r      = $this->dblink->query($sql); 
            return $r;
        }
		function __destruct(){
			$this->dblink->close();
		}

	}