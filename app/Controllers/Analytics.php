<?php

/**
 * Class Analytics
 * Creates Analytics controller
 * @copyright  2020 Podlibre
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html AGPL3
 * @link       https://castopod.org/
 */

namespace App\Controllers;

use CodeIgniter\Controller;

class Analytics extends Controller
{
    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend Analytics.
     *
     * @var array
     */
    protected $helpers = ['analytics'];

    /**
     * Constructor.
     */
    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        // $this->session = \Config\Services::session();

        set_user_session_deny_list_ip();
        set_user_session_location();
        set_user_session_player();
    }

    // Add one hit to this episode:
    public function hit(
        $podcastId,
        $episodeId,
        $bytesThreshold,
        $fileSize,
        ...$filename
    ) {
        helper('media');

        podcast_hit($podcastId, $episodeId, $bytesThreshold, $fileSize);
        return redirect()->to(media_url(implode('/', $filename)));
    }
}