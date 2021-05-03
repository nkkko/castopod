<?php

namespace Analytics\Config;

use CodeIgniter\Config\BaseConfig;

class Analytics extends BaseConfig
{
    /**
     * Gateway to analytic routes.
     * By default, all analytics routes will be under `/analytics` path
     *
     * @var string
     */
    public $gateway = 'analytics';

    /**
     * --------------------------------------------------------------------
     * Route filters options
     * --------------------------------------------------------------------
     */
    public $routeFilters = [
        'analytics-full-data' => '',
        'analytics-data' => '',
        'analytics-filtered-data' => '',
    ];

    /**
     * get the full audio file url
     *
     * @param string $filename
     * @return string
     */
    public function getAudioFileUrl(string $audioFilePath)
    {
        return base_url($audioFilePath);
    }
}
