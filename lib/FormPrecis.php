<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Form
 *
 * @author lodydody
 */
class FormPrecis {
    
    public static function userRegisteration($adressmac){
       $form = new Form($adressmac,'POST');
       $form->add('text','pseudo');
       $form->add('submit','Ceci est mon nom');
       return $form;
    }
    
    public static function imageUpload(){
        $form = new Form('image','POST');
        return $form;
    }
    
    public static function partySetUp(){
        $form = new Form();
        return $form;
    }

}
