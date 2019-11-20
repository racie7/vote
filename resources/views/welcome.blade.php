@extends('layouts.app')

@section('content')
    

    <section id="intro">
    <div class="container">
        <div class="span12 text-center">
            <p style="color:black; font-size:25px;"><strong>KENYA SCHOOL OF GOVERNMENT</strong> <br> </p>
            <p style="color:black; font-size:18px;">Empowering the Public Service</p>
        </div>
    </div>      
        <div class="container">
            <div class="span12 text-center">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                   <marquee><strong style="color:black">WELCOME TO QUARTER ONE NOMINATIONS TOWARDS END OF YEAR AWARDS.</strong></marquee>
                </div>
            </div>
            <div class="row">
                <div class="span6" >
                    <h3><strong> Introduction</strong></h3>
                    <p class="lead text-justify" style="color:#000000;font-size:20px;">
                        The Kenya School of Government, whose mandate is providing quality training, research, consultancy and advisory
                        services to Government has recognized the need to reward
                        <span id="dots">...</span>
                        <span id="more" style="display: none;">
							exemplary service in line with the Public Service Commission guidelines, the guidelines will provide a
                            framework for the implementation of a Performance Recognition system.

						</span>
                        <button class="btn btn-success" onclick="myFunction()" id="myBtn">Read more</button>
                    </p>
                </div>

                <div class="span6">

                    <div id="myCarousel" class="carousel slide">
                        <div class="item active">
                            <img src="{{ asset('img/pic5.jpg') }}" alt=" ">
                            <div class="carousel-caption">
                                <p>Director General, Professor Ludeki Chweya, presenting an award to a member of staff, Ms. Dorlin Mukami.
                                </p>
                            </div>
                        </div>
                       <!-- <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                            <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item">
                                <img src="{{ asset('img/pic6.png') }}" alt="">

                            </div>
                            <div class="item">
                                <img src="{{ asset('img/pic5.png') }}" alt="">

                            </div>
                            <div class="item active">
                                <img src="{{ asset('img/pic1.jpg') }}" alt="">

                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> -->
                    </div>

{{--                    <div class="group section-wrap upper" id="upper">--}}
{{--                        <div class="section-2 group">--}}
{{--                            <ul id="images">--}}
{{--                                <img src="{{ asset('assets/img/picha.jpg') }}" alt=""--}}
{{--                                     style="width:500px;height:350px;"/>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <!-- /.section-2 -->--}}
{{--                    </div>--}}

                </div>
            </div>
            <div class="row">


                <div class="span6">

                    <div id="myCarousels" class="carousel slide">
                        <div class="item">
                            <img src="{{ asset('img/rationale.jpg') }}" alt="">
                            <div class="carousel-caption">
                                <p>Director Finance and Administration, Professor Nura Mohamed, presenting an award to a member of staff, Ms Eunice Wangu.
                                    </p>
                            </div>
                        </div>
                       <!-- <ol class="carousel-indicators">
                            <li data-target="#myCarousels" data-slide-to="0" class=""></li>
                            <li data-target="#myCarousels" data-slide-to="1" class=""></li>
                            <li data-target="#myCarousels" data-slide-to="2" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item">
                                <img src="{{ asset('img/rationale.JPG') }}" alt="">

                            </div>
                            <div class="item">
                                <img src="{{ asset('img/pic1.png') }}" alt="">

                            </div>
                            <div class="item active">
                                <img src="{{ asset('img/pic6.png') }}" alt="">

                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> -->
                    </div>

                    {{--                    <div class="group section-wrap upper" id="upper">--}}
                        {{--                        <div class="section-2 group">--}}
                            {{--                            <ul id="images">--}}
                                {{--                                <img src="{{ asset('assets/img/picha.jpg') }}" alt=""--}}
                                                                         {{--                                     style="width:500px;height:350px;"/>--}}
                                {{--                            </ul>--}}
                            {{--                        </div>--}}
                        {{--                        <!-- /.section-2 -->--}}
                        {{--                    </div>--}}

                </div>
                <div class="span6" >
                    <h3><strong> Rationale</strong></h3>
                    <p class="lead text-justify" style="color:#000000;font-size:20px;">
                        These awards seek to entrench recognition for outstanding performance, a culture that will assist employees
                        appreciate the concept to go beyond the call of duty to achieve extraordinary results.
                        The School has introduced six criteria for consideration for award.
                        <span id="dotsx">...</span>
                        <span id="morex" style="display: none;">
							The award will recognize high performance and improve employee morale and principles of celebration as well as
                            gratitude through the various awards and recognition program.

						</span>
                        <button class="btn btn-success" onclick="myFunctionx()" id="myBton">Read more</button>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="span6" >
                    <h3><strong> Scope</strong></h3>
                    <p class="lead text-justify" style="color:#000000;font-size:20px;">
                        The award is administered to the following staff cadre:
                        <ol style="color: #0e0e0e; font-size:18px;">
                        <li>Permanent and Pensionable employees serving at KSG 4-14.</li>
                        <br>
                        <li>Employees serving on, at least one year contract.</li>
                    </ul>
                    </p>
                </div>

                <div class="span6">

                    <div id="myCarousel" class="carousel slide">
                        <div class="item">
                            <img src="{{ asset('img/scope.jpg') }}" alt="">
                            <div class="carousel-caption">
                                <p>Mombasa Campus Director, Dr. Tom Wanyama, presenting an award to a member of staff, Mr. Gordon Oduor.</p>
                            </div>
                        </div>
                       <!-- <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                            <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item">
                                <img src="{{ asset('img/pic1.jpg') }}" alt="">

                            </div>
                            <div class="item">
                                <img src="{{ asset('img/pic5.png') }}" alt="">

                            </div>
                            <div class="item active">
                                <img src="{{ asset('img/pic6.png') }}" alt="">

                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> -->
                    </div>

                    {{--                    <div class="group section-wrap upper" id="upper">--}}
                        {{--                        <div class="section-2 group">--}}
                            {{--                            <ul id="images">--}}
                                {{--                                <img src="{{ asset('assets/img/picha.jpg') }}" alt=""--}}
                                                                         {{--                                     style="width:500px;height:350px;"/>--}}
                                {{--                            </ul>--}}
                            {{--                        </div>--}}
                        {{--                        <!-- /.section-2 -->--}}
                        {{--                    </div>--}}

                </div>
            </div>
        </div>

    </section>
    <div class="container">
    <h3 class="text-center" style="color:#7F622C"><strong>You will follow the following steps to do your nominations:</strong></h3>
    <br>
    <ol style="color:black; font-size:18px">
        <li> Register to participate in the nominations.</li> <br>
        <li> Nominate an individual.</li> <br>
        <li> Nominate a team.</li> <br>
        <li> Submit your nominations.</li> <br>
    </ol>
    <br> <br>
    <div class="row">
        <div class="span12">
            <div class="solid_line">
            </div>
        </div>
    </div>

<!-- blank divider -->
    <div class="row">
        <div class="span12">
            <div class="blank10"></div>
            </div>
        </div>
    </div>    

    <h4 class="text-center"><strong>AWARD CRITERIA</strong></h4>
    <section id="maincontent">
        <p class="text-center" style="color:#000000">
            <strong><h4 class="text-center">The Criteria comprise of the following six Thematic Areas</h4></strong>
        </p>
        <div class="container">
            <div class="row">
                <div class="span4">
                    <div class="well">
                        <div class="centered e_bounce">
                            <i class="icon-bg-light icon-circled icon-user icon-3x active"></i>
                            <h6 style="color:#473b00"><strong>Outstanding Customer Service</strong></h6>
                            <p style="color:#000000">
                            Winners in this category must have demonstrated and sustained outstanding performance that consistently exceeds
                            goals and job expectations in quantity and quality, resulting in significant achievement or significant
                            impact at the School. Job performance is also evaluated.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="well">
                        <div class="centered e_bounce">
                            <i class="icon-bg-light icon-circled icon-rocket icon-3x active"></i>
                            <h6 style="color:#473b00"><strong>Creativity and Innovation</strong></h6>
                            <p style="color:#000000">
                            Winners in this category must have participated in a one-time innovation or creation resulting in a significant impact on process,
                            work flow, or department and/or unit function. This may be either reflected in efficiency
                            gains, increased work product or morale improvements in the Campus.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="well">
                        <div class="centered e_bounce">
                            <i class="icon-bg-light icon-circled icon-group icon-3x active"></i>
                            <h6 style="color:#473b00"><strong>Teamwork</strong></h6>
                            <p style="color:#000000">
                            This category recognizes an employee acting as an exceptionally effective and cooperative member of a team dedicated
                            to making positive change. Such a member should have demonstrated superior interactions and a positive influence on the entire KSG community.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="well">
                        <div class="centered e_bounce">
                            <i class="icon-bg-light icon-circled icon-heart icon-3x active"></i>
                            <h6 style="color:#473b00"><strong>Empathy and Support for others</strong></h6>
                            <p style="color:#000000">
                            This category recognizes an employee who creates time to support colleagues to deliver results through hand-holding,
                            mentoring and coaching. Such an employee should possess the quality of supporting colleagues during difficult times.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="well">
                        <div class="centered e_bounce">
                            <i class="icon-bg-light icon-circled icon-comment icon-3x active"></i>
                            <h6 style="color:#473b00"><strong>Leadership Abilities </strong></h6>
                            <p style="color:#000000">
                            A winner in this category needs to demonstrate extraordinary leadership resulting in the accomplishment of
                            significant goals or objectives that serve the good of Kenya School of Government.
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="span4">
                    <div class="well">
                        <div class="centered e_bounce">
                            <i class="icon-bg-light icon-circled icon-globe icon-3x active"></i>
                            <h6 style="color:#473b00"><strong>Community Involvement</strong></h6>
                            <p style="color:#000000">
                            This category bestows honour to a member of a KSG member of staff who exemplifies community service in a capacity outside
                            of their usual work assignment. To qualify, one needs to demonstrate personal investment and contributions made in local communities, as well as
                            providing inspiration as a role model to encourage others to also engage in community
                            service.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="span12">
                    <div class="solid_line">
                    </div>
                </div>
            </div>

            <!-- blank divider -->
            <div class="row">
                <div class="span12">
                    <div class="blank10"></div>
                </div>
            </div>
        </div>
        <!--Footer
       ================================================== -->
        <div class="container">
            <footer class="footer text-center">
                <div class="row">
                    <div class="span12">
                        <div class="widget">
                            <div class="footerlogo"> 
                                <address style="color:white">
                                    <strong>Kenya School of Government</strong><br>
                                    P.O. Box 23030-00604,<br>
                                    Lower Kabete, Nairobi-Kenya<br>
                                    Telephone: +254-20-4015000,
                                    0727496698
                                </address>
                                <p style="color:white">
                                    <strong>Email:</strong>
                                    directorgeneral@ksg.ac.ke, 
                                    info@ksg.ac.ke<br>
                                    <strong>Twitter:</strong> @KSGKenya <br>
                                    <strong>Facebook:</strong> Kenya School of Government<br>
                                    <strong>Website:</strong> www.ksg.ac.ke </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <div class="footer-copyright text-center py-8">© 2019, Kenya School of Government</div>
    </section>
    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
        </script>

        <script>
        function myFunctionx() {
            var dots = document.getElementById("dotsx");
            var moreText = document.getElementById("morex");
            var btnTexts = document.getElementById("myBton");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnTexts.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnTexts.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
    </script>

@endsection
