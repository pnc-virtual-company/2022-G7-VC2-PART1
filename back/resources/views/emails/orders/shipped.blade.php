@component('mail::message')
dear teacher I would like to ask permission 

@component('mail::table') 

| student     | start date     | end date        | duration    | reason    | leave type      |
|----------------|:---------------|:---------------:|:-----------:|:---------:|------------------
|{{$requested}}|
@component('mail::button', ['url' => 'http://localhost:8080/admin','color' => 'success'])
visit app
@endcomponent


@endcomponent

thank you !
@endcomponent
 

