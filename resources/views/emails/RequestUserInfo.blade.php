@component('mail::message')
<h3>Information Request</h3>
<hr>
<br>
@if($user['name'])
    <h3>Dear {{$user['name']}}</h3>
@else
    <h3>Dear {{$user['email']}}</h3>
@endif
<br>

<p><b>One of our agent needs your information</b></p><br>

<p> Agent Name : <b>{{ $agent['name'] }} {{ $agent['family'] }}</b></p>
<p> Address : <b>{{ $agent['address'] }}, {{ $agent['city'] }}, {{ $agent['province'] }}, Canada, {{ $agent['postal'] }}</b></p>
<p> Phone : <b>{{ $agent['mobile'] }}</b></p>
<br>
<p>if you do <b>not</b> want to give access to our agent Please don't replay to this email</p>
<br>
    <a href="http://127.0.0.1:8000/giveAccess/{{ $agent['id'] }}&{{ $user['id'] }}" role="button" style="background-color: #2b7ae2; border: 1px solid #236bc9;color: white;border-radius: 5px;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Give Access</a>
@endcomponent