<?php
if(isset($errors)){
    echo('<ul>');
    foreach ($errors as $error){
        echo('<li class="text-danger">'.$error.'</li>');
    }
    echo('</ul>');
}
?>