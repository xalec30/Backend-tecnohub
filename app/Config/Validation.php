<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public array $user = [
        'username'     => ['required','max_length[100]'],
        'name'         => ['required','max_length[60]'],
        'middle_name'  => ['max_length[60]'],
        'last_name'    => ['required','max_length[60]'],
        'password'     => ['required'],
        'email'        => ['required','max_length[160]','valid_email'],
        'role_id'      => ['required','numeric']
    ];

    public array $category = [
        'name'         => ['required','max_length[100]'],
        'is_new'       => ['required','numeric'],
        'hidden'       => ['required','numeric'],     
    ];

    public array $id = [
        'id' => 'required|numeric',
    ];
}   
