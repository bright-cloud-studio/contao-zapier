<?php

namespace Bcs\Hooks;

use Contao\Config;
use Contao\Controller;
use Contao\Environment;
use Contao\FrontendUser;
use Contao\Input;
use Contao\MemberModel;
use Contao\PageModel;


class FormHooks
{

    // When a form is submitted
    public function onFormSubmit($submittedData, $formData, $files, $labels, $form)
    {
        
        // Assignment Selection Form
        if($formData['formID'] == 'zapier') {
            
            // Grab the hook url from Settings
            $config_url = Config::get('zapier_hook_url');
            
            if($config_url) {
                
                // Convert $submitted data into this format
                $html_array = http_build_query($submittedData);
                
                // curl my data into the zap
                $ch = curl_init( $config_url);
                curl_setopt( $ch, CURLOPT_POST, 1);
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $html_array);
                curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt( $ch, CURLOPT_HEADER, 0);
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                
                $response = curl_exec( $ch );

            }
            
        }

    }

}
