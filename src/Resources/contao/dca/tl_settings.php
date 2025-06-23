<?php

use Contao\Config;

$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = str_replace('{files_legend', '{zapier_legend}, zapier_hook_url;{files_legend', $GLOBALS['TL_DCA']['tl_settings']['palettes']['default']);


$GLOBALS['TL_DCA']['tl_settings']['fields'] += [

    // Add an input box for the prompt
    'zapier_hook_url' => [
        'label'             => &$GLOBALS['TL_LANG']['tl_settings']['zapier_hook_url'],
        'inputType'         => 'text',
        'default'           => '',
        'eval'              => ['mandatory' => 'false', 'tl_class' => 'w50'],
    ]
    
];
