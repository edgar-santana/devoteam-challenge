<?php

namespace Drupal\devoteam_esantana\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;

/**
 * Defines DevoteamController class.
 */
class DevoteamController extends ControllerBase{

    /**
     * Display user profile.
     */
    public function userProfile(Request $request, $uid){
        // Get user entity
        $user = \Drupal::service('entity_type.manager')->getStorage('user')->load($uid);

        return [
            '#theme' => 'devoteam_esantana',
            '#user' => $user,
        ];
    }

}