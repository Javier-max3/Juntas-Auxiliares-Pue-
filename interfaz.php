<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Puebla - Juntas Auxiliares</title>
  <style>
    body {
      margin: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background-color: rgba(228, 221, 221, 0.87);
    }

    .encabezado {
      display: flex;
      align-items: center;
      background-color: rgb(4, 128, 0);
      padding: 10px 30px;
      color: white;
    }

    .encabezado img {
      width: 50px;
      margin-right: 15px;
    }

    .encabezado h1 {
      margin: 0;
      font-size: 24px;
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
    }

    .barra-navegacion a:hover {
      text-decoration: underline;
    }

    .container {
      max-width: 800px;
      margin: 30px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      display: flex;
      justify-content: space-between;
    }

    .formulario {
      width: 55%;
    }

    .tabla-descripcion {
      width: 40%;
      font-size: 14px;
    }

    .tabla-descripcion table {
      width: 100%;
      border-collapse: collapse;
    }

    .tabla-descripcion th,
    .tabla-descripcion td {
      border: 1px solid #ccc;
      padding: 8px;
      text-align: left;
    }

    .search-box {
      position: relative;
    }

    .search-box input {
      width: calc(100% - 50px);
      padding: 12px;
      font-size: 16px;
      border: 2px solid #ccc;
      border-radius: 5px;
    }

    .search-box button {
      position: absolute;
      top: 0;
      right: 0;
      height: 100%;
      border: none;
      background: none;
      cursor: pointer;
    }

    .search-box button img {
      width: 24px;
      margin: 10px;
    }

    .suggestions {
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      background-color: white;
      border: 1px solid #ccc;
      border-top: none;
      max-height: 200px;
      overflow-y: auto;
      z-index: 999;
    }

    .suggestions div {
      padding: 10px;
      cursor: pointer;
    }

    .suggestions div:hover {
      background-color: #f0f0f0;
    }

    select {
      margin-top: 20px;
      width: 100%;
      padding: 10px;
      font-size: 16px;
    }

    .formulario h2 {
      text-align: center;
    }

    /* Imágenes de juntas auxiliares con nombre debajo */
    .imagenes-juntas {
      max-width: 800px;
      margin: 40px auto 20px auto;
      display: flex;
      justify-content: space-around;
      gap: 15px;
      flex-wrap: wrap;
    }

    .junta-item {
      text-align: center;
      max-width: 180px;
    }

    .junta-item img {
      max-width: 180px;
      max-height: 120px;
      width: 100%;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.2);
      object-fit: cover;
    }

    .junta-item p {
      margin-top: 8px;
      font-weight: bold;
      color: #333;
    }

    .preguntas-frecuentes {
      max-width: 800px;
      margin: 20px auto 60px auto;
      background: white;
      padding: 25px 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      font-size: 16px;
      line-height: 1.5;
    }

    .preguntas-frecuentes h3 {
      margin-top: 0;
      margin-bottom: 15px;
      color: #b71c1c;
      text-align: center;
    }

    .btn-solicitar:hover {
      background-color: #7a0d0d;
    }
  </style>
</head>
<body>

<div class="encabezado">
  <img src="escudo_puebla.png" alt="Escudo de Puebla" />
  <h1>Puebla - Juntas Auxiliares</h1>
</div>

<div class="barra-navegacion">
  <a href="#">Presupuesto</a>
  <a href="#">General</a>
  <a href="#">Obras Públicas</a>
  <a href="#">Servicios Urbanos</a>
  <a href="#">Administración</a>
  <a href="#">Cultura</a>
  <a href="#">Seguridad</a>
</div>

<div class="container">

  <div class="formulario">
    <h2>Consulta tu Junta Auxiliar</h2>

    <form action="resultados.php" method="GET">
      <div class="search-box">
        <input type="text" name="junta" id="buscador" placeholder="Escribe el nombre de tu junta auxiliar..." autocomplete="off" required />
        <button type="submit">
          <img src="lupa.jpg" alt="Buscar" />
        </button>
        <div id="sugerencias" class="suggestions"></div>
      </div>

      <!-- Cambié name de tipoPresupuesto a presupuesto -->
      <select name="presupuesto" id="tipoPresupuesto" required>
        <option value="">-- Selecciona un tipo de presupuesto --</option>
        <option value="general">Presupuesto general</option>
        <option value="seguridad">Presupuesto en seguridad</option>
        <option value="obras">Presupuesto en obras públicas</option>
        <option value="servicios">Presupuesto de servicios urbanos</option>
        <option value="administracion">Presupuesto en administración</option>
        <option value="cultura">Presupuesto cultural</option>
      </select>
    </form>
  </div>

  <div class="tabla-descripcion">
    <table>
      <tr><th>Categoría</th><th>Descripción</th></tr>
      <tr><td>Obras Públicas</td><td>Gastos para el cuidado de la junta, como bacheo y cuidado de banquetas.</td></tr>
      <tr><td>Servicios Urbanos</td><td>Gastos para el cuidado de áreas urbanas como la poda y cuidado de áreas recreativas.</td></tr>
      <tr><td>Administración</td><td>Gastos para la presidencia, como sueldos y gastos de oficina.</td></tr>
      <tr><td>Cultura</td><td>Fiestas culturales y recreativas para la comunidad.</td></tr>
      <tr><td>Seguridad</td><td>Apoyo a seguridad pública y vigilancia.</td></tr>
    </table>
  </div>

</div>

<!-- Imágenes de juntas auxiliares -->
<div class="imagenes-juntas">
  <div class="junta-item">
    <img src="San baltazar.jpg" alt="San Baltazar Campeche" />
    <p>San Baltazar Campeche</p>
  </div>
  <div class="junta-item">
    <img src="zaragoza.webp" alt="Ignacio Zaragoza" />
    <p>Ignacio Zaragoza</p>
  </div>
  <div class="junta-item">
    <img src="totimehuacan.jpg" alt="San Francisco Totimehuacan" />
    <p>San Francisco Totimehuacan</p>
  </div>
</div>

<!-- Preguntas frecuentes -->
<div class="preguntas-frecuentes">
  <h3>Preguntas frecuentes</h3>
  <p><strong>¿Cómo puedo consultar el presupuesto de mi junta auxiliar?</strong><br />
  Simplemente escribe el nombre de tu junta auxiliar en el buscador y selecciona el tipo de presupuesto que deseas consultar.</p>

  <p><strong>¿Qué tipos de presupuesto puedo consultar?</strong><br />
  Puedes consultar presupuestos generales, de seguridad, obras públicas, servicios urbanos, administración y cultura.</p>

  <p><strong>¿Qué hago si no encuentro mi junta auxiliar?</strong><br />
  Asegúrate de escribir correctamente el nombre o intenta con las primeras letras para que aparezca en las sugerencias.</p>

  <p><strong>¿Cómo solicito información oficial sobre el presupuesto?</strong><br />
  Puedes dar clic en el botón "Solicitar datos" para descargar un PDF con los pasos para solicitar información oficial.</p>
</div>

<script>
  window.onload = () => {
    const aceptar = confirm("Esta pagina le ayuda a conocer el uso del presupuesto de su Junta Auxiliar y cómo se utiliza ese dinero en apoyo a su comunidad..");
    if (!aceptar) {
      window.location.href = "https://www.google.com";
    }
  };

  const juntas = [
    "San Baltazar Campeche",
    "Ignacio Zaragoza",
    "San Francisco Totimehuacan",
    "San Jerónimo Caleras",
    "San Miguel Canoa",
    "San Pablo Xochimehuacan",
    "Santa María Xonacatepec",
    "La Resurrección",
    "San Sebastián de Aparicio",
    "Santo Tomás Chautla"
  ];

  const input = document.getElementById("buscador");
  const sugerencias = document.getElementById("sugerencias");

  input.addEventListener("input", () => {
    const valor = input.value.toLowerCase();
    sugerencias.innerHTML = "";

    if (valor.length === 0) return;

    const filtradas = juntas.filter(junta =>
      junta.toLowerCase().startsWith(valor)
    );

    filtradas.forEach(junta => {
      const div = document.createElement("div");
      div.textContent = junta;
      div.addEventListener("click", () => {
        input.value = junta;
        sugerencias.innerHTML = "";
      });
      sugerencias.appendChild(div);
    });
  });

  document.addEventListener("click", e => {
    if (!e.target.closest(".search-box")) {
      sugerencias.innerHTML = "";
    }
  });
</script>

</body>
</html>
