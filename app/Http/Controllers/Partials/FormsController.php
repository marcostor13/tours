<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function getForms(Request $request){

        $form = $request->formName;


        switch ($form) {
            case 'agregar-localidad':
                return [
                    'inputs' => [
                        [                   
                            'name' => 'Codigo',
                            'nameElement' => 'code',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => '',
                            'placeholder' => 'Ingrese el código'                    
                        ],
                        [
                            'name' => 'Ciudad',
                            'nameElement' => 'city',
                            'typeElement' => 'input',
                            'type' => 'text',
                            'class' => 'form-control',
                            'id' => '',
                            'placeholder' => 'Ingrese la Ciudad'  
                        ]
                    ],

                    'buttons' => [
                        'submit' => [
                            'name' => 'Agregar',
                            'class' => ''
                        ],
                        'cancel' => [
                            'name' => 'Cancelar',    
                            'class' => ''                        
                        ]
                    ]


                ];
                break;
            
            default:
                # code...
                break;
        }

    }
}
