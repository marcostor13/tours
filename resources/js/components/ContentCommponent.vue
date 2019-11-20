<template>
    
    <!-- Mantenimiento - Localidades -->
    
    <div class="p-0" v-if="namePage==='agregar-localidad'">
        <div class="bg-color4 p-3">
            <h5 class="mt-1 text-capitalize text-white">{{title}}</h5>
        </div>
        <div class="p-5">
            <div class="col-6">
                <forms-commponent v-bind:name-form="namePage"></forms-commponent>    

            </div>

        </div>
    </div>

    <div class="p-0" v-else-if="namePage==='localidades'">
        <div class="bg-color4 p-3">
            <h5 class="mt-1 text-capitalize text-white">{{title}}</h5>
        </div>
        <div class="p-5">
            <div class="">
                <list-commponent v-bind:name-form="namePage"></list-commponent>                    
            </div>

        </div>
    </div>




</template>

<script>
    export default {
        data() {
            return {
                title: '',
            }
        },

        props: ['namePage'],

        created: function(){
            console.log(this.namePage);
            this.getTitle();
        },  

        methods: {
            getTitle: function(){
                this.title = this.namePage.replace('-', ' ');
            }
        },
    }
    
</script>
