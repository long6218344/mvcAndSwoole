<?php 

/**
 * 数据库操作类
 */

class Model
{
    // 显式的将属性标明出来
    private $link = null; //连接标识
    private $tabName = null; //表名
    private $fields = []; //字段列表
    private $pk = null; //主键
    private $keys; //要查询指定字段们
    private $where; //查询条件
    private $limit; //分页条件
    private $order; //排序条件

    /**
     * 初始化数据库连接
     * @param string $tabName 接收实例化时,传入的表名
     */
    public function __construct($tabName)
    {
        // 初始化配置
        // 返回对象,存为link 连接属性.
        $this->link = mysqli_connect(HOST, USER, PASS, DB);
        mysqli_set_charset($this->link,CHAR);
        $this->tabName = $tabName;// 接收实例化时,传入的表名
        $this->getField();// 自动获取 该表的所有字段及主键
    }

    /**
     * 查全部数据
     * @return array/bool 成功返回二维数组,失败返回false
     */
    public function select()
    {
        $keys = '*';//默认查全部
        //判断有无字段条件值
        if (!empty($this->keys)) {
            $keys = $this->keys;
            $this->keys = null;//每次用完 要清空
        }

        $where = '';//默认无条件
        //判断有无
        if (!empty($this->where)) {
            $where = 'WHERE '.$this->where;
            $this->where = null;//每次用完 要清空
        }

        $order = '';//默认无条件
        //判断有无
        if (!empty($this->order)) {
            $order = 'ORDER BY '.$this->order;
            $this->order = null;//每次用完 要清空
        }

        $limit = '';//默认无条件
        //判断有无
        if (!empty($this->limit)) {
            $limit = 'LIMIT '.$this->limit;
            $this->limit = null;//每次用完 要清空
        }

        //SQL
        $sql = "SELECT {$keys} FROM {$this->tabName} {$where} {$order} {$limit}";
        return $this->query($sql);
    }

    /**
     * 查单条数据
     * @param  string $findValue 查询条件值
     * @param  string $findKey   查询条件名
     * @return array/bool 成功返回数组,失败返回false
     */
    public function find($findValue, $findKey = null)
    {
        if ($findKey == null) {
            $findKey = $this->pk;
        }
        $keys = '*';//默认查全部
        //判断有无字段条件值
        if (!empty($this->keys)) {
            $keys = $this->keys;
            $this->keys = null;//每次用完 要清空
        }
        $sql = "SELECT {$keys} FROM {$this->tabName} WHERE {$findKey}='{$findValue}' LIMIT 1";
        $data = $this->query($sql);
        // 判断结果
        if (empty($data)) {
            return false;
        }
        return $data[0];
    }

    /**
     * 查询字段
     * @param  array $where 要查询的字段
     * @return null
     */
    public function field($arr)
    {
        // 判断是否传递数组
        if (!is_array($arr)) return $this;
        // 如果传递的参数里有非残字段,应该排除掉
        foreach ($arr as $key => $val) {
            if (!in_array($val, $this->fields)) {
                unset($arr[$key]);
            }
        }
        // 筛选完的数组如果是空的...
        if (empty($arr)) return $this;

        // 生成字段条件
        $this->keys = implode(',', $arr);

        // 对象链操作
        return $this;
    }

    /**
     * 查询条件
     * @param  string $where SQL
     * @return null
     */
    public function where($where)
    {
        $this->where = $where;//存为属性
        // 对象链操作
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;//存为属性
        // 对象链操作
        return $this;
    }

    public function order($order)
    {
        $this->order = $order;//存为属性
        // 对象链操作
        return $this;
    }


    /**
     * 插入数据
     * @param  array  $data 要插入的数据
     * @return int/bool     成功返回自增ID,失败返回false
     */
    public function insert($data = [])
    {
        // 判断赋值 如果data为空,则取得POST中的数据
        if (empty($data)) {
            $data = $_POST;
        }

        // 筛选POST中的数据
        foreach ($data as $k => $v) {
            // 如果POST数据里的$k, 在列表之中 就保留
            if (in_array($k, $this->fields)) {
                $list[$k] = $v;
            }
        }

        //生成SQL中的key和value
        $keys = implode(',', array_keys($list));
        $values = implode("','", array_values($list));
        
        // SQL
        $sql = "INSERT INTO {$this->tabName} ($keys) VALUES('$values')";
        // 执行操作 返回自增ID或false
        return $this->execute($sql);
    }

    /**
     * 删除数据
     * @param  string/int $delValue 要删除的条件值
     * @param  string     $delKey   要删除的字段
     * @return bool  返回true/false 
     */
    public function delete($delValue, $delKey = null)
    {
        if ($delKey == null) {
            $delKey = $this->pk;
        }
        $sql = "DELETE FROM {$this->tabName} WHERE {$delKey}='{$delValue}'";
        return $this->execute($sql);
    }

    /**
     * 更新数据
     * @param  array $data 要更新的数据
     * @return bool 返回true/false
     */
    public function update($data = [])
    {
        // 判断赋值 如果data为空,则取得POST中的数据
        if (empty($data)) {
            $data = $_POST;
        }
        // 筛选POST中的数据
        foreach ($data as $k => $v) {
            // 如果POST数据里的$k, 在列表之中 就保留
            if (in_array($k, $this->fields) && $k != $this->pk) {
                $list[] = "`{$k}`='{$v}'";
            }
        }
        //生成SET条件
        $set = implode(',', $list);
        $sql = "UPDATE {$this->tabName} SET {$set} WHERE `{$this->pk}`='{$data[$this->pk]}'";
        //执行更新操作
        return $this->execute($sql);
    }

    /**
     * 统计数据条目数量
     * @return int 条目数量
     */
    public function count()
    {
        $where = '';//默认无条件
        //判断有无
        if (!empty($this->where)) {
            $where = 'WHERE '.$this->where;
            $this->where = null;//每次用完 要清空
        }
        $sql = "SELECT COUNT(*) total FROM {$this->tabName} {$where}";
        $total = $this->query($sql);
        // var_dump($total);
        return $total[0]['total'];
    }

    //销毁对象
    public function __destruct()
    {
        mysqli_close($this->link);
    }

    //--------------私有方法------------------------    
    /**
     * 专用于查询
     * @param  string $sql SQL
     * @return array / bool      返回查询到的数据二维数组/ false
     */
    private function query($sql)
    {
        //执行SQL
        $result = mysqli_query($this->link, $sql);
        //判断 执行结果
        if ($result && mysqli_num_rows($result) > 0) {
            $list = [];
            $list = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $list; //返回查询到的数据,二维数组
        } else {
            return false; //查询失败,返回false
        }
    }

    /**
     * 专用于增删改
     * @param  string $sql SQL
     * @return int/bool    返回自增ID/true/false
     */
    private function execute($sql)
    {
        //执行SQL
        $result = mysqli_query($this->link, $sql);
        //判断 执行结果
        if ($result && mysqli_affected_rows($this->link) > 0) {
            //添加时返回自增ID
            if (mysqli_insert_id($this->link) > 0) {
                // 返回 ID
                return mysqli_insert_id($this->link);
            } else {
                // 删/改成功
                return true;
            }
        } else {
            return false; //操作失败,返回false
        }
    }


    /**
     * 获取数据表内的字段及主键
     * @return null 无返回值,执行结果存储到对象的fields属性值中
     */
    private function getField()
    {
        //查询表结构
        $sql = "DESC {$this->tabName}";
        $list = $this->query($sql);
        // var_dump($list);
        $fields = [];// 遍历得到全部字段名字
        foreach ($list as $val) {
            $fields[] = $val['Field'];
            if ($val['Key'] == 'PRI') {
                $this->pk = $val['Field'];
            }
        }
        //给属性赋值
        $this->fields = $fields;
    }

}


