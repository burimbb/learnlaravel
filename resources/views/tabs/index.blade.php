@extends('layouts.app')

@section('content')
    <div class="container">
        <tab-list v-cloak>
            <tab-component name="About" :selected="true">
                Hello from about page.
            </tab-component>

            <tab-component name="Help">
                Hello from help page.
            </tab-component>

            <tab-component name="Contact Us">
                Hello from contact us page.
            </tab-component>
        </tab-list>
    </div>
@endsection