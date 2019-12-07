<template>
    <form v-bind:id="nameForm" v-on:submit.prevent="submitForm(); return false;" class="forms" v-bind:name="nameForm">
        <h4 class="text-color1 mb-3">{{forms.title}}</h4>      
        
        <div class="form-group" v-for="input of forms.inputs">
            <label for="my-input">{{input.name}}</label>
            <input v-if="input.typeElement === 'input'" v-bind:id="input.id" v-bind:class="input.class" v-bind:type="input.type" v-bind:name="input.nameElement" v-bind:placeholder="input.placeholder" v-bind:required="input.required">
            <select v-bind:data-table='input.table' v-if="input.typeElement === 'select' && input.dependency === false" v-bind:name="input.nameElement" v-bind:id="input.id" v-bind:class="input.class" v-bind:required="input.required">
                <option v-if="input.data !== ''" v-for="data in forms.inputs[0].data" v-bind:value="data.id">{{data.name}}</option>
            </select>

            <select v-if="input.typeElement === 'select' && input.dependency !== false" v-on:change="getSelect(input.dependency, input.nameElement)"  v-bind:data-table='input.table'  v-bind:name="input.nameElement" v-bind:id="input.id" v-bind:class="input.class" v-bind:required="input.required">
                <option value="">Seleccione una opción</option>
                <option v-for="data in input.data" v-bind:value="data.id">{{data.name}}</option>
            </select>
        </div>
        
        <div class="form-group d-flex justify-content-between">
            <button v-if="forms.buttons.submit" class="submit font-weight-bold text-white rounded-0 block col-5 bg-color1"  v-bind:class="forms.buttons.submit.class" type="submit">{{forms.buttons.submit.name}}</button>
            <button v-if="forms.buttons.cancel" v-on:click="returnPage"  class="cancel font-weight-bold text-color1 rounded-0 block col-5 bg-color3 p-0"  v-bind:class="forms.buttons.cancel.class" type="button">{{forms.buttons.cancel.name}}</button>
        </div>  

        <div class="form-group">
            <p id="response" class="text-color1 mt-2">{{response}}</p>
        </div>    
        
    </form>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                forms: [],
                response: ''
            }
        },

        props: ['nameForm'],

        created: function(){
            console.log(this.nameForm);
            
            this.getForms();
        },  

        

        methods: {
            getForms: function(){
                var url = '/get-forms';
                axios.post(url, {
                    formName: this.nameForm
                })
                .then(response => {
                    this.forms = response.data;
                    console.log(this.forms);
                })
                .catch(e => {
                    console.log(e)
                })

            },
            returnPage: function(){
                window.history.back();
            },

            submitForm: function(){
                
                let formData = new FormData(document.forms.namedItem(this.nameForm));
                let data = {};
                formData.forEach(function (value, key) {
                    data[key] = value;
                });

                console.log(data);
                
                
                axios.post('/post-forms', {
                    data: data,
                    model: this.forms.model
                })
                .then(response => {

                    console.log(response.data['message']);
                    $('#'+this.nameForm).trigger("reset");
                    if(response.data.status == 200){
                        console.log($('#' + this.nameForm + ' #response'));
                        this.response = response.data['message']
                        
                    }else{
                        console.log(response);
                          
                    }

                })
                .catch(e => {
                    console.log(e)
                })
            },

            getSelect: function(dependency, nameElement){


                console.log($('#'+ this.nameForm+' #' + nameElement).val());
                
                $('#' + this.nameForm + ' #' + dependency).html('');

                axios.post('/getDataByID', {
                    field: nameElement,
                    idField: $('#' + this.nameForm + ' #' + nameElement).val(),
                    table: $('#' + this.nameForm + ' #' + dependency).attr('data-table')
                })
                .then(response => {

                    console.log(response.data);

                    

                    let data = response.data['data']; 

                    data.forEach(element => {
                        $('#' + dependency).append(`<option value="${element.id}">${element.name}</option>`);
                    });

                })
                .catch(e => {
                    console.log(e)
                })

            }
        },
    }
    

</script>
