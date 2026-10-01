<?php
namespace App\Controller\Component;
use Cake\Controller\Component;

class CaptchaComponent extends Component
{
	// Generate CAPTCHA (Numbers or Alphabets)
    private function generateCaptcha(): string
    {
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789'; // Avoid 0, O, I, 1 for clarity
        return substr(str_shuffle($characters), 0, 5); // Generate a 5-character CAPTCHA
    }

    public function getCaptcha()
    {
        $captcha = $this->generateCaptcha();
        $this->request->getSession()->write('captcha_code', $captcha);
        $this->set('captcha', $captcha);
        $this->viewBuilder()->setOption('serialize', ['captcha']);
    }
}
?>