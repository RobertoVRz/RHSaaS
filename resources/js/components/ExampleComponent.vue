<template>
    <div class="container">
        <div class="row  justify-content-center">
                <img height="300" src="assets/logo.jpeg">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">Solicitudes Pendientes</div>

                    <div class="card-body">
                        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Puesto</th>
      <th scope="col">C.V.</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Juanito Mendoza</td>
      <td>Recursos Humanos</td>
      <td><a href="#">Ver Documento</a></td>
      <td><button class="btn-success btn mr-2">Aceptar</button><button class="btn-danger btn">Rechazar</button></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Mariela Pérez</td>
      <td>Recursos Humanos</td>
      <td><a href="#">Ver Documento</a></td>
      <td><button class="btn-success btn mr-2">Aceptar</button><button class="btn-danger btn">Rechazar</button></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Monica Rodríguez</td>
      <td>Recursos Humanos</td>
      <td><a href="#">Ver Documento</a></td>
      <td><button class="btn-success btn mr-2">Aceptar</button><button class="btn-danger btn">Rechazar</button></td>
    </tr>
  </tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
