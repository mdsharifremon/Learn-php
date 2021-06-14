<?php 
   
if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['age'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $data = [
            'fname' => $fname,
            'lname' => $lname,
            'age'  => $age
        ];
        $file = file_get_contents('dynamic-json/form.json');
        $arr = json_decode($file, true);
        $arr[] = $data;
        $encode = json_encode($arr, JSON_PRETTY_PRINT);
        $myData = 'dynamic-json/form.json';
        if(file_put_contents($myData, $encode)){
            echo 'Json created successfully';
        }else{
            echo "Data json is not created";
        };
}else{
    echo 'No data Found';
};