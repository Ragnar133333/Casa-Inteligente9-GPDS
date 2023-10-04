<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles de Ventas</title>
</head>
<body>
  <h1>Detalles de Ventas</h1>
  <form id="detalleVentasForm">
    <label for="idDetalleV">ID Detalle de Venta:</label>
    <input type="number" id="idDetalleV" required>
    <br>
    <label for="cantidad">Cantidad:</label>
    <input type="number" step="0.01" id="cantidad" required>
    <br>
    <label for="formaPago">Forma de Pago:</label>
    <input type="text" id="formaPago" required>
    <br>
    <label for="impuestos">Impuestos:</label>
    <input type="number" step="0.01" id="impuestos" required>
    <br>
    <label for="precio">Precio:</label>
    <input type="number" step="0.01" id="precio" required>
    <br>
    <label for="idVenta">ID Venta:</label>
    <input type="number" id="idVenta" required>
    <br>
    <button type="submit">Agregar Detalle de Venta</button>
  </form>
  <table id="detalleVentasTable">
    <thead>
      <tr>
        <th>ID Detalle de Venta</th>
        <th>Cantidad</th>
        <th>Forma de Pago</th>
        <th>Impuestos</th>
        <th>Precio</th>
        <th>ID Venta</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
  <script src="detalles_ventas.js"></script>
</body>
</html>
