<!DOCTYPE html>
<html>
    <head>
        <title>My Company</title>
    </head>
    <body> 
        @if ($company->logo)
            <div>
                <img src="{{$company->logo}}" width="100">
            </div>
        @endif
        <p>
            Hello {{$company->name}}!
        </p>
        <p>
            The {{$company->name}} company has been registered in the my-company application.
        </p>
        <h5>
            My company wishes you a happy day!
        </h5>
    </body>
</html>
