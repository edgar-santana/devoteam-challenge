<?php

namespace Drupal\devoteam_esantana\Form;

use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\Element\EntityAutocomplete;

/**
 * Implements an example form.
 */
class UserSearchForm extends FormBase {
    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'devoteam_search_user_autocomplete_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state){
        $form['username_to_search'] = [
            '#title' => $this->t('Type username'),
            '#type' => 'entity_autocomplete',
            '#target_type' => 'user',
        ];
        
        $form['actions']['#type'] = 'actions';
        
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('Submit'),
            '#button_type' => 'primary',
        ];

        return $form;
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state){
        // Get uid
        $uid = $form_state->getValue('username_to_search');
        // Check is valid uid
        if (!is_numeric($uid)) {
            $form_state->setErrorByName('username_to_search', $this->t('Select valid user.'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state){
        // Get uid
        $uid = $form_state->getValue('username_to_search');
        // Redirect
        $form_state->setRedirect('devoteam_esantana.user_profile', ["uid"=>$uid]);
        return;
    }

}