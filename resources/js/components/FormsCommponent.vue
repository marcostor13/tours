<template>
    <form class="forms">
        <div class="form-group" v-for="input of forms.inputs">
            <label for="my-input">{{input.name}}</label>
            <input v-if="input.typeElement === 'input'" v-bind:id="input.id" v-bind:class="input.class" v-bind:type="input.type" v-bind:name="input.nameElement" v-bind:placeholder="input.placeholder">
        </div>
        <div class="form-group d-flex justify-content-between">
            <button v-if="forms.buttons.submit" class="submit font-weight-bold text-white rounded-0 block col-5 bg-color1"  v-bind:class="forms.buttons.submit.class" type="submit">{{forms.buttons.submit.name}}</button>
            <button v-on:click="returnPage" v-if="forms.buttons.cancel" class="cancel font-weight-bold text-color1 rounded-0 block col-5 bg-color3 p-0"  v-bind:class="forms.buttons.cancel.class" type="button">{{forms.buttons.cancel.name}}</button>
        </div>        
    </form>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                forms: [],
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
                })
                .catch(e => {
                this.errors.push(e)
                })

            },
            returnPage: function(){
                window.history.back();
            }
        },
    }
    

</script>
