@component('mail::message')
Thank you for your message

Name: {{$data['name']}}
<br>
Surname: {{$data['surname']}}
<br>
E-mail: {{$data['email']}}
<br>
Message: {{$data['text']}}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
