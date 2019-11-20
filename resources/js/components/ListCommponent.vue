<template>
  <div class="tableList responsive">
      <div class="d-flex justify-content-end">
          <a href="/home/agregar-localidad"><button  class="btn1">Agregar Localidades</button></a>
      </div>
      <mdb-datatable
        :data="data"
        striped
        bordered
      />
  </div>
</template>

<script>
import { mdbDatatable } from 'mdbvue';

export default {
  name: 'DatatablePage',
  components: {
    mdbDatatable
  },
  data() {
    return {
      data: {
          
        columns: [
          {
            label: 'Código',
            field: 'code',
            sort: 'asc'
          },
          {
            label: 'Ciudad',
            field: 'city',
            sort: 'asc'
          }
        ],
        rows: [
            {
                code: '28',
                city: 'Aguas Calientes'            
            },
            {
                code: '02',
                city: 'Arequipa'
            },
            {
                code: '17',
                city: 'Ayacucho'
            },
            {
                code: '19',
                city: 'Cajamarca'
            },
            {
                code: '06',
                city: 'Callao'
            },
            {
                code: '04',
                city: 'Chiclayo'
            },
            {
                code: '07',
                city: 'Chimbote'
            },
            {
                code: '18',
                city: 'Chincha Alta'
            },
            {
                code: '01',
                city: 'Lima'
            },
            {
                code: '11',
                city: 'Pucallpa'
            },
            {
                code: '20',
                city: 'Puno'
            }

        ]
      }
    }
  }
};
</script>
