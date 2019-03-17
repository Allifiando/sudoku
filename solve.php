<?php

$arrNomor1 = array(); //coming array1
$arrNomor2 = array(); //coming array2
$arrNomor3 = array(); //coming array3
$arrNomor4 = array(); //coming array4
$arrNomor5 = array(); //coming array5
$arrNomor6 = array(); //coming array6
$arrNomor7 = array(); //coming array7
$arrNomor8 = array(); //coming array8
$arrNomor9 = array(); //coming array9
$data = "";

if(isset($_POST['typeform']))
{
	$typeform=$_POST['typeform'];
	$arrNomor1=json_decode($_POST['arrNomor1']);
	$arrNomor2=json_decode($_POST['arrNomor2']);
	$arrNomor3=json_decode($_POST['arrNomor3']);
	$arrNomor4=json_decode($_POST['arrNomor4']);
	$arrNomor5=json_decode($_POST['arrNomor5']);
	$arrNomor6=json_decode($_POST['arrNomor6']);
	$arrNomor7=json_decode($_POST['arrNomor7']);
	$arrNomor8=json_decode($_POST['arrNomor8']);
	$arrNomor9=json_decode($_POST['arrNomor9']);

}

class Sudoku {
    
    private $comming_arr = array();
    private $grids = array();
    private $columns_begining = array();    

    private function set_grids() { //MAKE GRIDS
        $grids = array();
        foreach ($this->comming_arr as $k => $row) {
            if ($k <= 2) {
                $row_num = 1;
            }
            if ($k > 2 && $k <= 5) {
                $row_num = 2;
            }
            if ($k > 5 && $k <= 8) {
                $row_num = 3;
            }
            foreach ($row as $kk => $r) {
                if ($kk <= 2) {
                    $col_num = 1;
                }
                if ($kk > 2 && $kk <= 5) {
                    $col_num = 2;
                }
                if ($kk > 5 && $kk <= 8) {
                    $col_num = 3;
                }
                $grids[$row_num][$col_num][] = $r;
            }
        }
        $this->grids = $grids;
    }
    private function set_columns() { //ORDER BY COLUMNS
        $columns_begining = array();
        $i = 1;
        foreach ($this->comming_arr as $k => $row) {
            $e = 1;
            foreach ($row as $kk => $r) {
                $columns_begining[$e][$i] = $r;
                $e++;
            }
            $i++;
        }
        $this->columns_begining = $columns_begining;
    }
    private function get_possibilities($k, $kk) { //GET POSSIBILITIES FOR GIVEN CELL
        $values = array();
        if ($k <= 2) {
            $row_num = 1;
        }
        if ($k > 2 && $k <= 5) {
            $row_num = 2;
        }
        if ($k > 5 && $k <= 8) {
            $row_num = 3;
        }
        if ($kk <= 2) {
            $col_num = 1;
        }
        if ($kk > 2 && $kk <= 5) {
            $col_num = 2;
        }
        if ($kk > 5 && $kk <= 8) {
            $col_num = 3;
        }
        for ($n = 1; $n <= 9; $n++) {
            if (!in_array($n, $this->comming_arr[$k]) && !in_array($n, $this->columns_begining[$kk + 1]) && !in_array($n, $this->grids[$row_num][$col_num])) {
                $values[] = $n;
            }
        }
        shuffle($values);
        return $values;
    }
    public function solve_it($arr) {
        while (true) {
            $this->comming_arr = $arr;
            $this->set_columns();
            $this->set_grids();
            $ops = array();
            foreach ($arr as $k => $row) {
                foreach ($row as $kk => $r) {
                    if ($r == 0) {
                        $pos_vals = $this->get_possibilities($k, $kk);
                        $ops[] = array(
                            'rowIndex' => $k,
                            'columnIndex' => $kk,
                            'permissible' => $pos_vals
                        );
                    }
                }
            }
            if (empty($ops)) {
                return $arr;
            }
            usort($ops, array($this, 'sortOps'));
            if (count($ops[0]['permissible']) == 1) {
                $arr[$ops[0]['rowIndex']][$ops[0]['columnIndex']] = current($ops[0]['permissible']);
                continue;
            }
            foreach ($ops[0]['permissible'] as $value) {
                $tmp = $arr;
                $tmp[$ops[0]['rowIndex']][$ops[0]['columnIndex']] = $value;
                if ($result = $this->solve_it($tmp)) {
                    return $this->solve_it($tmp);
                }
            }
            return false;
        }
    }
    private function sortOps($a, $b) {
        $a = count($a['permissible']);
        $b = count($b['permissible']);
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? -1 : 1;
    }
    public function getResult() {
        echo "\n";        
        $msg = "Mantap";
        foreach ($this->comming_arr as $k => $row) {
            foreach ($row as $kk => $r) {
                echo $r . ' ';
                $data[] = $r . ' ';
            }
            echo "\n";
        }
        $result=array('success'=>true,'results'=>$msg,
        	'rows'=>$data);
		echo json_encode($result);
    }
}


$arr = array(
	$arrNomor1,
	$arrNomor2,
	$arrNomor3,
	$arrNomor4,
	$arrNomor5,
	$arrNomor6,
	$arrNomor7,
	$arrNomor8,
	$arrNomor9,
);

// print_r($arr);exit;
$game = new Sudoku();
$game->solve_it($arr);
$game->getResult();
