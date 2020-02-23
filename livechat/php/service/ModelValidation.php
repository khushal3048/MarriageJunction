<?php

class ModelValidation extends Service
{
    private $validation;
    
    public function onRegister()
    {
        parent::onRegister();
        
        // -----
        
        $this->validation = $this->get('validation');
    }
    
    public function validateMessage($message)
    {
        return $this->clearEmpty(array(
        
            'from' => $this->validation->validate($message['from'], array(
            
                'Value is blank'        => new NotBlankValidator(),
                'Value is not a number' => new NumberValidator()
            )),
            
            'to' => $this->validation->validate($message['to'], array(
            
                'Value is blank'        => new NotBlankValidator(),
                'Value is not a number' => new NumberValidator()
            )),
            
            'body' => $this->validation->validate($message['body'], array(
            
                'Value is blank' => new NotBlankValidator(),
            ))
        ));
    }
    
    public function validateUser($user, $checkPassword = true)
    {
        $data = array(
        
            'name' => $this->validation->validate($user['name'], array(
            
                'Value is blank' => new NotBlankValidator()
            )),
            
            'mail' => $this->validation->validate($user['mail'], array(
            
                'Value is blank'              => new NotBlankValidator(),
                'Value is not a valid e-mail' => new MailValidator()
            ))
        );
        
        if($checkPassword)
        {
            $data['password'] = $this->validation->validate($user['password'], array(
            
                'Value is blank'     => new NotBlankValidator(),
                'Value is too short' => new LengthValidator(6)
            ));
        }
        
        return $this->clearEmpty($data);
    }
    
    public function validateConfig($config)
    {
        $errors = array();
        
        return $errors;
    }
    
    public function validateContactData($data)
    {
        return $this->clearEmpty(array(
        
            'name' => $this->validation->validate($data['name'], array(
            
                'Value is blank' => new NotBlankValidator()
            )),
            
            'mail' => $this->validation->validate($data['mail'], array(
            
                'Value is blank'              => new NotBlankValidator(),
                'Value is not a valid e-mail' => new MailValidator()
            )),
            
            'question' => $this->validation->validate($data['question'], array(
            
                'Value is blank'     => new NotBlankValidator(),
                'Value is too short' => new LengthValidator(6)
            ))
        ));
    }
    
    public function validateLoginData($data)
    {
        return $this->clearEmpty(array(
        
            'name' => $this->validation->validate($data['name'], array(
            
                'Value is blank' => new NotBlankValidator()
            )),
            
            'mail' => $this->validation->validate($data['mail'], array(
            
                'Value is blank' => new NotBlankValidator(),
                'Value is not a valid e-mail' => new MailValidator()
            ))
        ));
    }
    
    private function clearEmpty($array)
    {
        // Clear empty entries
        
        $keys = array_keys($array);
        
        for($i = count($array) - 1; $i >= 0; $i--)
        {
            $key = $keys[$i];
            
            if(empty($array[$key]))
            {
                unset($array[$key]);
            }
        }
        
        return $array;
    }
}

?>
