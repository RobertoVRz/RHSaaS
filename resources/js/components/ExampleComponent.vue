<template>
    <div class="container">
        <div class="row  justify-content-center">
            <img height="300" src="assets/logo.jpeg" />
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
                                <tr v-for="(solicitud, i) of solicitudes" :key="i">
                                    <th scope="row">{{ i + 1 }}</th>
                                    <td>{{ solicitud.nombre }}</td>
                                    <td>{{ solicitud.puesto }}</td>
                                    <td><a :href="solicitud.documento" target="_blank">Ver Documento</a></td>
                                    <td>{{ solicitud.status }}</td>
                                    <td>
                                        <button class="btn-success btn mr-2" @click="status('Aceptado', i, solicitud.id)">
                                            Aceptar</button
                                        ><button class="btn-danger btn" @click="status('Rechazado', i, solicitud.id)">
                                            Rechazar
                                        </button>
                                    </td>
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
import Axios from "axios";

export default {
    data() {
        return {
            solicitudes: []
        };
    },
    async created() {
        await this.obtenerDatos();
    },
    methods: {
        async obtenerDatos() {
            await Axios.get("/obtenerSolicitudes")
                .then(data => {
                    console.log(data);
                    this.solicitudes = data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        async status(status, i, id) {
            await Axios.post('/editarStatus', {
                id: id,
                status: status
            }).then(data => {
                console.log(data)
                this.solicitudes[i].status = status
            }).catch(error => {
                console.log(error)
                alert('No fue posible actualizar el status')
            })
        }
    }
};
</script>
