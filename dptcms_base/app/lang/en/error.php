<?php
    
    return array(
        '400' => array(
            'error' => 'Bad Request',
            'details' => 'Your request couldn\'t be processed'
        ),
        '401' => array(
            'error' => 'Unauthorized Access',
            'details' => 'Sorry! Your request was Unauthorized.'
        ),
        '402' => array(
            'error' => 'Payment Required',
            'details' => 'Your last request requires Payment to be completed.'
        ),
        '403' => array(
            'error' => 'Forbidden',
            'details' => 'our last action could not be performed. Acces is Denied'
        ),
        '404' => array(
            'error' => 'Not Found',
            'details' => 'Oops! We are lost somewhere.'
        ),
        '500' => array(
            'error' => 'Internal Server Error',
            'details' => 'There was some problem processing your request'
        )
    );
