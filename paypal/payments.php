<?php

//Seuna el modo Paypal sandbox. 
// En caso de live ponerlo en falso.
$enableSandbox = true;

// Base de datos
$dbConfig = [
	'host' => 'localhost:8000',
	'username' => 'user',
	'password' => 'annyanneko',
	'name' => 'mydb'
];

// Configuraciones del paypal
$paypalConfig = [
	'email' => 'user@example.com',
	'return_url' => 'http://example.com/payment-successful.html',
	'cancel_url' => 'http://example.com/payment-cancelled.html',
	'notify_url' => 'http://example.com/payments.php'
];

$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';


//Producto a pagar
$itemName = $_POST['vuelo_item'];
$itemAmount = $_POST['precio_item'];
$itemBool = $_POST['bool_item'];

if ($itemBool === "false" ) {
//Funciones del paypal
    require 'functions.php';

//Pregunnta por un pedido o una respuesta
    if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {

            // Tome los datos de la publicación para que podamos configurar la cadena de consulta para PayPal.
            // Idealmente, usaríamos una lista blanca aquí para comprobar que no se inyecta nada en
            // nuestros datos de publicación
            $data = [];
            foreach ($_POST as $key => $value) {
                    $data[$key] = stripslashes($value);
            }

            // setea la cuenta de paypal.
            $data['business'] = $paypalConfig['email'];

            // setea la respuesta de la cuenta paypal.
            $data['return'] = stripslashes($paypalConfig['return_url']);
            $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
            $data['notify_url'] = stripslashes($paypalConfig['notify_url']);

            // setea los detalles del producto para el pago paypal
            // y el tipo de moneda segun paypal.
            $data['item_name'] = $itemName;
            $data['amount'] = $itemAmount;
            $data['currency_code'] = 'USD';

            // crea un documento del usuario para el query string.
            //$data['custom'] = USERID;

            // crea el query string desde el data.
            $queryString = http_build_query($data);

            // Redireciona a paypal IPN
            header('location:' . $paypalUrl . '?' . $queryString);
            exit();

    } else {
            // Maneja la respuesta del paypal.

            // crea coneccion a la base de datos 
            $db = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['name']);

            // asigna las posiciones al arreglo del local data.
            $data = [
                    'item_name' => $_POST['item_name'],
                    'item_number' => $_POST['item_number'],
                    'payment_status' => $_POST['payment_status'],
                    'payment_amount' => $_POST['mc_gross'],
                    'payment_currency' => $_POST['mc_currency'],
                    'txn_id' => $_POST['txn_id'],
                    'receiver_email' => $_POST['receiver_email'],
                    'payer_email' => $_POST['payer_email'],
                    'custom' => $_POST['custom'],
            ];

            // Se nesecita verificar que la transaccion viene de pypal
            // y los que no, antes del proceso de la transaccion antes de a;adir el pago a la base de datos 
            if (verifyTransaction($_POST) && checkTxnid($data['txn_id'])) {
                    if (addPayment($data) !== false) {
                            // Pago efactivo.
                    }
            }
    }
}else{
    echo('E~Su intento de transaccion ha sido invalida. (No se pudo acceder a paypal)');
}
