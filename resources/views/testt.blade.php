@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="/css/main.css">
@endsection

@section('content')
    <div>
        <div class="container">
            <div class="row mt-3 mb-2">
                <div class="col-md-6">
                    <h2 class="main-color"><strong>Ibrahimi Petrol</strong></h2>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-row">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle rounded-pill bg-main-color" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Qyteti
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Prizren</a>
                                <a class="dropdown-item" href="#">Prishtine</a>
                            </div>
                        </div>

                        <span class="ml-3">
                            Twitter, Inc.
                            1355 Market St, Suite 900
                            San Francisco, CA 94103
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100"  src="/storage/images/f1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"  src="/storage/images/f1.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"  src="/storage/images/f1.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="container mt-4">
            <div class="row mb-4 d-flex justify-content-around">
                <p class="h4 m-0 align-self-center">Derivatet mund ti gjeni ne te gjitha pikat e shitjes</p>
                <button class="btn btn-primary ml-3 rounded-pill bg-main-color">Pikat e Shitjes</button>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <h3 class="mb-3"><strong>Derivate</strong></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam numquam eos eaque doloremque vel amet commodi, architecto dicta quod sint obcaecati nulla ipsa corporis quo excepturi, rerum tempora sunt voluptas.</p>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="/storage/images/fuel.jpg" alt="">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <img class="img-fluid" src="/storage/images/fuel.jpg" alt="">
                </div>
                <div class="col-md-6 align-self-center">
                    <h3 class="mb-3"><strong>Markete</strong></h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam numquam eos eaque doloremque vel amet commodi, architecto dicta quod sint obcaecati nulla ipsa corporis quo excepturi, rerum tempora sunt voluptas.</p>
                </div>
            </div>
    
        </div>

        <footer class="bottom-0 py-3" style="background-color: #343a40;">
            <div class="container d-flex justify-content-center">
                <p class="m-0 text-white">Copyright 2020 Code and Design All Rights Received</p>
            </div>
        </footer>
    </div>
@endsection