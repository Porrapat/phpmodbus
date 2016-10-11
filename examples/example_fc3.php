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

// Print status information
echo "</br>Status:</br>" . $modbus;

// Print read data
echo "</br>Data:</br>";
print_r($recData); 
echo "</br>";
?>