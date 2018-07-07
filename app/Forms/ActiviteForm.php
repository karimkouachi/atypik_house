<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ActiviteForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('libelle', 'text',[
                'rules' => 'required'
            ])
            ->add('adresse', 'text',[
                'rules' => 'required'
            ])
            ->add('description', 'textarea',[
                'rules' => 'required'
            ]);
    }
}
