<?php

// $query = $_REQUEST['q'];
$auth = "TZP2QV4WO7M5YVNA7ZUC5N2VXZVPVLQG";

$query = rawurlencode($_REQUEST['q']);

callWitAi($query, $auth);

function callWitAi($query, $auth){
    
    $authorization = "Authorization: Bearer ".$auth;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FAILONERROR, true); 
    curl_setopt($ch, CURLOPT_URL,'https://api.wit.ai/message?v=20200418&q='.$query);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        print_r($error_msg.PHP_EOL);    
    }
    curl_close($ch);
    $result = json_decode($response,true);
    $entities = $result['entities'];
    echo json_encode($entities);
    // verifyEntities($entities);

    // $entidadesCadastradas = array('intent', 'task');

    // foreach($entidadesCadastradas as $entidadeCadastrada)
    // {
    //     foreach($entities as $entity)
    //     {
    //         foreach($entity as $ent)
    //         {
    //             print_r($ent['value'].PHP_EOL);
    //             print_r($entidadeCadastrada.PHP_EOL);

    //             // if(strtoupper($entidadeCadastrada) == strtoupper($ent['value']))
    //             // {
    //             //     print_r($ent['value']);
    //             // }
    //         }
            
    //     }
    // }

}

// function verifyEntities($entities)
// {
//     $entidadesCadastradas = array('intent', 'task');

//     foreach($entidadesCadastradas as $entidadeCadastrada)
//     {
//         foreach($entities as $entity)
//         {
//             if(array_key_exists($entidadeCadastrada, $entity))
//             {
//                 var_dump($entity);
//             }
//         }
//     }

// }
