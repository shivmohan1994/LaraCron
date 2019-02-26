<p align="center" style="font-size:40;font-weight:bold"><img src="/public/img/icon.png"> <b>LaraCron</b></p>

<p align="center">    
<a href="https://github.com/shivmohan1994"><img src="https://cdn2.iconfinder.com/data/icons/social-icons-circular-color/512/github-512.png" height="30px" alt="Github"></a>    
<a href="https://www.linkedin.com/in/shivmohan194/"><img src="http://bigbelly.com/wp-content/uploads/2017/04/linkedin-logo-button.png" height="30px" alt="Linked In"></a>
<a href="https://www.instagram.com/shivmohan_1994/"><img src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-color-shapes-2-free/128/social-instagram-new-circle-512.png" height="30px" alt="Instagram"></a>
<a href="https://plus.google.com/u/0/+ShivMohan94?tab=wX"><img src="https://i1.wp.com/www.vectorico.com/wp-content/uploads/2018/02/Google-Plus-Icon.png?resize=300%2C300" height="30px" alt="Google+"></a>
</p>

## LaraCron 

LaraCron is a basic laravel project having cool features of laravel using MySql Database.LaraCron is just a simple mini project having following features:-

    
- [Laravel Installation].
- [Laravel Authentication].
- [Verify email via your Gmail Account].
- [Laravel Cron Job].
- [Send Cusom Mail to your Gmail].

## Installation

Run the below command to create your laravel project-

```composer create-project --prefer-dist laravel/laravel "Your Project Name"```

Above command will create your project with latest laravel configuration. you can check your project configuration in your ```Composer.json``` file.

Go to the terminal, enter in your project folder using ```cd "project path"``` command now run your project using below command 

```php artisan serve```

It will give following result in your terminal- 
Laravel development server started: <http://127.0.0.1:8000>
Go in your browser and run your project using http://127.0.0.1:8000 this url. A laravel Welcome page will be appear.

## Database Configuration

Let's set up your database configuration. Create a database for your project in your <b>MySql</b> database, then go to your project folder find ```.env``` file. Fill following fields for your database configuration
```
DB_DATABASE="Your database name"
DB_USERNAME=""
DB_PASSWORD=""
```
you can set your project name in 
```
APP_NAME="Your project name"
```
## Making Laravel Auth

Let's create Laravel authentication for your project, run the following command to create <b>Laravel Auth</b>.

```php artisan make:auth```

Once command run successfully you can check your file configuration, In App > Http > Controllers there will be an <b>Auth</b> folder added. that means your laravel Authentication is done. Again run your project, you can see in your browser two new links will appeared LOGIN, REGISTRATION.

Laravel provides 2 migrations table for laravel authentication, let's migrate it.
Go in your terminal run the below command-
``` php artisan migrate```
Now check your database 2 new tables will be generated.


## Setup Gmail Configuration

Again Go in Your .env file and set your Mail Configuration Like below- 

```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=xxxxxxxxx@gmail.com
MAIL_PASSWORD=xxxxxxxxxx
MAIL_ENCRYPTION=ssl
```
Note that Mail password will be your <b>Gmail App</b> password. To find your Gmail App password, go to "https://myaccount.google.com/", Go in Security tab, there will be a App Password field, go for that, Select the app as mail and device as Window Computer, then generate. Congrat's, this will be your Gmail App Password, put it into your .env 
```MAIL_PASSWORD=xxxxxxxxxx``` field.
Now your Gmail set up is Done!!.

## Email Verification

Let's go for email verification-
Go to your User Model (```User.php```) File.
Just Use-
``` use Illuminate\Contracts\Auth\MustVerifyEmail; ```
and implements <b>MustVerifyEmail</b>
your code will look like some thing-

```class User extends Authenticatable implements MustVerifyEmail
{
//
//
}
```
Well, Now Go for your Routing,
Go in your <b>web.php</b> file. Provide Auth route verification as true,and in your basic Home page just provide middleware as verified. So it will look's like something-
```
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
```
Let's Run your Project-
Go for registration and register a User with information.it will redirected to ```http://127.0.0.1:8000/email/verify``` URL. So, Check your gmail inbox and verify email.
Check your Database your user will be added and in email.

## Add Cron Job 

In this project we are scheduling the cron for salary of a User. Salary will be increased at a Cron Specific time. So let's do that-
Add one more field in your User table. go to User Model and Add "Salary" Field. It will look's like this.

```
protected $fillable = [
        'name', 'email', 'password', 'salary',
    ];
```
Now Add salary field in your "User" migration table File, it will located at App > database > migrations >create_users_table. 

Now Go to your database and drop User table.
Now it's time to migrate your database. Run Command ``` php artisan migrate ```

your Database is Set...

Let's create Cron Job For Salary, Run the following command to create Cron job

``` php artisan make:command cronUpdate ```

it will generate a <b>cronUpdate.php</b> file in command folder.

Initially two things are require to plane Cron Job
1-Signature
2-Description
Provide it.

Your Core Cron Function for updating the salary will be add in handle Function.
Initially I'm going for basic so just add a constant value in salary you can make it dynamic. It will looks like this-

```
 public function handle()
    {
      $data = User::all();
      $increment= 100;
      foreach ($data as $row) {
        $row->salary+=$increment;
        $row->save();
      }
    }
```
Note down we are also going for sending a notification mail to user, to Notify them for salary updation so It will be discussed also, let it be-

Next thing is, To provide, salary Updation Time-
Go to your <b>Kernal.php</b> file in the console folder.
Go to Schedule function-

```
 protected function schedule(Schedule $schedule)
    {
            $schedule->command('cron:update')
                      ->everyMinute();  
        // $schedule->command('inspire')
        //          ->hourly();
    }
```
Provide what time you want to update salary, such as hourly, everyMinute, or monthly. Here I'm using everyMinute(), just for test purpose.

your cron Job is Completed To check it Just Run the Below command

``` php artisan schedule:run ```

Now Check your Database, User salary will be updated with 100 value.

## Custom Send Mail

Let's Send a custom updated Salary Mail to user.

Run the Below Command-

```php artisan make:mail salaryUpdate```

It will create a Mail folder in your project with a salaryUpdate.php file.

Now Let's create a Mail Configuration, To set it just follow the steps-

create a UserCustom Folder inside your App.
then create a <b>SendMail.php</b> file.

We are sending Mail At Salary Update, So go to your cronUpdate.php File.

we are sending mail using SendMail class and provides some Data, such as User Data(For to  Email and Name),  Salary , Increment. Something look Like this in your handle file..

```
public function handle()
    {
      $data = User::all();
      $increment= 100;
      foreach ($data as $row) {
        $row->salary+=$increment;
        $row->save();
        // Log::info($row);
        $SendMail = new SendMail();
        $SendMail->updateCronSalary($row, $increment, $row->salary);
      }

    }
```
Note Down We are sending data using updateCronSalary() function. So let it define in your SendMail.php file.
It will be looks like this-

```
<?php
namespace App\UserCustom;

use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\salaryUpdate;

class SendMail{
    public function updateCronSalary($user, $increment, $salary){
        Mail::to($user->email)->send(new salaryUpdate($user, $increment, $salary));
    }
}
```
Next To Send Mail, Mail file should be intracted, So Go to Your <b>Mail > salaryUpdate.php</b> file.
Define your Sending values as protected then send it via __construct().

Now catch the __construct().

value in your build function. So this file will be looks like this-

```
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

```

Note Down We are Sending a Custom Mail so it's time to create a mail template for this. Go to your resources > views 
Create mail folder and create a blade file.

```salaryUpdate.blade.php```

and put your send mail value variable such as-

```
<h1>Greeting from TeamScorpion</h1>
<p>Hello <strong> {{$user->name}} </strong></p><br/>
<p> Your salary has been increased by <strong >{{ $increment }} &#8377;</strong><br/>
<p>  Your Total Salary is <strong> {{ $salary}} &#8377; </strong>
<p style="text-align:center;"><a href="http://127.0.0.1:8000" class="btn btn-primary">Go Back</a></p>
```
## All Done

Let's Run. login your portal in browser.
go to terminal-> Run Schedule Command ```php artisan schedule:run ```
Now Check your Mail Inbox.

<b>========================== Happy Coding ============================<b>

















