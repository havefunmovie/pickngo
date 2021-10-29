@component('mail::message')
@if($user['name'])
    <h3>Dear {{$user['name']}}</h3>
@else
    <h3>Dear {{$user['email']}}</h3>
@endif
<br>
<p>Welcome to pick & go</p>
<br>
<p>Your account successfuly registered at {{substr($user['created_at'], 0, 10)}}</p><br>
<p> your email/username is : <b>{{ $user['email'] }}</b></p>
<br>
<p> your passsword is : <b>{{ __('secret-password') }}</b></p>
<br>
<p style="color:red">* please login <a href="#">with click on this link </a>and change your password </p>
@endcomponent
