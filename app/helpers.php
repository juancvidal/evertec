<?php

function setJsonRequest($name, $email, $address, $mobile, $reference){

    

        // Request Information
        $request = [
            'locale' => 'es_CO',            
            'buyer' => [
                'name' => $name,                
                'email' => $email,                    
                'mobile' => $mobile,
                'address' => [
                    'street' => $address,                    
                ],
            ],
            'payment' => [
                'reference' => $reference,               
                'amount' => [                    
                    'currency' => 'COP',
                    'total' => 50000,
                ],                
                'allowPartial' => false,
            ],
            'expiration' => date('c', strtotime('+1 hour')),
            'ipAddress' => '127.0.0.1',
            'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.86 Safari/537.36',
            'returnUrl' => 'http://localhost:8000/state/'.$reference,            
        ];
    return $request;
}