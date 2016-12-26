<?php
    include_once './Util/T_DATA_Table.php';
    main();
    
    function main(){
        $var =  (int)$_POST['YYYYMM'];;
        try{
            check_date($var);
            open_sql($var);
        } catch (Exception $e){
            echo $e->getMessage(), "\n";
        }
    }
    function check_date($YYYYMM){
        if(empty($YYYYMM)){
            throw new Exception('日付を入力してください');
        }
        $YYYY = substr($YYYYMM ,0 ,4);
        $DD   = substr($YYYYMM ,4);
        if(!checkdate('01' ,$DD ,$YYYY)){
            throw new Exception('日付が正しく入力されていません');
        }
    }
    function open_sql($YYYYMM){
        $_t_data = new t_data();
        $stmt = $_t_data->getT_data($YYYYMM);
        $resultNum = $stmt->rowCount();
      
        if ($resultNum <= 0) {
            throw new Exception('対象のデータが存在しません');
        }
              
        foreach ($stmt as $row) {
            echo $row['PAGE_ID'] . ',' . $row['CNT'] . ',' .$row['DATE_YYYYMM'];
            echo '<br>';
       }
    }
