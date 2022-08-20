@component('mail::message')
dear teacher I would like to ask permission 


@component('mail::table') 
---------------------------------------
| Name    | Class     | Leave type    | 
|:------- |:----------|:---------------
|{{$name}}|{{$class}} |{{$leave_type}}|
---------------------------------------
@component('mail::button', ['url' => 'www.google.com','color' => 'success'])
accept
@endcomponent
@component('mail::button', ['url' => 'www.google.com','color'=>'red'])
Reject 
@endcomponent

@endcomponent


thank you !
@endcomponent
 

