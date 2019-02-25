<link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">
<center class="wrapper">
    <table class="top-panel center" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="title" width="300">Team Scorpion</td>
            <td class="subject" width="300"><a class="strong" href="#" target="_blank">https://www.teamscorpion.in</a></td>
        </tr>
        <tr>
            <td class="border" colspan="2">&nbsp;</td>
        </tr>
        </tbody>
    </table>

    <div class="spacer">&nbsp;</div>

    <table class="main center" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="column">
                <div class="column-top">&nbsp;</div>
                <table class="content" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td class="padded">
                          <h1>Greeting from TeamScorpion</h1>
                          <p>Hello <strong> {{$user->name}} </strong></p><br/>
                          <p> Your salary has been increased by <strong >{{ $increment }} &#8377;</strong><br/>
                          <p>  Your Total Salary is <strong> {{ $salary}} &#8377; </strong>
                          <p style="text-align:center;"><a href="http://127.0.0.1:8000" class="btn btn-primary">Go Back</a></p>
                          {{-- <p style="text-align:center;">
                            <a href="#" class="strong">Example link</a>
                          </p>
                          <p class="caption">This is a caption text in main email body.</p> --}}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="column-bottom">&nbsp;</div>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="spacer">&nbsp;</div>

    <table class="footer center" width="602" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td class="border" colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td class="signature" width="300">
                <p>
                    With best regards,<br>
                    Team Scorpion<br>
                    +91 (xxxx) xx-xx-xx, Shiv Mohan<br>
                    {{-- <p><a mailto="shivmohan194@gmail.com">get Connected With Us</p> --}}
                    </p>
                <p>
                    Support: <a class="strong" href="mailto:shivmohan194@gmail.com" target="_blank">ShivMohan</a>
                </p>
            </td>
            <td class="subscription" width="300">
                <div class="logo-image">
                    <a href="https://zavoloklom.github.io/material-design-iconic-font/" target="_blank"><img src="https://www.teamscorpion.in/images/1.png" alt="logo-alt" width="100" height="100"></a>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</center>
