<template>
    
    <nav id="menuLeft" class="menu nav d-flex flex-column p-0">
        <ul class="list-unstyled">
            <li v-on:click="downMenu('reservas')" v-bind:class="{ activeLi: (isActive === 'reservas') }" class="down nav-item cursor p-3 m-0 d-flex"><i class="fas fa-suitcase"></i><span class="ml-4">Reservas</span><div class="flex-1"><i class="fas fa-caret-down float-right"></i></div></li>
            <div v-bind:class="{ hide: (isActive !== 'reservas') }">
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-users-cog ml-2"></i><span class="ml-4">Armado grupos</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-directions ml-2"></i><span class="ml-4">Armado de tours</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-calendar-check ml-2"></i><span class="ml-4">Reserva de tours</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="far fa-calendar-alt ml-2"></i><span class="ml-4">Mis Reservas</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-file-invoice-dollar ml-2"></i><span class="ml-4">Cuentas por pagar</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-receipt ml-2"></i><span class="ml-4">Recepción de facturas</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-file-invoice ml-2"></i><span class="ml-4">Reportes</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-cash-register ml-2"></i><span class="ml-4">Saldos a favor</span></li>
            </div>
            <li v-on:click="downMenu('tarifas')" v-bind:class="{ activeLi: (isActive === 'tarifas') }" class="down nav-item cursor p-3 m-0 d-flex"><i class="fas fa-ticket-alt"></i><span class="ml-4">Tarifas</span><div class="flex-1"><i class="fas fa-caret-down float-right"></i></div></li>
            <div v-bind:class="{ hide: (isActive !== 'tarifas') }">
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-tram ml-2"></i><span class="ml-4">Excursiones</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-user-tie ml-2"></i></i><span class="ml-4">Guias</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-hotel ml-2"></i><span class="ml-4">Hoteles</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-utensils ml-2"></i><span class="ml-4">Restaurantes</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-bus ml-2"></i></i><span class="ml-4">Traslados</span></li>
            </div>
            <li v-on:click="downMenu('contactos')" v-bind:class="{ activeLi: (isActive === 'contactos') }" class="down nav-item cursor p-3 m-0 d-flex"><i class="fas fa-address-book"></i><span class="ml-4">Contactos</span><div class="flex-1"><i class="fas fa-caret-down float-right"></i></div></li>
            <div v-bind:class="{ hide: (isActive !== 'contactos') }">
                <li class="nav-item cursor p-3 m-0"><i class="far fa-id-card ml-2"></i><span class="ml-4">Clientes</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-user-tie ml-2"></i></i><span class="ml-4">Guias</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-hotel ml-2"></i><span class="ml-4">Hoteles</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-utensils ml-2"></i><span class="ml-4">Restaurantes</span></li>
            </div>
            <li v-on:click="downMenu('mantenimiento')" v-bind:class="{ activeLi: (isActive === 'mantenimiento') }" class="down nav-item cursor p-3 m-0 d-flex"><i class="fas fa-dice-d6"></i><span class="ml-4">Mantenimiento</span><div class="flex-1"><i class="fas fa-caret-down float-right"></i></div></li>
            <div v-bind:class="{ hide: (isActive !== 'mantenimiento' && isActive !== 'tablas') }">
                <li v-on:click="downMenu('tablas')" v-bind:class="{ activeLi: (isActive === 'tablas') }" class="down nav-item cursor p-3 m-0 d-flex"><i class="fas fa-table ml-2"></i><span class="ml-4">Tablas</span><div class="flex-1"><i class="fas fa-caret-down float-right"></i></div></li>
                <div v-bind:class="{ hide: (isActive !== 'tablas') }">
                    <li class="nav-item cursor p-3 m-0"><i class="fas fa-table ml-4"></i><span class="ml-4">Tipo de contactos</span></li>
                    <li class="nav-item cursor p-3 m-0"><i class="fas fa-table ml-4"></i><span class="ml-4">Bancos</span></li>
                    <li class="nav-item cursor p-3 m-0"><i class="fas fa-table ml-4"></i><span class="ml-4">Monedas</span></li>
                </div>  
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-hotel ml-2"></i><span class="ml-4">Hoteles</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-map-marker-alt ml-2"></i><span class="ml-4">Localidades</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-box-open ml-2"></i><span class="ml-4">Armado de paquetes</span></li>
                <li class="nav-item cursor p-3 m-0"><i class="fas fa-sync ml-2"></i><span class="ml-4">Tipo de cambio</span></li>
            </div>   
            <li v-on:click="cerrarSesion" v-bind:class="{ activeLi: (isActive === 'mantenimiento') }" class="down nav-item cursor p-3 m-0 d-flex"><i class="fas fa-door-open"></i><span class="ml-4">Salir</span><div class="flex-1"></div></li>       
        </ul>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                isActive: '',
            }
        },

        props: ['namePage'],

        created(){
            this.downMenu();            
        },  

        mounted() {
             $('#menuLeft div li ').click(function () {
                 if(!$(this).hasClass('down')){                 
                    let route = $(this).text().toLowerCase().replace(/ /g, "-").normalize('NFD')
                        .replace(/([aeio])\u0301|(u)[\u0301\u0308]/gi, "$1$2")
                        .normalize();
                    window.location.href="/home/"+route;
                }            
            });

            $('#menuLeft div li div li ').click(function () {
                 if(!$(this).hasClass('down')){                 
                    let route = $(this).text().toLowerCase().replace(/ /g, "-").normalize('NFD')
                        .replace(/([aeio])\u0301|(u)[\u0301\u0308]/gi, "$1$2")
                        .normalize();
                    window.location.href="/home/"+route;
                }            
            });
        },

        methods: {
            downMenu(id){               
                if(id == this.isActive){
                    this.isActive = '';
                }else{
                    this.isActive = id;
                }

            },  

            cerrarSesion(){
                window.location.href="/logout";
            }

            
        },
    }
    
</script>
