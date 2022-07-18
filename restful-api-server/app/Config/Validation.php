<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
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
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $opd = [
        'opd_nama' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama OPD Mohon diisi'
            ]
        ],
        'opd_email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email OPD Mohon diisi',
                'valid_email' => 'Yang Anda Masukkan Bukan Email'
            ]
        ],
        'opd_alamat' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Alamat OPD Mohon diisi'
            ]
        ],
        'opd_telp' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nomor Telepon OPD Mohon diisi'
            ]
        ]
    ];

    public $mahasiswa = [
        'mahasiswa_nama' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama Mahasiswa Mohon diisi'
            ]
        ],
        'mahasiswa_nim' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'NIM Mahasiswa Mohon diisi'
            ]
        ],
        'mahasiswa_email' => [
            'rules' => 'required|valid_email',
            'errors' => [
                'required' => 'Email Mahasiswa Mohon diisi',
                'valid_email' => 'Yang Anda Masukkan Bukan Email'
            ]
        ]
    ];
}
