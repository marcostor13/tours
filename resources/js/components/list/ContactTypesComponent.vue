<template>
  <div class="tableList responsive">
      <div class="d-flex justify-content-end">
          <a v-bind:href="'/home/'+urlPage"><button  class="btn1">Agregar tipos de contactos</button></a>
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
              label: 'Tipo de contacto',
              field: 'tipodecontacto',
              sort: 'asc'
            },
            {
              label: 'Opciones',
              field: 'opciones',
              sort: 'asc'
            }],
        rows: []
      }
    }
  },

  
  mounted: function(){      
      this.getTables();
      this.namePage = this.namePage.replace(/-/g, ' ');
  },  

  methods: {
       
    getTables: function(){
        var url = '/get-tables';
        axios.post(url, {
            table: this.namePage
        })
        .then(response => {        

          let data = response.data.data;

          var itemsProcessed = 0;

          data.forEach(e => {
            this.data.rows.push({
              tipodecontacto: e.name,     
              opciones: `<button data-type="edit" data-id="${e.id}" data-element="${e.name}" type="button" class="btn-option btn-edit m-0">Editar</button><button data-type="delete" data-id="${e.id}" type="button" class="btn-option btn-delete m-0 ml-2">Eliminar</button>`         
            });

            itemsProcessed++;            
          });

          if(itemsProcessed === data.length) {
            this.generateEvents();
          }

        })
        .catch(e => {
            console.log(e)
        })
    },

    generateEvents: function(){     

      setTimeout(function(){      
        $('.btn-option').click(function(){
          let type = $(this).attr('data-type');
          let id = $(this).attr('data-id');
          let element = $(this).attr('data-element');
          
          if(type == 'edit'){

              $('#modal-title').text('Editar');
              $('#modal-content').html(`
                <form id="formModal" class="form-group d-flex align-items-start justify-content-center flex-column">
                  <div class="form-group mt-4">
                    <input id="name-field" class="form-control" value="${element}" placeholder="Ingrese valor">   
                  <div>
                  <button class="btn1 mt-4 col-12" type="submit">Editar</button> 
                  <p id="responseModal" class="mt-4"></p>                   
                </form>
              `).promise().done(function(){
                $('#modal-close').click(function(){
                  $('.modal-container').addClass('hide-force');
                });
                
                $('#formModal').submit(function(){
                  var url = '/edit-field';
                  axios.post(url, {
                    table: 'contact_types',
                    field: 'name',
                    id: id,
                    value: $('#name-field').val(),
                  })
                  .then(response => {
                    if (response.data.status == 200) {
                      $('#responseModal').text(response.data.message);
                      $('#formModal input').val('');
                      window.location.reload();
                    } else {
                      console.log(response.data);
                    }
                  })
                  .catch(e => {
                    console.log(e)
                  });

                  return false;

                });
              });

              $('.modal-container').removeClass('hide-force');

          }else if(type == 'delete') {
            $('#modal-title').text('Eliminar');
              $('#modal-content').html(`
                <div>
                  <p>¿Está seguro de eliminar?</p>
                  <div>
                    <button id="btn-yes" class="btn-delete col-3">SI</button>
                    <button id="btn-no" class="btn-cancel col-3">NO</button>
                  </div>
                </div>
              `).promise().done(function(){
                $('#modal-close').click(function(){
                  $('.modal-container').addClass('hide-force');
                });
                $('#btn-no').click(function () {
                  $('.modal-container').addClass('hide-force');
                });
                
                $('#btn-yes').click(function(){
                  var url = '/delete-field';
                  axios.post(url, {
                    table: 'contact_types',
                    id: id,
                  })
                  .then(response => {
                    if (response.data.status == 200) {
                      $('#responseModal').text(response.data.message);
                      window.location.reload();
                    } else {
                      console.log(response.data);
                    }
                  })
                  .catch(e => {
                    console.log(e)
                  });

                  return false;

                });
              });

              $('.modal-container').removeClass('hide-force');
          }

        });
      }, 500 );
    },



    
  },
};
</script>
