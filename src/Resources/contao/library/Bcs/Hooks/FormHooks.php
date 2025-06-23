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
            
            /*
            $demo_array = array(
                "test_var_1" => "test data",
                "test_var_2" => "test data bbb",
                "test_var_3" => "test data ccc",
                "test_var_4" => "test ddd"
            );
            echo "<pre>" . print_r($demo_array) . "</pre><br><br>";
            echo "<pre>" . print_r($submittedData) . "</pre><br><br>";
            */
            
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
