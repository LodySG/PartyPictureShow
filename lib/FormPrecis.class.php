<?php

/* 
 * 
 * Développé par Dylo
 * 
 */

/**
 * Description of Form
 *
 * @author lodydody
 */

require_once 'lib/Form.php';

class FormPrecis {
    
    public static function userRegisteration($macadress){
       $form = new Form('user_recorder','POST');
       
       $form    ->add('Text','pseudo');
       
       $form    ->add('Hidden','macadress')
                ->value($macadress);
       
       $form    ->add('Submit','submit')
                ->value('Ceci est mon nom');
       
       return $form;
    }
    
    
    public static function imageUpload(){
        $form = new Form('image_uploader','POST');
        
        $form   ->add('File','image')
                ->max_size(4000000)
                ->filter_extensions(array('jpg', 'gif', 'png'));
        
        $form   ->add('Submit', 'submit')
                ->value('Tiens !!!');
        
        return $form;
    }
    
    
    public static function partySetUp(){
        $form = new Form();
        
        return $form;
    }

}
