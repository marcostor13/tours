<template>
  <div class="tableList responsive">
      <div class="d-flex justify-content-end">
          <a v-bind:href="'/home/'+urlPage"><button  class="btn1">Agregar {{namePage}}</button></a>
      </div>
      <mdb-datatable
        :data="data"
        striped.        
        bordered
        id="tableConctacs"
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
              field: 'contact_type',
              sort: 'asc'
            },
            {
              label: 'Nombre comercial',
              field: 'tradename',
              sort: 'asc'
            },
            // {
            //   label: 'Razón Social',
            //   field: 'businessname',
            //   sort: 'asc'
            // },
            // {
            //   label: 'Dirección Comercial',
            //   field: 'address',
            //   sort: 'asc'
            // },
            // {
            //   label: 'Dirección Real',
            //   field: 'realaddress',
            //   sort: 'asc'
            // },
            // {
            //   label: 'Ruc',
            //   field: 'ruc',
            //   sort: 'asc'
            // },
            {
              label: 'Nombre de contacto',
              field: 'name',
              sort: 'asc'
            },
            // {
            //   label: 'Categoría',
            //   field: 'hotelcategory',
            //   sort: 'asc'
            // },
            {
              label: 'Teléfono',
              field: 'phone',
              sort: 'asc'
            },
            // {
            //   label: 'Teléfono de emergencia',
            //   field: 'emergencyphone',
            //   sort: 'asc'
            // },
            // {
            //   label: 'Correo',
            //   field: 'email',
            //   sort: 'asc'
            // },
            {
              label: 'Correo de reservas',
              field: 'reservationmail',
              sort: 'asc'
            },
            // {
            //   label: 'Pais',
            //   field: 'country',
            //   sort: 'asc'
            // },
            // {
            //   label: 'Ciudad',
            //   field: 'city',
            //   sort: 'asc'
            // },
            // {
            //   label: 'Politicas de vencimiento',
            //   field: 'expirationpolicy',
            //   sort: 'asc'
            // },
            // {
            //   label: 'Banco',
            //   field: 'bank',
            //   sort: 'asc'
            // },
            // {
            //   label: 'Moneda',
            //   field: 'currency',
            //   sort: 'asc'
            // },
            {
              label: 'Opciones',
              field: 'opciones',
              sort: 'asc'
            }
            ],
        rows: []
      }
    }
  },

  
  mounted: function(){      
      this.getTables();
  },  

  methods: {

   
    getTables: function(){
        
        console.log('contacts', this.namePage);
        var url = '/get-tables';
        axios.post(url, {
            table: 'contacts'
        })
        .then(response => {        

          let data = response.data.data;

          console.log(response);
          var itemsProcessed = 0;

          data.forEach(e => {
            this.data.rows.push({
              contact_type: e.contact_type,
              tradename: e.tradename,
              // businessname: e.businessname,
              // address: e.address,
              // realaddress: e.realaddress,
              // ruc: e.ruc,
              name: e.name,
              // hotelcategory: e.hotelcategory,
              phone: e.phone,
              realaddress: e.realaddress,
              // emergencyphone: e.emergencyphone,
              // email: e.email,
              reservationmail: e.reservationmail,
              // country: e.country,
              // city: e.city,
              // expirationpolicy: e.expirationpolicy,
              // bank: e.bank,
              // currency: e.currency,
              accountbank: e.accountbank,
              opciones: `<button data-type="view" data-id="${e.id}" data-element="${e.name}" type="button" class="btn-option btn-edit m-0">Ver detalle</button><button data-type="delete" data-id="${e.id}" type="button" class="btn-option btn-delete m-0 ml-2">Eliminar</button>` 
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

              // $('#modal-title').text('Editar');
              // $('#modal-content').html(`
              //   <form id="formModal" class="form-group d-flex align-items-start justify-content-center flex-column">
              //     <div class="form-group mt-4">
              //       <input id="name-field" class="form-control" value="${element}" placeholder="Ingrese valor">   
              //     <div>
              //     <button class="btn1 mt-4 col-12" type="submit">Editar</button> 
              //     <p id="responseModal" class="mt-4"></p>                   
              //   </form>
              // `).promise().done(function(){
              //   $('#modal-close').click(function(){
              //     $('.modal-container').addClass('hide-force');
              //   });
                
              //   $('#formModal').submit(function(){
              //     var url = '/edit-field';
              //     axios.post(url, {
              //       table: 'currencies',
              //       field: 'name',
              //       id: id,
              //       value: $('#name-field').val(),
              //     })
              //     .then(response => {
              //       if (response.data.status == 200) {
              //         $('#responseModal').text(response.data.message);
              //         $('#formModal input').val('');
              //         window.location.reload();
              //       } else {
              //         console.log(response.data);
              //       }
              //     })
              //     .catch(e => {
              //       console.log(e)
              //     });

              //     return false;

              //   });
              // });

              // $('.modal-container').removeClass('hide-force');

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
                    table: 'contacts',
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
          }else if(type == 'view'){

            $('#modal-title').text('Detalle');

              $('#modal-content').html(`
                <div id="content-view" class="row align-items-center justify-content-center col-12"></div>
              `).promise().done(function(){
                $('#modal-close').click(function(){
                  $('.modal-container').addClass('hide-force');
                });

                var url = '/get-tables';
                axios.post(url, {
                    table: 'contacts'
                })
                .then(response => {        

                  let data = response.data.data;

                  console.log(data);

                  data.forEach(e => {

                      if(e.id == id){

                        console.log('id:', e.id);
                        $('#content-view').html(`
                          <div class="row col-12 justify-content-center mt-3">
                            <p class="col-5 bg-color1 text-white p-2">Tipo de contacto</p>
                            <p class="col-5 ml-2 p-2"> ${e.contact_type} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Nombre comercial</p>
                            <p class="col-5 ml-2 p-2"> ${e.tradename} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Razón Social</p>
                            <p class="col-5 ml-2 p-2"> ${e.businessname} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Dirección comercial</p>
                            <p class="col-5 ml-2 p-2"> ${e.address} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Dirección Real</p>
                            <p class="col-5 ml-2 p-2"> ${e.realaddress} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Ruc</p>
                            <p class="col-5 ml-2 p-2"> ${e.ruc} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Nombre del contacto</p>
                            <p class="col-5 ml-2 p-2"> ${e.name} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Categoría del hotel</p>
                            <p class="col-5 ml-2 p-2"> ${e.hotelcategory} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Teléfono</p>
                            <p class="col-5 ml-2 p-2"> ${e.phone} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Teléfono de emergencia</p>
                            <p class="col-5 ml-2 p-2"> ${e.emergencyphone} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Correo</p>
                            <p class="col-5 ml-2 p-2"> ${e.email} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Correo para reservas</p>
                            <p class="col-5 ml-2 p-2"> ${e.reservationmail} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">País</p>
                            <p class="col-5 ml-2 p-2"> ${e.country} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Ciudad</p>
                            <p class="col-5 ml-2 p-2"> ${e.city} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Política de expiración</p>
                            <p class="col-5 ml-2 p-2"> ${e.expirationpolicy} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Banco</p>
                            <p class="col-5 ml-2 p-2"> ${e.bank} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Moneda</p>
                            <p class="col-5 ml-2 p-2"> ${e.currency} </p>
                          </div>
                          <div class="row col-12 justify-content-center">
                            <p class="col-5 bg-color1 text-white p-2">Número de cuenta</p>
                            <p class="col-5 ml-2 p-2"> ${e.accountbank} </p>
                          </div>
                        `);
                      }
       
                  });
                  

                })
                .catch(e => {
                    console.log(e)
                })

                
                

                });
              }

            $('.modal-container').removeClass('hide-force');

        });
      }, 500 );
    },
  },
};
</script>
