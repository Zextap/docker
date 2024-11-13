<?php
// Función para generar los primeros n números de la serie Fibonacci
function fibonacci($n) {
    $fib = [0, 1]; // Primeros dos elementos de la secuencia

    // Calcular los siguientes números de la secuencia
    for ($i = 2; $i < $n; $i++) {
        $fib[] = $fib[$i - 1] + $fib[$i - 2];
    }

    return $fib;
}

// Mostrar los primeros 100 números de la secuencia Fibonacci
$n = 100;
$fib_sequence = fibonacci($n);

// Mostrar la secuencia
echo "Los primeros $n números de la secuencia Fibonacci son:\n";
foreach ($fib_sequence as $num) {
    echo $num . "<br>";
}
?>