@component('mail::message')
# Contact

    ## Prenom

    {{ $information['firstname'] }}

    ## Nom

    {{ $information['lastname'] }}

    ## email

    {{ $information['email'] }}

    ## object

    {{ $information['object'] }}

    ## message

    {{ $information['message'] }}
@endcomponent