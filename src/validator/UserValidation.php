<?php

class UserValidation{
    private $user;
    private $errors = [];
    private $isValid = true;

    public $firstNameResult;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function validate()
    {   
       //tutta la logica per la validazione pero es recomendable crear subprocesos
       //$this->firstNameResult = $this->validateFirstName();
       $result = $this->validateFirstName();
       $this->errors[ 'firstName'] = $result;
       
       if(!$result->isValid){
           $this->isValid = false;
       }
       
       //$key = 'firstName';
       //$this->errors[$key] = $this->validateFirstName();
        
    }
    private function validateFirstName():?ValidationResult //or NULL
    {
        
       $firstName = trim($this->user->getFirstName());
        if(empty($firstName)){
            $validationResult = new ValidationResult('Il nome èobbligatorio',false,$firstName);

        }else{
            $validationResult = new ValidationResult('Il nome è corretto',true,$firstName);

        };
        return $validationResult;
       
    }

     /**
     * foreach($userValidation->getErrors as $error){
     * echo "<li></li>"
     * }
    */

    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * $userValidation->getError('firstName');
     * @var $errorKey Chiave associativamche contiene un validationResult corrispondente
    */
    public function getError($errorKey)
    {
        return $this->errors[$errorKey];
    }

}