<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

$presupuesto = $_GET['presupuesto'] ?? '';
$junta = $_GET['junta'] ?? 'No especificada';
$presupues = strtolower(trim($presupuesto));
$filtro_inicial = $presupues ?: 'general';

$juntas_auxiliares = [
    "San Andrés Azumiatla",
    "San Francisco Totimehuacan",
    "San Pablo Xochimehuacan",
    "San Miguel Canoa",
    "Santa María Xonacatepec",
    "Santo Ángel",
    "Santiago Momoxpan",
    "La Resurrección",
    "San Jerónimo Caleras",
    "San Baltazar Tetela",
    "San Pedro Zacachimalpa",
    "San Bernardino Tlaxcalancingo",
    "San Sebastián de Aparicio",
    "Sanctorum",
    "San José Chapulco",
    "San Miguel Espejo",
    "San Bartolo Flor del Bosque",
    "San Isidro Buen Suceso",
    "San Felipe Hueyotlipan",
    "San Matías Cocoyotla",
    "San Baltazar Campeche",
    "Ignacio Zaragoza"
];

// Función para obtener datos específicos por junta auxiliar
function obtenerDatosPorJunta($nombreJunta) {
    $datos = [
        "general" => 0,
        "obras" => 0,
        "servicios" => 0,
        "seguridad" => 0,
        "administracion" => 0,
        "cultura" => 0,
        "detalles" => [
            "obras" => [],
            "servicios" => [],
            "seguridad" => [],
            "administracion" => [],
            "cultura" => []
        ]
    ];

    // Datos específicos para Ignacio Zaragoza
    if ($nombreJunta === "Ignacio Zaragoza") {
        $datos["general"] = 73254924.30;
        $datos["obras"] = 71953934.70;
        $datos["servicios"] = 1300989.60;
        
        $datos["detalles"]["obras"] = [
            [
                "numero" => "1",
                "nombre" => "REHABILITACIÓN DE PARQUE SAN ÁNGEL ENTRE PRIVADA CENTRAL Y CALLE RIO BALSAS, EN LA COLONIA UNIDAD PROGRESO ORIENTE",
                "asignado" => 20252725.27,
                "ejercido" => 20252725.27
            ],
            [
                "numero" => "2",
                "nombre" => "REHABILITACIÓN DE PARQUE VICENTE SUAREZ EN AVENIDA 2 ENTRE CALLE 6 Y CALLE 11, EN LA COLONIA VICENTE SUAREZ",
                "asignado" => 20252725.27,
                "ejercido" => 20252725.27
            ],
            [
                "numero" => "3",
                "nombre" => "REHABILITACIÓN VIAL EN BOULEVARD 38 SUR O AVENIDA BLAS CHUMACERO SÁNCHEZ ENTRE AVENIDA FIDEL VELÁZQUEZ Y AVENIDA 42 SUR, AVENIDA 42 SUR ENTRE BOULEVARD 38 SUR O AVENIDA BLAS CHUMACERO SÁNCHEZ Y AVENIDA 67 ORIENTE, ACCESO Y SALIDA A LA MARGARITA ENTRE AVENIDA 67 ORIENTE Y BOULEVARD MUNICIPIO LIBRE, EN LA COLONIA LA MARGARITA",
                "asignado" => 51701209.43,
                "ejercido" => 51701209.43
            ]
        ];
        
        $datos["detalles"]["servicios"] = [
            [
                "numero" => "1",
                "nombre" => "AMPLIACIÓN DEL COLECTOR PLUVIAL EN PRIVADA QUINTA CARRIL DE SAN BARTOLO ENTRE CALLE CARRIL DE SAN BARTOLO Y FIN DE CALLE, EN LA COLONIA CASA BLANCA",
                "asignado" => 482527.23,
                "ejercido" => 482527.23
            ],
            [
                "numero" => "2",
                "nombre" => "AMPLIACIÓN DE RED DE DRENAJE SANITARIO EN CALLE ENCINO ENTRE CALLE RIO BRAVO Y CALLE FRESNO, EN LA COLONIA EL ENCINAR SEGUNDA SECCIÓN",
                "asignado" => 408731.18,
                "ejercido" => 408731.18
            ],
            [
                "numero" => "3",
                "nombre" => "AMPLIACIÓN DE RED DE DRENAJE PLUVIAL EN CALLE RUA DE AMATISTA ENTRE CALLE RUA DE ÓNIX Y CALLE RUA DE CORAL, EN LA COLONIA LA JOYA",
                "asignado" => 408731.19,
                "ejercido" => 408731.19
            ]
        ];

        // Datos aleatorios para seguridad, administración y cultura (Ignacio Zaragoza)
        $datos["seguridad"] = rand(500000, 1500000);
        $datos["administracion"] = rand(300000, 1000000);
        $datos["cultura"] = rand(200000, 800000);

        // Detalles aleatorios para seguridad, administración y cultura
        $datos["detalles"]["seguridad"] = [
            [
                "numero" => "1",
                "nombre" => "EQUIPAMIENTO PARA SEGURIDAD PÚBLICA EN " . strtoupper($nombreJunta),
                "asignado" => $datos["seguridad"],
                "ejercido" => $datos["seguridad"]
            ]
        ];

        $datos["detalles"]["administracion"] = [
            [
                "numero" => "1",
                "nombre" => "GASTOS ADMINISTRATIVOS EN " . strtoupper($nombreJunta),
                "asignado" => $datos["administracion"],
                "ejercido" => $datos["administracion"]
            ]
        ];

        $datos["detalles"]["cultura"] = [
            [
                "numero" => "1",
                "nombre" => "EVENTOS CULTURALES EN " . strtoupper($nombreJunta),
                "asignado" => $datos["cultura"],
                "ejercido" => $datos["cultura"]
            ]
        ];
    }
    // Datos para San Baltazar Campeche
    elseif ($nombreJunta === "San Baltazar Campeche") {
        $datos["general"] = 40505450.54;
        $datos["obras"] = 40505450.54;
        $datos["servicios"] = 0;
        
        $datos["detalles"]["obras"] = [
            [
                "numero" => "1",
                "nombre" => "REHABILITACIÓN DE PARQUE LOMAS DE SAN MIGUEL ENTRE CALLE TONATIUH Y CALLE QUETZALCÓATL, EN LA COLONIA LOMAS DE SAN MIGUEL",
                "asignado" => 20252725.27,
                "ejercido" => 20252725.27
            ],
            [
                "numero" => "2",
                "nombre" => "REHABILITACIÓN DE PARQUE REFORMA AGUA AZUL ENTRE CALLE 47 PONIENTE Y PRIVADA UXMAL, EN LA COLONIA REFORMA AGUA AZUL",
                "asignado" => 20252725.27,
                "ejercido" => 20252725.27
            ]
        ];

        // Datos aleatorios para seguridad, administración y cultura (San Baltazar Campeche)
        $datos["seguridad"] = rand(400000, 1200000);
        $datos["administracion"] = rand(250000, 900000);
        $datos["cultura"] = rand(150000, 700000);

        // Detalles aleatorios
        $datos["detalles"]["seguridad"] = [
            [
                "numero" => "1",
                "nombre" => "PATRULLAS Y EQUIPO DE SEGURIDAD EN " . strtoupper($nombreJunta),
                "asignado" => $datos["seguridad"],
                "ejercido" => $datos["seguridad"]
            ]
        ];

        $datos["detalles"]["administracion"] = [
            [
                "numero" => "1",
                "nombre" => "GASTOS DE ADMINISTRACIÓN EN " . strtoupper($nombreJunta),
                "asignado" => $datos["administracion"],
                "ejercido" => $datos["administracion"]
            ]
        ];

        $datos["detalles"]["cultura"] = [
            [
                "numero" => "1",
                "nombre" => "FESTIVALES Y ACTIVIDADES CULTURALES EN " . strtoupper($nombreJunta),
                "asignado" => $datos["cultura"],
                "ejercido" => $datos["cultura"]
            ]
        ];
    }
    // Datos por defecto para otras juntas
    else {
        $base = rand(5000000, 15000000);
        $datos["general"] = $base;
        $datos["obras"] = round($base * 0.7, 2);
        $datos["servicios"] = round($base * 0.2, 2);
        $datos["seguridad"] = round($base * 0.05, 2);
        $datos["administracion"] = round($base * 0.03, 2);
        $datos["cultura"] = round($base * 0.02, 2);
        
        $datos["detalles"]["obras"] = [
            [
                "numero" => "1",
                "nombre" => "OBRA PRINCIPAL EN " . strtoupper($nombreJunta),
                "asignado" => round($datos["obras"] * 0.7, 2),
                "ejercido" => round($datos["obras"] * 0.7, 2)
            ],
            [
                "numero" => "2",
                "nombre" => "CONSTRUCCIÓN SECUNDARIA EN " . strtoupper($nombreJunta),
                "asignado" => round($datos["obras"] * 0.3, 2),
                "ejercido" => round($datos["obras"] * 0.3, 2)
            ]
        ];
        
        $datos["detalles"]["servicios"] = [
            [
                "numero" => "1",
                "nombre" => "MANTENIMIENTO URBANO EN " . strtoupper($nombreJunta),
                "asignado" => $datos["servicios"],
                "ejercido" => $datos["servicios"]
            ]
        ];

        // Detalles aleatorios para seguridad, administración y cultura (otras juntas)
        $datos["detalles"]["seguridad"] = [
            [
                "numero" => "1",
                "nombre" => "EQUIPAMIENTO DE SEGURIDAD EN " . strtoupper($nombreJunta),
                "asignado" => $datos["seguridad"],
                "ejercido" => $datos["seguridad"]
            ]
        ];

        $datos["detalles"]["administracion"] = [
            [
                "numero" => "1",
                "nombre" => "GASTOS ADMINISTRATIVOS EN " . strtoupper($nombreJunta),
                "asignado" => $datos["administracion"],
                "ejercido" => $datos["administracion"]
            ]
        ];

        $datos["detalles"]["cultura"] = [
            [
                "numero" => "1",
                "nombre" => "ACTIVIDADES CULTURALES EN " . strtoupper($nombreJunta),
                "asignado" => $datos["cultura"],
                "ejercido" => $datos["cultura"]
            ]
        ];
    }

    return $datos;
}

$datosJunta = obtenerDatosPorJunta($junta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados - Juntas Auxiliares</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
        .encabezado h1 {
            margin: 0;
            flex-grow: 1;
        }
        .barra-navegacion {
            background-color: #b71c1c;
            padding: 10px 0;
            text-align: center;
        }
        .barra-navegacion a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }
        .barra-navegacion a:hover {
            text-decoration: underline;
        }
        .contenido {
            max-width: 1000px;
            margin: 20px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .tabla-grafica {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            max-width: 1000px;
            margin: 20px auto;
        }
        .tabla {
            flex: 1;
            min-width: 300px;
            margin-right: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: center;
        }
        .grafica {
            width: 300px;
            height: 300px;
        }
        .descargas {
            max-width: 1000px;
            margin: 30px auto;
            display: flex;
            align-items: center;
            gap: 15px;
            justify-content: center;
        }
        select, button {
            padding: 8px;
            font-size: 14px;
            cursor: pointer;
        }
        button:hover {
            background-color: #b71c1c;
            color: white;
            border: none;
        }
        .descargas label {
            font-weight: bold;
        }
        .ui-autocomplete {
            max-height: 200px;
            overflow-y: auto;
            overflow-x: hidden;
        }
    </style>
</head>
<body>

<div class="encabezado">
    <img src="escudo_puebla.png" alt="Escudo de Puebla">
    <h1>Puebla - Juntas Auxiliares</h1>

    <form method="get" action="" style="display: flex; gap: 8px; align-items: center;">
        <input 
            type="text" 
            id="buscarJunta"
            name="junta" 
            placeholder="Buscar otra junta auxiliar" 
            style="padding: 6px; font-size: 14px;" 
            required
            value="<?php echo htmlspecialchars($junta); ?>"
        >
        <input type="hidden" name="presupuesto" value="<?php echo htmlspecialchars($presupuesto); ?>">
        <button type="submit" style="padding: 6px 12px; font-size: 14px;">Buscar</button>
    </form>
</div>

<div class="barra-navegacion">
    <a href="interfaz.php">Inicio</a>
    <a onclick="filtrar('general')">General</a>
    <a onclick="filtrar('obras')">Obras Públicas</a>
    <a onclick="filtrar('servicios')">Servicios Urbanos</a>
    <a onclick="filtrar('administracion')">Administración</a>
    <a onclick="filtrar('cultura')">Cultura</a>
    <a onclick="filtrar('seguridad')">Seguridad</a>
</div>

<div class="contenido">
    <h2>Resultado de tu búsqueda</h2>
    <p><strong>Junta Auxiliar:</strong> <?php echo htmlspecialchars($junta); ?></p>
    <p><strong>Tipo de Presupuesto:</strong> <span id="tipoSeleccionado"><?php echo ucfirst(htmlspecialchars($filtro_inicial)); ?></span></p>

    <a href="detalles.php?junta=<?php echo urlencode($junta); ?>&presupuesto=<?php echo urlencode($filtro_inicial); ?>">
        <button>Más detalles</button>
    </a>

    <a href="http://localhost/mi_pagina/generar_pdf.php" target="_blank" style="margin-left: 10px;">
        <button>Solicitar datos (PDF)</button>
    </a>
</div>

<div class="tabla-grafica">
    <div class="tabla">
        <label for="anio">Año:</label>
        <select id="anio" onchange="actualizarTablaYGrafica()">
            <option value="2023">2023</option>
            <option value="2024" selected>2024</option>
        </select>

        <label for="mes">Mes:</label>
        <select id="mes" onchange="actualizarTablaYGrafica()">
            <option value="enero">Enero</option>
            <option value="febrero" selected>Febrero</option>
            <option value="marzo">Marzo</option>
        </select>

        <table id="tablaGeneral" style="<?php echo ($filtro_inicial === 'general') ? '' : 'display:none;'; ?>">
            <thead>
                <tr>
                    <th>Concepto</th>
                    <th>Cantidad</th>
                    <th>Porcentaje</th>
                </tr>
            </thead>
            <tbody id="tablaPresupuesto">
                <tr>
                    <td>General</td>
                    <td>$<?php echo number_format($datosJunta['general'], 2); ?></td>
                    <td>100%</td>
                </tr>
                <tr>
                    <td>Obras Públicas</td>
                    <td>$<?php echo number_format($datosJunta['obras'], 2); ?></td>
                    <td><?php echo $datosJunta['general'] > 0 ? number_format(($datosJunta['obras'] / $datosJunta['general']) * 100, 2) : '0'; ?>%</td>
                </tr>
                <tr>
                    <td>Servicios Urbanos</td>
                    <td>$<?php echo number_format($datosJunta['servicios'], 2); ?></td>
                    <td><?php echo $datosJunta['general'] > 0 ? number_format(($datosJunta['servicios'] / $datosJunta['general']) * 100, 2) : '0'; ?>%</td>
                </tr>
                <tr>
                    <td>Seguridad</td>
                    <td>$<?php echo number_format($datosJunta['seguridad'], 2); ?></td>
                    <td><?php echo $datosJunta['general'] > 0 ? number_format(($datosJunta['seguridad'] / $datosJunta['general']) * 100, 2) : '0'; ?>%</td>
                </tr>
                <tr>
                    <td>Administración</td>
                    <td>$<?php echo number_format($datosJunta['administracion'], 2); ?></td>
                    <td><?php echo $datosJunta['general'] > 0 ? number_format(($datosJunta['administracion'] / $datosJunta['general']) * 100, 2) : '0'; ?>%</td>
                </tr>
                <tr>
                    <td>Cultura</td>
                    <td>$<?php echo number_format($datosJunta['cultura'], 2); ?></td>
                    <td><?php echo $datosJunta['general'] > 0 ? number_format(($datosJunta['cultura'] / $datosJunta['general']) * 100, 2) : '0'; ?>%</td>
                </tr>
            </tbody>
        </table>

        <table id="tablaDetalles" style="margin-top: 30px; display:none;">
            <thead>
                <tr>
                    <th>Núm.</th>
                    <th>Obra/Servicio</th>
                    <th>Importe Asignado</th>
                    <th>Importe Ejercido</th>
                    <th>Porcentaje</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <div class="grafica">
        <canvas id="graficaPastel"></canvas>
    </div>
</div>

<div class="descargas">
    <label for="descargarTipo">Selecciona tipo:</label>
    <select id="descargarTipo">
        <option value="todo">Toda la información</option>
        <option value="general">Presupuesto general</option>
        <option value="obras">Obras públicas</option>
        <option value="servicios">Servicios urbanos</option>
        <option value="administracion">Administración</option>
        <option value="cultura">Cultura</option>
        <option value="seguridad">Seguridad</option>
    </select>

    <button onclick="descargarCSV()">Descargar CSV</button>
    <button onclick="descargarJSON()">Descargar JSON</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
// Datos específicos por junta auxiliar
const datosJunta = <?php echo json_encode($datosJunta); ?>;

let grafica;
const ctx = document.getElementById('graficaPastel').getContext('2d');

function calcularPorcentajes(valores) {
    const total = valores.reduce((sum, val) => sum + val, 0);
    return valores.map(val => total > 0 ? ((val / total) * 100).toFixed(2) + '%' : '0%');
}

function actualizarTablaYGrafica() {
    const anio = document.getElementById('anio').value;
    const mes = document.getElementById('mes').value;
    const filtro = window.filtroSeleccionado || '<?php echo $filtro_inicial; ?>';

    if(filtro === 'general') {
        document.getElementById('tablaGeneral').style.display = '';
        document.getElementById('tablaDetalles').style.display = 'none';
    } else {
        document.getElementById('tablaGeneral').style.display = 'none';
        const tbody = document.querySelector('#tablaDetalles tbody');
        tbody.innerHTML = '';
        
        const items = datosJunta.detalles[filtro];
        const total = items.reduce((sum, item) => sum + item.ejercido, 0);
        
        items.forEach(item => {
            const porcentaje = total > 0 ? ((item.ejercido / total) * 100).toFixed(2) + '%' : '0%';
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${item.numero}</td>
                <td>${item.nombre}</td>
                <td>$${item.asignado.toLocaleString('es-MX', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                <td>$${item.ejercido.toLocaleString('es-MX', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                <td>${porcentaje}</td>
            `;
            tbody.appendChild(tr);
        });
        document.getElementById('tablaDetalles').style.display = '';
    }

    let valores, etiquetas;
    
    if(filtro === 'general') {
        valores = [
            datosJunta.obras,
            datosJunta.servicios,
            datosJunta.seguridad,
            datosJunta.administracion,
            datosJunta.cultura
        ];
        etiquetas = ['Obras Públicas', 'Servicios Urbanos', 'Seguridad', 'Administración', 'Cultura'];
    } else {
        valores = datosJunta.detalles[filtro].map(item => item.ejercido);
        etiquetas = datosJunta.detalles[filtro].map(item => `Obra ${item.numero}`);
    }

    const porcentajes = calcularPorcentajes(valores);

    if(grafica) {
        grafica.destroy();
    }

    grafica = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: etiquetas,
            datasets: [{
                label: 'Presupuesto',
                data: valores,
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56',
                    '#4BC0C0',
                    '#9966FF',
                    '#FF9F40'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if(context.parsed !== null){
                                label += '$' + context.parsed.toLocaleString('es-MX', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                                label += ' (' + porcentajes[context.dataIndex] + ')';
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
}

function filtrar(tipo) {
    window.filtroSeleccionado = tipo;
    document.getElementById('tipoSeleccionado').textContent = tipo.charAt(0).toUpperCase() + tipo.slice(1);
    actualizarTablaYGrafica();
}

function descargarCSV() {
    const tipo = document.getElementById('descargarTipo').value;
    let contenido = 'Concepto,Cantidad,Porcentaje\n';
    
    if(tipo === 'todo' || tipo === 'general'){
        const total = datosJunta.general;
        contenido += `General,${total},100%\n`;
        contenido += `Obras públicas,${datosJunta.obras},${((datosJunta.obras / total) * 100).toFixed(2)}%\n`;
        contenido += `Servicios urbanos,${datosJunta.servicios},${((datosJunta.servicios / total) * 100).toFixed(2)}%\n`;
        contenido += `Seguridad,${datosJunta.seguridad},${((datosJunta.seguridad / total) * 100).toFixed(2)}%\n`;
        contenido += `Administración,${datosJunta.administracion},${((datosJunta.administracion / total) * 100).toFixed(2)}%\n`;
        contenido += `Cultura,${datosJunta.cultura},${((datosJunta.cultura / total) * 100).toFixed(2)}%\n`;
    } else if(tipo !== 'todo') {
        contenido = 'Núm.,Obra/Servicio,Importe Asignado,Importe Ejercido,Porcentaje\n';
        const items = datosJunta.detalles[tipo];
        const total = items.reduce((sum, item) => sum + item.ejercido, 0);
        items.forEach(item => {
            const porcentaje = total > 0 ? ((item.ejercido / total) * 100).toFixed(2) + '%' : '0%';
            contenido += `"${item.numero}","${item.nombre}",${item.asignado},${item.ejercido},${porcentaje}\n`;
        });
    }

    const blob = new Blob([contenido], { type: 'text/csv;charset=utf-8;' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'presupuesto_' + document.getElementById('tipoSeleccionado').textContent.toLowerCase() + '.csv';
    a.click();
    URL.revokeObjectURL(url);
}

function descargarJSON() {
    const tipo = document.getElementById('descargarTipo').value;
    let jsonDatos = {};

    if(tipo === 'todo') {
        const total = datosJunta.general;
        jsonDatos = {
            general: { cantidad: datosJunta.general, porcentaje: '100%' },
            obras: { cantidad: datosJunta.obras, porcentaje: ((datosJunta.obras / total) * 100).toFixed(2) + '%' },
            servicios: { cantidad: datosJunta.servicios, porcentaje: ((datosJunta.servicios / total) * 100).toFixed(2) + '%' },
            seguridad: { cantidad: datosJunta.seguridad, porcentaje: ((datosJunta.seguridad / total) * 100).toFixed(2) + '%' },
            administracion: { cantidad: datosJunta.administracion, porcentaje: ((datosJunta.administracion / total) * 100).toFixed(2) + '%' },
            cultura: { cantidad: datosJunta.cultura, porcentaje: ((datosJunta.cultura / total) * 100).toFixed(2) + '%' }
        };
    } else if(tipo === 'general') {
        const total = datosJunta.general;
        jsonDatos = {
            general: { cantidad: datosJunta.general, porcentaje: '100%' },
            obras: { cantidad: datosJunta.obras, porcentaje: ((datosJunta.obras / total) * 100).toFixed(2) + '%' },
            servicios: { cantidad: datosJunta.servicios, porcentaje: ((datosJunta.servicios / total) * 100).toFixed(2) + '%' },
            seguridad: { cantidad: datosJunta.seguridad, porcentaje: ((datosJunta.seguridad / total) * 100).toFixed(2) + '%' },
            administracion: { cantidad: datosJunta.administracion, porcentaje: ((datosJunta.administracion / total) * 100).toFixed(2) + '%' },
            cultura: { cantidad: datosJunta.cultura, porcentaje: ((datosJunta.cultura / total) * 100).toFixed(2) + '%' }
        };
    } else {
        const items = datosJunta.detalles[tipo];
        const total = items.reduce((sum, item) => sum + item.ejercido, 0);
        jsonDatos = {
            [tipo]: items.map(item => ({
                numero: item.numero,
                nombre: item.nombre,
                asignado: item.asignado,
                ejercido: item.ejercido,
                porcentaje: total > 0 ? ((item.ejercido / total) * 100).toFixed(2) + '%' : '0%'
            }))
        };
    }

    const jsonString = JSON.stringify(jsonDatos, null, 2);
    const blob = new Blob([jsonString], {type: "application/json"});
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = "presupuesto_" + document.getElementById('tipoSeleccionado').textContent.toLowerCase() + ".json";
    a.click();
    URL.revokeObjectURL(url);
}

// MODIFICACIÓN PRINCIPAL - Autocompletado simplificado
$(function() {
    const juntasAuxiliares = <?php echo json_encode($juntas_auxiliares); ?>;
    
    $("#buscarJunta").autocomplete({
        source: juntasAuxiliares,
        minLength: 1,
        select: function(event, ui) {
            $("#buscarJunta").val(ui.item.value);
            // Forzar envío del formulario para recargar con nueva junta
            $("form").submit();
            return false;
        }
    });
});

window.onload = function() {
    actualizarTablaYGrafica();
};
</script>

</body>
</html>