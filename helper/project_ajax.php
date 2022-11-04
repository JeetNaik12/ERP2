
<?php 

include "../function/function_project_ajax.php";


if(isset($_POST['val'])){
    $val = $_POST['val'];
    $type = $_POST['type'];
    if($type == 1){
        $output = Project($val);
    }

    if($type == 2){
        $output = Phase($val);
    }

    if($type == 3){
        $output = Cluster($val);
    }

    if($type == 4){
        $output = Tower($val);
    }

    if($type == 5){
        $output = Wing($val);
    }

    echo $output;
}


?>