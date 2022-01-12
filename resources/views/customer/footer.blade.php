<!--footer -->
<div class="container-fluid footer">
    <div class="container">
        <!--back to top link -->
        <div class="col-md-12 section-1 pt-3">
            <a href="#nav">
                <p class="text-center py-2 text-white text-uppercase">BACK TO TOP</p>
            </a>
        </div>
        <!--our services -->
        <div class="row text-white justify-content-between d-flex">
            <div class="col-md-3 py-4">
                <h5 class="pb-3">OUR SERVICES</h5>
                <!--links -->
                <P class="point"><a href="{{ route('cd') }}">Cd</a></p>
                <p class="point"><a href="{{ route('book') }}">Book</a></p>
                <p class="point"><a href="{{ route('game') }}">Game</a></p>
            </div>
            <!--contact us -->
            <div class="col-md-3 py-4">
                <h5 class="pb-3 point"><a href="#contact" style="text-decoration: none; color:white;">CONTACT US</a>
                </h5>
                <P class="point"><i class="fa fa-phone me-1" aria-hidden="true"></i> 01-6698772</p>
                <p class="point"><i class="fa fa-map-marker me-1" aria-hidden="true"></i>Thapathali,
                    Kathmandu<br></p>
                <p class="point"><i class="fa fa-envelope me-1" aria-hidden="true"></i>
                    info@thebritishcollege.edu.np</p>

            </div>
            <!-- social media-->
            <div class="col-md-3 py-4">
                <div>
                    <h5 class="pb-3">SOCIAL MEDIA</h5>
                    <a href="https://www.facebook.com/TheBritishCollege" target="_blank"><span><i
                                class="fab fa-facebook fa-2x "></i></span></a>
                    <a href="https://www.instagram.com/thebritishcollege/" target="_blank"><span><i
                                class="fab fa-instagram fa-2x px-2"></i></span></a>
                    <a href="https://twitter.com/TBritishcollege" target="_blank"><span><i
                                class="fab fa-twitter fa-2x px-2"></i></span></a>
                    <a href="https://www.google.com/maps/place//data=!4m2!3m1!1s0x39eb19b19295555f:0xabfe5f4b310f97de?source=g.page.default"
                        target="_blank"><span><i class="fab fa-google-plus fa-2x"></i></span></a>
                </div>


            </div>
            <!--location -->
            <div class="col-md-3 py-4">
                <h5 class="pb-3 point"><a href="#about" style="text-decoration: none; color:white;">LOCATION</a>
                </h5>
                <div style="width: 100%"><iframe width="100%" height="200" frameborder="0" scrolling="no"
                        marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=british%20college,nepal+(M)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                            href="https://www.gps.ie/car-satnav-gps/">best car gps</a></iframe></div>
            </div>
            <!--Copyright -->
            <div class="col-md-12" style="border-top:1px solid white;">
                <div class="row py-1">
                    <div class="col text-center">
                        <p class="user-select-none mt-3"><i class="far fa-copyright"></i> {{ date('Y') }} Susan
                            Paudel | All Copyrights reserved</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--end footer -->
