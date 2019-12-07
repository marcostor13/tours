<?php

namespace App\Http\Controllers\Partials;

use App\Bank;
use App\City;
use App\Contact;
use App\Country;
use App\Currency;
use App\Location;
use App\Contact_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class FormsController extends Controller
{
    public function getForms(Request $request){

        $form = $request->formName;

        switch ($form) {
            case 'agregar-pais':
                return [
                    'title' => 'Paises',
                    'model' => 'Country',
                    'inputs' => [
                        [                   
                            'name' => 'Código',
                            'nameElement' => 'code',
                            'typeElement' => 'input',
                            'type' => 'number',
                            'class' => 'form-control',
                            'id' => 'codigo',
                            'placeholder' => 'Ingrese el código',
                            'required' => 'true'                    
                        ],
                        [
                            'name' => 'Nombre Corto',
                            'nameElement' => 'shortcode',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => '',
                            'placeholder' => 'Ingrese el nombre corto',
                            'required' => 'true'  
                        ],
                        [
                            'name' => 'País',
                            'nameElement' => 'name',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => '',
                            'placeholder' => 'Ingrese el pais',
                            'required' => 'true'  
                        ]
                    ],

                    'buttons' => [
                        'submit' => [
                            'name' => 'Agregar',
                            'class' => ''
                        ],
                        
                    ]


                ];
                break;

            case 'agregar-ciudad':
                return [
                    'title' => 'Ciudades',
                    'model' => 'City',
                    'inputs' => [
                        [
                            'name' => 'Pais',
                            'nameElement' => 'countryid',
                            'typeElement' => 'select',
                            'type' => '',
                            'class' => 'form-control',
                            'id' => 'countryid',
                            'placeholder' => '',
                            'required' => 'true',
                            'data' => Country::all(),
                            'dependency' => false,
                            'table' => ''
                        ],
                        [
                            'name' => 'Ciudad',
                            'nameElement' => 'name',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'name',
                            'placeholder' => 'Ingrese la ciudad',
                            'required' => 'true',                            
                        ],
                        [
                            'name' => 'Código',
                            'nameElement' => 'code',
                            'typeElement' => 'input',
                            'type' => 'number',
                            'class' => 'form-control',
                            'id' => 'code',
                            'placeholder' => 'Ingrese el código',
                            'required' => 'true',
                        ],
                        
                    ],                    

                    'buttons' => [
                        'submit' => [
                            'name' => 'Agregar',
                            'class' => ''
                        ],

                    ]


                ];
                break;

            case 'agregar-localidad':
                return [
                    'title' => 'Localidades',
                    'model' => 'Location',
                    'inputs' => [
                        [
                            'name' => 'Pais',
                            'nameElement' => 'countryid',
                            'typeElement' => 'select',
                            'type' => '',
                            'class' => 'form-control',
                            'id' => 'countryid',
                            'placeholder' => '',
                            'required' => 'true',
                            'data' => Country::all(),
                            'dependency' => 'cityid',
                            'table' => 'countries'
                        ],
                        [
                            'name' => 'Ciudad',
                            'nameElement' => 'cityid',
                            'typeElement' => 'select',
                            'type' => '',
                            'class' => 'form-control',
                            'id' => 'cityid',
                            'placeholder' => '',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => false,
                            'table' => 'cities'
                        ],
                        [
                            'name' => 'Localidad',
                            'nameElement' => 'name',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'name',
                            'placeholder' => 'Ingrese la localidad',
                            'required' => 'true',
                        ],
                        [
                            'name' => 'Código',
                            'nameElement' => 'code',
                            'typeElement' => 'input',
                            'type' => 'number',
                            'class' => 'form-control',
                            'id' => 'code',
                            'placeholder' => 'Ingrese el código',
                            'required' => 'true',
                        ],
                        

                    ],


                    'buttons' => [
                        'submit' => [
                            'name' => 'Agregar',
                            'class' => ''
                        ],

                    ]


                ];
                break;

            case 'agregar-contact-types':
                return [
                    'title' => 'Tipo de contacto',
                    'model' => 'Contact_type',
                    'inputs' => [
                        [
                            'name' => 'Tipo',
                            'nameElement' => 'name',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'name',
                            'placeholder' => 'Ingrese el tipo de contacto',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'contact_types'
                        ],
                        
                    ],


                    'buttons' => [
                        'submit' => [
                            'name' => 'Agregar',
                            'class' => ''
                        ],

                    ]


                ];
                break;

            case 'agregar-hotel':
                return [
                    'title' => 'Hoteles',
                    'model' => 'Contact',
                    'inputs' => [
                        [
                            'name' => 'Tipo de contacto',
                            'nameElement' => 'contact_typeid',
                            'typeElement' => 'select',
                            'type' => '',
                            'class' => 'form-control',
                            'id' => 'contact_typeid',
                            'placeholder' => '',
                            'required' => 'true',
                            'data' => Contact_type::all(),
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Nombre Comercial',
                            'nameElement' => 'tradename',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'tradename',
                            'placeholder' => 'Ingrese el nombre comercial',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Razón Social',
                            'nameElement' => 'businessname',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'businessname',
                            'placeholder' => 'Ingrese la razón social',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Dirección Comercial',
                            'nameElement' => 'address',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'address',
                            'placeholder' => 'Ingrese la dirección comercial',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Dirección Real (se verá en el voucher)',
                            'nameElement' => 'realaddress',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'realaddress',
                            'placeholder' => 'Ingrese la dirección real',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Ruc',
                            'nameElement' => 'ruc',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'ruc',
                            'placeholder' => 'Ingrese el ruc',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Nombre de contacto',
                            'nameElement' => 'name',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'name',
                            'placeholder' => 'Ingrese el nombre de la persona de contacto',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Categoría',
                            'nameElement' => 'hotelcategory',
                            'typeElement' => 'input',
                            'type' => 'number',
                            'class' => 'form-control',
                            'id' => 'hotelcategory',
                            'placeholder' => 'Ingrese la categoría',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Teléfono',
                            'nameElement' => 'phone',
                            'typeElement' => 'input',
                            'type' => 'number',
                            'class' => 'form-control',
                            'id' => 'phone',
                            'placeholder' => 'Ingrese un número de teléfono',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Teléfono de emergencia',
                            'nameElement' => 'emergencyphone',
                            'typeElement' => 'input',
                            'type' => 'number',
                            'class' => 'form-control',
                            'id' => 'emergencyphone',
                            'placeholder' => 'Ingrese un teléfono de emergencia',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Correo',
                            'nameElement' => 'email',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'email',
                            'placeholder' => 'Ingrese un correo',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Correo de reservas',
                            'nameElement' => 'reservationmail',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'reservationmail',
                            'placeholder' => 'Ingrese un correo para reservas',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Pais',
                            'nameElement' => 'countryid',
                            'typeElement' => 'select',
                            'type' => '',
                            'class' => 'form-control',
                            'id' => 'countryid',
                            'placeholder' => '',
                            'required' => 'true',
                            'data' => Country::all(),
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Ciudad',
                            'nameElement' => 'city',
                            'typeElement' => 'select',
                            'type' => '',
                            'class' => 'form-control',
                            'id' => 'city',
                            'placeholder' => '',
                            'required' => 'true',
                            'data' => City::all(),
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Politicas de vencimiento',
                            'nameElement' => 'expirationpolicy',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'expirationpolicy',
                            'placeholder' => 'Ingrese el número de días',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Banco',
                            'nameElement' => 'bankid',
                            'typeElement' => 'select',
                            'type' => '',
                            'class' => 'form-control group1',
                            'id' => 'bankid',
                            'placeholder' => '',
                            'required' => 'true',
                            'data' => Bank::all(),
                            'dependency' => '',
                            'table' => 'contacts',
                        ],
                        [
                            'name' => 'Moneda',
                            'nameElement' => 'currencyid',
                            'typeElement' => 'select',
                            'type' => '',
                            'class' => 'form-control group1',
                            'id' => 'currencyid',
                            'placeholder' => '',
                            'required' => 'true',
                            'data' => Currency::all(),
                            'dependency' => '',
                            'table' => 'contacts',
                        ],
                        [
                            'name' => 'Número de cuenta bancaria',
                            'nameElement' => 'accountbank',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control group1',
                            'id' => 'accountbank',
                            'placeholder' => 'Ingrese el número de cuenta',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'contacts'
                        ],
                        [
                            'name' => 'Habilitado',
                            'nameElement' => 'enable',
                            'typeElement' => 'select',
                            'type' => '',
                            'class' => 'form-control',
                            'id' => 'enable',
                            'placeholder' => '',
                            'required' => 'true',
                            'data' => [
                                [
                                    'name' => 'Si',
                                    'id' => '1',
                                ],
                                [
                                    'name' => 'No',
                                    'id' => '0',
                                ],

                            ],
                            'dependency' => '',
                            'table' => 'contacts',
                        ],
                        
                        
                        

                    ],
                    'buttons' => [
                        'submit' => [
                            'name' => 'Agregar',
                            'class' => ''
                        ],

                    ]


                ];
                break;

            case 'agregar-banks':
                return [
                    'title' => 'Bancos',
                    'model' => 'Bank',
                    'inputs' => [
                        [
                            'name' => 'Tipo',
                            'nameElement' => 'name',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'name',
                            'placeholder' => 'Ingrese nombre del banco',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'banks'
                        ],
                        
                    ],


                    'buttons' => [
                        'submit' => [
                            'name' => 'Agregar',
                            'class' => ''
                        ],

                    ]


                ];
                break;

            case 'agregar-currencies':
                return [
                    'title' => 'Monedas',
                    'model' => 'Currency',
                    'inputs' => [
                        [
                            'name' => 'Tipo',
                            'nameElement' => 'name',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => 'name',
                            'placeholder' => 'Ingrese nombre corto de la moneda',
                            'required' => 'true',
                            'data' => '',
                            'dependency' => '',
                            'table' => 'currencies'
                        ],

                    ],


                    'buttons' => [
                        'submit' => [
                            'name' => 'Agregar',
                            'class' => ''
                        ],

                    ]


                ];
                break;

            

            default:
                # code...
                break;
        }

    }

    public function postForms(Request $request){

               
        switch ($request->model) {
            case 'Country':
                $model = new Country;    
                break;
            case 'City':
                $model = new City;
                break;
            case 'Location':
                $model = new Location;
                break;
            case 'Contact_type':
                $model = new Contact_type;
                break;
            case 'Bank':
                $model = new Bank;
                break;
            case 'Currency':
                $model = new Currency;
                break;
            case 'Contact':
                $model = new Contact;
                break;
                
            default:
                # code...
                break;
        }

        foreach ($request->data as $key => $value) {
            
            $model->$key = $value;
            
        }

        $companyid = Auth::user()->select('companyid')->get();

        $model->companyid = $companyid[0]->companyid;

        $model->save();

        return ['status' => 200, 'message' => 'Se agregó correctamente'];


        
    }

    public function getDataByID(Request $request){
        $field = $request->field;
        $idField = $request->idField;
        $table = $request->table;       

        $results = DB::table($table)->where($field, '=', $idField)->get();

        return ['status' => 200, 'data' => $results];
    }


    public function getTables(Request $request){
        $table = $request->table;
        $companyid = Auth::user()->select('companyid')->get();       

        switch ($table) {
            case 'localidades':
                $res = DB::table('locations')
                    ->join('cities', 'cities.id', '=', 'locations.cityid')
                    ->join('countries', 'countries.id', '=', 'locations.countryid')
                    ->select('locations.*', 'cities.name as city', 'cities.code as citycode', 'countries.name as country', 'countries.code as countrycode')
                    ->where('locations.companyid', '=', $companyid[0]->companyid )
                    ->get();

                return ['status' => 200, 'data' => $res];
                break;
            case 'contact-types':
                $res = DB::table('contact_types')   
                    ->where('companyid', '=', $companyid[0]->companyid)
                    ->get();

                return ['status' => 200, 'data' => $res];
                break;
            case 'banks':
                $res = DB::table('banks')
                    ->where('companyid', '=', $companyid[0]->companyid)
                    ->get();

                return ['status' => 200, 'data' => $res];
                break;
            case 'currencies':
                $res = DB::table('currencies')
                    ->where('companyid', '=', $companyid[0]->companyid)
                    ->get();

                return ['status' => 200, 'data' => $res];
                break;
            case 'contacts':
                $res = DB::table('contacts')
                    ->join('contact_types', 'contact_types.id', '=', 'contacts.contact_typeid')
                    ->join('countries', 'countries.id', '=', 'contacts.countryid')
                    ->join('cities', 'cities.id', '=', 'contacts.countryid')
                    ->join('banks', 'banks.id', '=', 'contacts.bankid')
                    ->join('currencies', 'currencies.id', '=', 'contacts.currencyid')
                    ->select('contacts.*', 'contact_types.name as contact_type','countries.name as country', 'cities.name as city', 'banks.name as bank', 'currencies.name as currency')
                    ->where('contacts.companyid', '=', $companyid[0]->companyid)
                    ->get();

                return ['status' => 200, 'data' => $res];
                break;
            
            default:
                # code...
                break;
        }

    }


    public function editField(Request $request){

        DB::table($request->table)->where('id', $request->id)
            ->update([$request->field => $request->value]);
        return ['status' => 200, 'message' => 'Campo editado']; 

    }

    public function deleteField(Request $request){

        DB::table($request->table)->where('id', $request->id)->delete();
        return ['status' => 200, 'message' => 'Campo eliminado']; 

    }

    




}
