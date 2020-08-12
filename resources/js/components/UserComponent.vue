<template>
    <div class="container">
        <div class="row  justify-content-center">
            <img height="300" src="assets/logo.jpeg" />
            <div class="col-md-8 justify-content-center">
                <button @click="opcion = 'mandar'" class="btn-primary btn mr-2">
                    Mandar Solicitud</button
                ><button @click="opcion = 'ver'" class="btn-primary btn">
                    Ver Solicitud
                </button>
                <div class="card">
                    <div class="card-header">Solicitudes Pendientes</div>

                    <div class="card-body">
                        <table class="table" v-if="opcion === 'ver'">
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
                                </tr>
                            </tbody>
                        </table>

                        <div v-if="opcion === 'mandar'">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input
                                    v-model="nombre"
                                    type="text"
                                    class="form-control"
                                    id="nombre"
                                    placeholder="Nombre Completo"
                                />
                            </div>
                            <div class="form-group">
                                <label for="puesto">Puesto</label>
                                <input
                                    v-model="puesto"
                                    type="text"
                                    class="form-control"
                                    id="puesto"
                                    placeholder="Puesto"
                                />
                            </div>
                            <div class="form-group">
                                <label for="archivo">Cargar C.V.</label>
                                <input
                                    type="file"
                                    class="form-control-file"
                                    id="archivo"
                                    ref="archivo"
                                    @change="onSelectFile()"
                                />
                            </div>
                            <button class="btn btn-primary" @click="enviar">
                                Envíar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from "axios";

export default {
    mounted() {
        console.log("Component mounted.");
    },
    data() {
        return {
            opcion: "mandar",
            nombre: "",
            puesto: "",
            file: "",
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
                    this.solicitudes = data.data
                })
                .catch(error => {
                    console.log(error);
                });
        },
        async enviar() {
            if (
                this.puesto !== "" &&
                this.nombre !== "" &&
                this.file !== null
            ) {
                await Axios.post("/crearSolicitud", {
                    nombre: this.nombre,
                    puesto: this.puesto
                })
                    .then(async data => {
                        console.log(data);
                        await this.subirArchivo(
                            "solicitudes/" + data.data + "/cv.pdf",
                            this.file
                        );
                        alert("Información guardada correctamente");
                        this.nombre = "";
                        this.puesto = "";
                    })
                    .catch(error => {
                        console.log(error);
                    });
            } else {
                alert("Faltan campos");
            }
        },
        async subirArchivo(path, file) {
            let datos = new FormData();
            datos.append("path", path);
            datos.append("file", file);
            await Axios.post("/subirArchivo", datos, {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            })
                .then(data => {
                    console.log(data);
                })
                .catch(error => console.log(error));
        },
        onSelectFile() {
            const input = this.$refs.archivo;
            const files = input.files;
            if (files.length > 0) {
                this.file = files[0];
            } else {
                this.file = null;
            }
        }
    }
};
</script>
