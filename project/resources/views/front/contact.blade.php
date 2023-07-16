@extends('layouts.front.app')

@section('css')
   
@endsection


@section('og') 
    <!--
        El Open Graph Protocol es un método simple que nos permite incluir meta información en nuestra página web y así convertirla en un objeto Social Graph, una vez siendo un objeto puede interactuar con otros objetos Social Graph como el share de Google+ o el like de Facebook de modo correcto.
    -->
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection
 

@section('content')

    <div class="inner-page-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb-area">
                        <h1>Contact With US</h1>
                        <ul>
                            <li><a href="#">Home</a> /</li>
                            <li>Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Us Page Area Start Here -->
    <div class="contact-us-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                        <div class="contact-us-left">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="google-map-area">
                                        <div id="map" style="width:100%; height:395px;"></div>
                                    </div>
                                </div>
                            </div>
                            {!! $contact->description !!}
                            <h2>Send Us Message</h2>
                            <div class="row">
                                <div class="contact-form">
                                    <form id="contact-form">
                                        <fieldset>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Name*" class="form-control" id="form-name" data-error="Name field is required" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="email" placeholder="Email*" class="form-control" id="form-email" data-error="Email field is required" required>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <textarea placeholder="Message*" class="textarea form-control" id="form-message" rows="8" cols="20" data-error="Message field is required" required></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn-send-message">Send Message</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class='form-response'></div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="contact-us-right">
                            <!-- <h2 class="title-sidebar">Contact Info</h2> -->
                            @if(isset($contact->cover))
                                <img  id="main-image" class="img-responsive"
                                     src="{{ asset("storage/$contact->cover") }}?w=400"
                                     alt="{{ $contact->name_proprietary }}">
                            @endif 

                            <h5 class="title-sidebar">{{ $contact->name_proprietary }}</h5>
                            <p>Representante Legal de {{ $contact->name_enterprise }}</p>  


                            <ul>
                                <li class="con-address">{{ $contact->address}}</li>
                                <li class="con-envelope">{{ $contact->e_mail}}</li>
                                <li class="con-phone">
                                        {{ $contact->telephone_number_1}}
                                    <br> {{ $contact->telephone_number_2}}
                                    <br> {{ $contact->telephone_number_3}}
                                </li>
                                <!-- <li class="con-fax">+ 123 45678910</li> -->
                            </ul>                            
                        </div>
                        
                        <ul> 
                            <li style="display: inline-block;
      margin-right: 5px;">
                                <a href="{{ $contact->profile_facebook}}" style="width: 32px;
                                  line-height: 32px;
                                  border-radius: 50%;
                                  height: 32px;
                                  border: 1px solid #333333;
                                  display: block;
                                  text-align: center;
                                  background: transparent;">
                                    <i class="fa fa-facebook" aria-hidden="true" style="color: #333333;
                                      -webkit-transition: all 0.5s ease-out;
                                      -moz-transition: all 0.5s ease-out;
                                      -ms-transition: all 0.5s ease-out;
                                      -o-transition: all 0.5s ease-out;
                                      transition: all 0.5s ease-out;"></i>
                                </a>
                            </li>
                            <li style="display: inline-block;
      margin-right: 5px;">
                                <a href="{{ $contact->profile_twitter}}" style="width: 32px;
                                  line-height: 32px;
                                  border-radius: 50%;
                                  height: 32px;
                                  border: 1px solid #333333;
                                  display: block;
                                  text-align: center;
                                  background: transparent;">
                                    <i class="fa fa-twitter" aria-hidden="true" style="color: #333333;
                                      -webkit-transition: all 0.5s ease-out;
                                      -moz-transition: all 0.5s ease-out;
                                      -ms-transition: all 0.5s ease-out;
                                      -o-transition: all 0.5s ease-out;
                                      transition: all 0.5s ease-out;"></i>
                                </a>
                            </li>
                            <li style="display: inline-block;
      margin-right: 5px;">
                                <a href="{{ $contact->profile_youtube}}" style="width: 32px;
                                  line-height: 32px;
                                  border-radius: 50%;
                                  height: 32px;
                                  border: 1px solid #333333;
                                  display: block;
                                  text-align: center;
                                  background: transparent;">
                                    <i class="fa fa-youtube" aria-hidden="true" style="color: #333333;
                                      -webkit-transition: all 0.5s ease-out;
                                      -moz-transition: all 0.5s ease-out;
                                      -ms-transition: all 0.5s ease-out;
                                      -o-transition: all 0.5s ease-out;
                                      transition: all 0.5s ease-out;"></i>
                                </a>
                            </li>
                            <li style="display: inline-block;
      margin-right: 5px;">
                                <a href="{{ $contact->profile_mercadolibre}}" style="width: 32px;
                                  line-height: 32px;
                                  border-radius: 50%;
                                  height: 32px;
                                  border: 1px solid #333333;
                                  display: block;
                                  text-align: center;
                                  background: transparent;">
                                    <i class="fa fa-shopping-cart" aria-hidden="true" style="color: #333333;
                                      -webkit-transition: all 0.5s ease-out;
                                      -moz-transition: all 0.5s ease-out;
                                      -ms-transition: all 0.5s ease-out;
                                      -o-transition: all 0.5s ease-out;
                                      transition: all 0.5s ease-out;"></i>
                                </a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Us Page Area End Here -->
    
@endsection



@section('js')
        
@endsection