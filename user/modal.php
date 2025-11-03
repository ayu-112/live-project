<?php 

class modal 
{
    public $conn;
    function __construct()
    {
       $this->conn =  new mysqli('localhost','root','','ayushi-project');

    //    if($this->conn)
    //    {
    //     echo "connected";
    //    }
    }

    // insert into table (col1,col2,col3) values ('val1','val2','val3')
    // $data = [col1=>val1,col2=>val2] = [fname=>'Ayushi','lname'=>'Patel']
    // insert('users',[fname=>'Ayushi','lname'=>'Patel'])

    function insert($tbl,$data)
    {
        $col_arr = array_keys($data);//[fname,lname]
        $col  =implode(",",$col_arr);//fname,lname
        $val_arr = array_values($data);//['Ayushi','Patel']
        $val = implode("','",$val_arr);

        echo $sql = "insert into $tbl ($col) values ('$val')"; 
        
        $run =  $this->conn->query($sql);
    
        return $run;

    }

    function select_where($table, $where)
    {
        $col_arr = array_keys($where); //[u_name,u_email,password]
        $val_arr = array_values($where); //[Raviraj,r@gmail.com]

        $select = "select * from $table where 1=1";
        //select * from $table where and user_email = n@gmail.com and password = 123

        // $select = $select . " 123";// $select.= "123";


        $i = 0;
        foreach ($where as $w) {
            $select .= " and $col_arr[$i] = '$val_arr[$i]'";
            // select * from $table where 1=1 and uname = 'raviraj' and  uemail='r@gmail.com'
            // $select= $select . " and $col_arr[$i] = '$val_arr[$i]'";
            $i++;
        }
        // echo $select;exit();
        $run = $this->conn->query($select);
        return $run;
    }

        function select($tbl) // select * from table
    {
        $sql = "select * from $tbl";
        $run = $this->conn->query($sql);
        $arr =[];
        while ($fetch = $run->fetch_object()) // fetch data from mysql
        {
            // $arr = [1,2,3];
            // $arr[] = ["uname"=>"Mahesh",2,3];
            $arr[] = $fetch;
        }
        if (!empty($arr)) {
            return $arr;
        }
    }


     function update($tbl, $data, $where)
    {
        $col_arr = array_keys($data); //id,qty,pid,uid
        $val_arr = array_values($data); //1,2,4,5


        // update cart set id=1,qty-3, where pid = 2 and uid= 8
        $update = "update $tbl set "; // update cart set 
        $j = 0;
        $count = count($data); //0
        foreach ($data as $d) {
            if ($count == $j + 1) //0 == 0+1//0==1
            {
                $update .= "$col_arr[$j] = '$val_arr[$j]' "; //qty = 3
            } else {
                $update .= "$col_arr[$j] = '$val_arr[$j]', "; //qty = 1
                $j++;
            }
        }
        $update .= "where 1=1"; //where userid =6 and prd_id=2
        $wcol_arr = array_keys($where);
        $wval_arr = array_values($where);

        $i = 0;
        foreach ($where as $d) {
            $update .= " and  $wcol_arr[$i] = '$wval_arr[$i]'";
            $i++;
        }

        //  echo $update;exit();
        $run = $this->conn->query($update);
        return $run;
    }

    function select_join2($tbl1,$tbl2,$on)
	{
		$sel="select * from $tbl1 join $tbl2 on $on";	  // query
		$run=$this->conn->query($sel);  // query run by conn
		while($fetch=$run->fetch_object()) // fetch data from mysql
		{
			$arr[]=$fetch;
		}
		if(!empty($arr))
		{
			return $arr;
		}
	}

}

// $obj = new model;