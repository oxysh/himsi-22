@component('mail::message')
HIMSI UNAIR FORM FEATURE

Tokenmu adalah
<br>
<h2>{{$token}}</h2>

@component('mail::button', ['url' => route('f.form.show', $token)])
klik disini untuk mengedit form
@endcomponent

Thanks,<br>
ristek@himsiunair.com
@endcomponent
