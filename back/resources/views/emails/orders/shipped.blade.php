@component('mail::message')
dear teacher I would like to ask permission 

@component('mail::table') 

| student     | start date     | end date        | duration    | reason    | leave type      |
|----------------|:---------------|:---------------:|:-----------:|:---------:|------------------
|{{$user}}| {{$request}}

@component('mail::button', ['url' => 'www.google.com','color' => 'success'])
accept
@endcomponent
@component('mail::button', ['url' => 'www.google.com','color'=>'red'])
Reject 
@endcomponent

@endcomponent

thank you !
@endcomponent
 

