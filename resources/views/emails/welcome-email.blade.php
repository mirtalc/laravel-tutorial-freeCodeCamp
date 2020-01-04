@component('mail::message')
# Welcome to freeCodeGram

This is a community of fellow developers and we love that you have joined us.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

All the best,<br>
{{ config('app.name') }}
@endcomponent