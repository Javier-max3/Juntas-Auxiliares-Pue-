<?php 
$junta = $_GET['junta'] ?? 'No especificada';
$presupuesto = $_GET['presupuesto'] ?? 'general'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Puebla- Juntas Auxiliares</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
        }
        .encabezado {
            background-color: #048000;
            color: white;
            display: flex;
            align-items: center;
            padding: 10px 30px;
        }
        .encabezado img {
            width: 50px;
            margin-right: 15px;
        }
        .barra-navegacion {
            background-color: #b71c1c;
            padding: 10px;
            text-align: center;
        }
        .barra-navegacion a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin: 0 15px;
        }
        .contenido {
            max-width: 1000px;
            margin: 20px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }
        .boton-regresar {
            background-color: #b71c1c;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        select {
            margin: 0 10px;
            padding: 5px;
        }
        .contenedor-datos {
            display: flex;
            gap: 30px;
            margin-top: 25px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 6px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
        .tabla-obras {
            flex: 1;
        }
        .grafica {
            flex: 1;
        }
        canvas {
            width: 100% !important;
            height: 280px !important;
        }
        .btn-descargar {
            background-color: #048000;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 25px;
        }
    </style>
</head>
<body>

<div class="encabezado">
    <img src="escudo_puebla.png" alt="Escudo">
    <h1>Puebla - Junta Auxiliar</h1>
</div>

<div class="barra-navegacion">
    <a href="interfaz.php">Inicio</a>
</div>

<div class="contenido">

    <button class="boton-regresar" onclick="history.back()">← Regresar</button>

    <h2>Junta: <?php echo htmlspecialchars($junta); ?></h2>

    <form method="get" id="formTipoPresupuesto">
        <input type="hidden" name="junta" value="<?php echo htmlspecialchars($junta); ?>">
        <input type="hidden" name="anio" id="inputAnio" value="<?php echo $_GET['anio'] ?? '2024'; ?>">
        <input type="hidden" name="mes" id="inputMes" value="<?php echo $_GET['mes'] ?? 'enero'; ?>">

        <label>Presupuesto:</label>
        <select name="presupuesto" onchange="document.getElementById('formTipoPresupuesto').submit()">
            <?php
            $tipos = [
                "general" => "General",
                "obras" => "Obras Públicas",
                "servicios" => "Servicios Urbanos",
                "seguridad" => "Seguridad",
                "administracion" => "Administración",
                "cultura" => "Cultura"
            ];
            foreach ($tipos as $clave => $texto) {
                $sel = $presupuesto === $clave ? "selected" : "";
                echo "<option value=\"$clave\" $sel>$texto</option>";
            }
            ?>
        </select>

        <label>Año:</label>
        <select id="anio" onchange="actualizarFecha()">
            <option value="2023" <?php if (($_GET['anio'] ?? '') == '2023') echo 'selected'; ?>>2023</option>
            <option value="2024" <?php if (($_GET['anio'] ?? '2024') == '2024') echo 'selected'; ?>>2024</option>
        </select>

        <label>Mes:</label>
        <select id="mes" onchange="actualizarFecha()">
            <option value="enero" <?php if (($_GET['mes'] ?? '') == 'enero') echo 'selected'; ?>>Enero</option>
            <option value="febrero" <?php if (($_GET['mes'] ?? '') == 'febrero') echo 'selected'; ?>>Febrero</option>
            <option value="marzo" <?php if (($_GET['mes'] ?? '') == 'marzo') echo 'selected'; ?>>Marzo</option>
        </select>
    </form>

    <div class="contenedor-datos">
        <div class="tabla-obras">
            <table id="tablaPresupuesto">
                <thead>
                    <tr>
                        <th>Presupuesto ($)</th>
                        <th># Obra</th>
                        <th>Cantidad ($)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 1; $i <= 5; $i++) {
                        $cantidad = $i * 10000;
                        echo "<tr>
                                <td>$" . number_format($cantidad, 2) . "</td>
                                <td>$i</td>
                                <td>$" . number_format($cantidad, 2) . "</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>

            <button class="btn-descargar" onclick="descargarCSV()">Descargar CSV</button>
        </div>

        <div class="grafica">
            <canvas id="graficaBarras"></canvas>
        </div>
    </div>

</div>

<script>
function actualizarFecha() {
    document.getElementById('inputAnio').value = document.getElementById('anio').value;
    document.getElementById('inputMes').value = document.getElementById('mes').value;
    document.getElementById('formTipoPresupuesto').submit();
}

// Datos ejemplo para gráfica
const obras = [1, 2, 3, 4, 5];
const asignado = [70000, 55000, 60000, 65000, 58000];
const gastado = [69000, 50000, 59000, 64000, 56000];

const ctx = document.getElementById("graficaBarras").getContext("2d");
new Chart(ctx, {
    type: "bar",
    data: {
        labels: obras.map(o => `Obra ${o}`),
        datasets: [
            {
                label: "Asignado",
                data: asignado,
                backgroundColor: "#048000"
            },
            {
                label: "Gastado",
                data: gastado,
                backgroundColor: "#b71c1c"
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top'
            },
            tooltip: {
                callbacks: {
                    label: ctx => `${ctx.dataset.label}: $${ctx.raw.toLocaleString()}`
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: value => '$' + value.toLocaleString()
                }
            }
        }
    }
});

// Función para descargar la tabla como CSV
function descargarCSV() {
    const tabla = document.getElementById('tablaPresupuesto');
    let csv = [];
    for (let fila of tabla.rows) {
        let filaDatos = [];
        for (let celda of fila.cells) {
            // Quitar signos de $ y comas para que quede solo número o texto limpio
            let texto = celda.innerText.replace(/\$/g, '').replace(/,/g, '');
            filaDatos.push(texto);
        }
        csv.push(filaDatos.join(","));
    }
    const csvString = csv.join("\n");

    const blob = new Blob([csvString], { type: 'text/csv;charset=utf-8;' });
    const url = URL.createObjectURL(blob);

    const a = document.createElement('a');
    a.href = url;
    a.download = `presupuesto_${<?php echo json_encode($junta); ?>}_${<?php echo json_encode($presupuesto); ?>}.csv`;
    a.style.display = 'none';

    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
}
</script>

</body>
</html>
