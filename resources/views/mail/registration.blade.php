<!DOCTYPE html>
<html>

<head>
    <title>Verification Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <style type="text/css">
        .linkk:hover {
            background: #01b02e !important;
        }
    </style>
    <div style="max-width:640px; margin:0 auto;">
        <div
            style="/*width:620px;*/background:#F9F9F9; /*padding: 0px 10px;*/ border:1px solid #d9d8d8; border-bottom: none;height: 100px; margin: -9px 0px -13px 0px;">
            <div
                style="float: none; text-align: center; margin-top: 20px; background:url('{{ URL::to('#') }}') repeat center center">
                <img src="{{asset('public/frontend/images/logo.png')}}" width="135" alt="">
            </div>
        </div>
        <div style="max-width:620px; border:1px solid #d9d8d8; margin:0 0; padding:15px; ">

            <div style="display:block; overflow:hidden; width:100%;">

                Dear {{@$data['name']}},
                @if(@$data['type']=="add")
                <p>
                   Your account created successfully.Here are login credentials.
                </p>
                <p><b>Email</b>: {{@$data['email']}}</p>
                <p><b>Password</b>: {{@$data['password']}}</p>
                @else
                <p>
                   Your account email changed successfully.Your new email.
                </p>
                <p><b>Email</b>: {{@$data['email']}}</p>
                @endif

            </div>

            <p style="font-family:Arial; font-size:14px; font-weight:500; color:#363839;margin: 0px 0px 10px 0px;">
                Regards<br>
                Team Vigyapan
            </p>

        </div>
    </div>
</body>

</html>
