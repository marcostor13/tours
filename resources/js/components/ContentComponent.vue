<template>
    
    <!-- Mantenimiento - Localidades -->
    
    <div class="p-0" v-if="namePage==='agregar-localidad'">
        <div class="bg-color4 p-3">
            <h5 class="mt-1 text-capitalize text-white">{{title}}</h5>
        </div>
        <div class="p-5">
            <div class="col-6">
                <div class="d-flex justify-content-end">
                    <a v-bind:href="'/home/localidades'"><button  class="btn1">Regresar</button></a>
                </div>
    
                <forms-component v-bind:name-form="form='agregar-pais'"></forms-component>
                <forms-component v-bind:name-form="form='agregar-ciudad'" class="mt-5"></forms-component>    
                <forms-component v-bind:name-form="form='agregar-localidad'" class="mt-5"></forms-component>    

            </div>

        </div>
    </div>

    <div class="p-0" v-else-if="namePage==='localidades'">
        <div class="bg-color4 p-3">
            <h5 class="mt-1 text-capitalize text-white">{{title}}</h5>
        </div>
        <div class="p-5">
            <div class="">
                <locations-component v-bind:name-page="namePage" v-bind:url-page="urlPage='agregar-localidad'"></locations-component>                    
            </div>

        </div>
    </div>

    <!-- Tarifas - Hoteles -->
    
    <div class="p-0" v-else-if="namePage==='agregar-hotel'">
        <div class="bg-color4 p-3">
            <h5 class="mt-1 text-capitalize text-white">{{title}}</h5>
        </div>
        <div class="p-5">
            <div class="col-6">
                <div class="d-flex justify-content-end">
                    <a v-bind:href="'/home/hoteles'"><button  class="btn1">Regresar</button></a>
                </div>

                <forms-component v-bind:name-form="form='agregar-hotel'"></forms-component>
                 

            </div>

        </div>
    </div>

    <div class="p-0" v-else-if="namePage==='hoteles'">
        <div class="bg-color4 p-3">
            <h5 class="mt-1 text-capitalize text-white">{{title}}</h5>
        </div>
        <div class="p-5">
            <div class="">
                  <hotels-component v-bind:name-page="namePage" v-bind:url-page="urlPage='agregar-hotel'"></hotels-component>              
            </div>

        </div>
    </div>

    <!-- Mantenimiento - Tablas - Tipo de contactos -->
    
    <div class="p-0" v-else-if="namePage==='agregar-tipo-de-contactos'">
        <div class="bg-color4 p-3">
            <h5 class="mt-1 text-capitalize text-white">{{title}}</h5>
        </div>
        <div class="p-5">
            <div class="col-6">
                <div class="d-flex justify-content-end">
                    <a v-bind:href="'/home/tipo-de-contactos'"><button  class="btn1">Regresar</button></a>
                </div>

                <forms-component v-bind:name-form="form='agregar-contact-types'"></forms-component>
                 

            </div>

        </div>
    </div>

    <div class="p-0" v-else-if="namePage==='tipo-de-contactos'">
        <div class="bg-color4 p-3">
            <h5 class="mt-1 text-capitalize text-white">{{title}}</h5>
        </div>
        <div class="p-5">
            <div class="">
                  <contact-types-component v-bind:name-page="'contact-types'" v-bind:url-page="urlPage='agregar-tipo-de-contactos'"></contact-types-component>              
            </div>

        </div>
    </div>

    <!-- Mantenimiento - Tablas - Bancos -->
    
    <div class="p-0" v-else-if="namePage==='agregar-bancos'">
        <div class="bg-color4 p-3">
            <h5 class="mt-1 text-capitalize text-white">{{title}}</h5>
        </div>
        <div class="p-5">
            <div class="col-6">
                <div class="d-flex justify-content-end">
                    <a v-bind:href="'/home/bancos'"><button  class="btn1">Regresar</button></a>
                </div>

                <forms-component v-bind:name-form="form='agregar-banks'"></forms-component>
                 

            </div>

        </div>
    </div>

    <div class="p-0" v-else-if="namePage==='bancos'">
        <div class="bg-color4 p-3">
            <h5 class="mt-1 text-capitalize text-white">{{title}}</h5>
        </div>
        <div class="p-5">
            <div class="">
                  <banks-component v-bind:name-page="'banks'" v-bind:url-page="urlPage='agregar-bancos'"></banks-component>              
            </div>

        </div>
    </div>

    <!-- Mantenimiento - Tablas - MOnedas -->
    
    <div class="p-0" v-else-if="namePage==='agregar-monedas'">
        <div class="bg-color4 p-3">
            <h5 class="mt-1 text-capitalize text-white">{{title}}</h5>
        </div>
        <div class="p-5">
            <div class="col-6">
                <div class="d-flex justify-content-end">
                    <a v-bind:href="'/home/monedas'"><button  class="btn1">Regresar</button></a>
                </div>

                <forms-component v-bind:name-form="form='agregar-currencies'"></forms-component>
                 

            </div>

        </div>
    </div>

    <div class="p-0" v-else-if="namePage==='monedas'">
        <div class="bg-color4 p-3">
            <h5 class="mt-1 text-capitalize text-white">{{title}}</h5>
        </div>
        <div class="p-5">
            <div class="">
                  <currencies-component v-bind:name-page="'currencies'" v-bind:url-page="urlPage='agregar-monedas'"></currencies-component>              
            </div>

        </div>
    </div>




</template>

<script>
    export default {
        
        
        data() {
            return {
                title: '',
                form: ''
            }
        },

        props: ['namePage'],

        created: function(){
            console.log(this.namePage);
            this.getTitle();
            this.title = this.title.replace(/-/g, ' ');
        },  

        methods: {
            getTitle: function(){
                this.title = this.namePage.replace('-', ' ');
            }
        },
    }
    
</script>
