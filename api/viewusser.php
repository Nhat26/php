<?php
    include_once '..\connection.php';

    $cursor = $Usser->find();

    echo '{"students":[';
    foreach($cursor as $document) {
        echo '{"id":"'.$document['id'].'",'; 
        echo '"name":"'.$document['name'].'",'; 
        echo '"sdt":"'.$document['sdt'].'",'; 
        
    }
    echo '{}]}';

?>