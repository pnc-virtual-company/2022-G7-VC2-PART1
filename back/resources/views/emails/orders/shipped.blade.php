@component('mail::message')
dear teacher I would like to ask permission 


@component('mail::table') 
------------------------------------------------
| Name    | Class     | Leave type             | 
|:------- |:----------|:------------------------
|{{$Start_date}}|{{$End_date}} |{{$leave_Type}}|
-----------------------------------------------
@component('mail::button', ['url' => 'www.google.com','color' => 'success'])
accept
@endcomponent
@component('mail::button', ['url' => 'www.google.com','color'=>'red'])
Reject 
@endcomponent

@endcomponent


thank you !
@endcomponent
 

