@extends('layouts.app')

@section('content')
    <div class="container">
        <section>
            <div class="row">
                <router-link class="btn btn-primary" to="/tab1">Tab1</router-link>
                <router-link class="btn btn-primary" to="/tab2">Tab2</router-link>
            </div>
        </section>

        <section>
            {{-- check console, keep alive prevent component from remounting --}} 
            <keep-alive>
                <router-view></router-view>
            </keep-alive>
        </section>
    </div>
@endsection