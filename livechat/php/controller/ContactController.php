<?php

class ContactController extends Controller
{
    public function contactAction()
    {
        $request    = $this->get('request');
        $validators = $this->get('model_validation');
        
        // Get the input
        
        $name     = $request->postVar('name');
        $mail     = $request->postVar('mail');
        $question = $request->postVar('question');
        
        // Validate the input
        
        $errors = $validators->validateContactData(compact('name', 'mail', 'question'));
        
        if(count($errors) === 0)
        {
            // Send the e-mail
            
            $to      = $this->get('config')->data['appSettings']['contactMail'];
            $subject = 'Contact form question from ' . $name;
            
            $this->get('mailer')->sendMessage($mail, $to, $subject, $question);
            
            // Return a successful response
            
            return $this->json(array('success' => true));
        }
        
        // Return an error response
        
        return $this->json(array('success' => false, 'errors' => $errors));
    }
}

?>
