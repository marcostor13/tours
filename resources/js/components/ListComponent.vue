<template>
  <div class="tableList responsive">
      <div class="d-flex justify-content-end">
          <a v-bind:href="'/home/'+urlPage"><button  class="btn1">Agregar {{namePage}}</button></a>
      </div>
      <mdb-datatable
        :data="data"
        striped.        
        bordered
      />
  </div>
</template>

<script>
import { mdbDatatable } from 'mdbvue';
import axios from 'axios';

export default {
  name: 'DatatablePage',
  components: {
    mdbDatatable
  },

  props: ['namePage', 'urlPage'],

  data() {
    return {
      data: {
        columns: [{
              label: 'Ubigeo',
              field: 'ubigeo',
              sort: 'asc'
            },
            {
              label: 'País',
              field: 'country',
              sort: 'asc'
            },
            {
              label: 'Ciudad',
              field: 'city',
              sort: 'asc'
            },
            {
              label: 'Localidad',
              field: 'location',
              sort: 'asc'
            },
            {
              label: 'Código Localidad',
              field: 'locationcode',
              sort: 'asc'
            }],
        rows: []
      }
    }
  },

  
  mounted: function(){      
      this.getTables();
  },  

  methods: {

   
    getTables: function(){
        var url = '/get-tables';
        axios.post(url, {
            table: this.namePage
        })
        .then(response => {         
          


          let data = response.data.data;

          data.forEach(e => {
            this.data.rows.push({
              ubigeo: e.countrycode + e.citycode + e.code,
              country: e.country,
              city: e.city,
              location: e.name,
              locationcode: e.code
            });
          });

         

      
        })
        .catch(e => {
            console.log(e)
        })
    }
  },
};
</script>
