<?xml version="1.0" encoding="UTF-8" ?>
<data>
    <lead>
        <key>{{ $credentials['key'] }}</key>
        <title>{{ $request->customer->title }}</title>
        <firstname>{{ $request->customer->firstName }}</firstname>
        <lastname>{{ $request->customer->lastName }}</lastname>
        @if(isset($request->getCurrentAddress()->houseName))
            <towncity>{{ $request->getCurrentAddress()->houseName }}</towncity>
        @endif
        @if(isset($request->getCurrentAddress()->houseNumber))
            <postcode>{{ $request->getCurrentAddress()->houseNumber }}</postcode>
        @endif
        <data1>{{ (int)$request->application->loanAmount }}</data1>
        <data2>{{ $request->application->loanTerm }}</data2>
        <data3>{{ $request->application->purpose }}</data3>
        <data25>{{ $request->guarantor->title }}</data25>
        <data26>{{ $request->guarantor->firstName }}</data26>
    </lead>
</data>
