<?php

require_once dirname(__FILE__) . '/../Phpmodbus/ModbusMaster.php';

// Create Modbus object
$modbus = new ModbusMaster("127.0.0.1", "TCP");

try {
    // FC 3
    $recData = $modbus->readMultipleRegisters(0, 0x40000, 6);
}
catch (Exception $e) {
    // Print error information if any
    echo $modbus;
    echo $e;
    exit;
}

$values = array_chunk($recData, 2);

$tojson = array(
    'irr1' => PhpType::bytes2signedInt($values[0]),
    'irr2' => PhpType::bytes2signedInt($values[1]),
    'irr3' => PhpType::bytes2signedInt($values[2])
);

header('Content-type: text/html; charset=UTF-8');
echo json_encode($tojson);
?>