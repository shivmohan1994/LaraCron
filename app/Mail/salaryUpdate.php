<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class salaryUpdate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user, $increment, $salary;
    public function __construct($user, $increment, $salary)
    {
        $this->user = $user;
        $this->increment = $increment;
        $this->salary = $salary;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.salaryUpdate')
                    ->with('user',$this->user)
                    ->with('increment', $this->increment)
                    ->with('salary', $this->salary);
    }
}
