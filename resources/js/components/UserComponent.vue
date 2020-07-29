<template>
    <div class="container">
        <div class="row  justify-content-center">
            <img height="300" src="assets/logo.jpeg">
            <div class="col-md-8 justify-content-center">
                <button @click="opcion='mandar'" class="btn-primary btn mr-2">Mandar Solicitud</button><button
                    @click="opcion='ver'" class="btn-primary btn">Ver Solicitud</button>
                <div class="card">
                    <div class="card-header">Solicitudes Pendientes</div>

                    <div class="card-body">
                        <table class="table" v-if="opcion==='ver'">
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
                                    <td>En Revisión</td>
                                </tr>

                            </tbody>
                        </table>

                        <form v-if="opcion==='mandar'">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Nombre Completo">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Puesto</label>
                                <input type="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Puesto">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Cargar C.V.</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <button type="submit" class="btn btn-primary">Envíar</button>
                        </form>
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
        },
        data() {
            return {
                opcion: 'mandar'
            }
        }
    }

</script>
