<?php



    switch($_POST['action']){
        case '1':
            facebooklogin();
        break;


        default:
            echo '0';
        break;

    }
?>

function facebooklogin()
{
    $userData=json_decode($_POST['userData']);

    echo $userData-->id;
    echo $userData-->email;



}