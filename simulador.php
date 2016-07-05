<?php include('head.php')?>
  <section class="content">
    <div class="container">
      <h1 class="page-title">Bienvenido al simulador de crédito</h1>

      <div class="flex-row-sbtwn top">
        <form class="column">
          <label for="tipo">Tipo de crédito</label>
          <div class="campo">
            <select name="tipo">
              <option value="educativo">Educativo</option>
              <option value="salud">De salud</option>
              <option value="libre">De libre inversión</option>
            </select>
          </div>

          <label for="cuanto">Monto del crédito</label>
          <div class="campo">
            <input type="number" name="cuanto" value="2000000">
          </div>

          <label for="cuotas">Cuotas (meses de plazo)</label>
          <div class="campo">
            <input type="number" name="cuotas" max="48" step="3" placeholder="cuotas" value="12">
          </div>

          <label for="desembolso">Fecha de desembolso</label>
          <div class="campo fechas">
            <input type="date" name="desembolso">
          </div>

          <div class="campo">
            <input type="button" value="Simular crédito" onClick="credito(this.form)">
          </div>
        </form>
        <div class="tabla column">
          <table class="simulacion">
            <thead>
              <tr>
                <th>No</th>
                <th>Cuota</th>
                <th>Saldo</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>

        </div>
      </div>
    </div>





    <script type="text/javascript">
      function credito(datos) {
        var _tipo = datos.tipo.value,
          _cuotas = datos.cuotas.value,
          _desembolso = datos.desembolso.value,
          _monto = datos.cuanto.value,
          _interes = 0,
          _deuda,
          _pago;

        switch (_tipo) {
        case 'educativo':
          _interes = (0.08 / 12)
          break;
        case 'salud':
          _interes = (0.10 / 12)
          break;
        case 'libre':
          _interes = (0.15 / 12)
          break;
        }


        _deuda = _monto * (1 + _interes * (_cuotas));

        _pago = _deuda / _cuotas;

        //Limpia la tabla de datos previos
        $('.simulacion tbody').html('');

        for (i = 0; i < _cuotas; i++) {
          //No	Cuota	Saldo
          //          if(parseInt(_deuda)< 100 ){
          //            _deuda = 0;
          //          } else {
          //            _deuda = parseInt(_deuda);
          //          }
          //Carga la tabla con datos de simulación
          _saldo = parseInt(_deuda - _pago);
          if (_saldo < 100) {
            _saldo = 0;
          }
          $('.simulacion').append('<tr><td>' + (i + 1) + '</td><td> $' + parseInt(_pago) + '</td><td> $' + _saldo + '</td></tr>')

          _deuda -= _pago;


        }

      }
    </script>


  </section>
  <?php include('foot.php')?>