<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About CI View</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
            </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
            </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
            </script>
    </head>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        .w-75 {
            border-radius: 8px;
        }

        canvas {
            display: block;
            margin: auto;

        }

        .card-block .btn-outline-primary {
            width: 100%;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            bottom: 0;
            left: 0;
            position: absolute;
        }

        .card {
            margin: 20px 0;
        }

        /* Flip Cards CSS */
        .card-container {
            perspective: 700px;
        }

        .card-flip {
            position: relative;
            width: 100%;
            transform-style: preserve-3d;
            height: auto;
            transition: all 0.5s ease-out;
            background: white;
            border: none;
        }

        .card-flip div {
            backface-visibility: hidden;
            transform-style: preserve-3d;
            height: 100%;
            width: 100%;
            border: none;
        }

        .card-flip .front {
            position: relative;
            z-index: 1;
        }

        .card-flip .back {
            position: relative;
            z-index: 0;
            transform: rotateY(-180deg);
        }

        .card-container:hover .card-flip {
            transform: rotateY(180deg);
        }


        #carousel .carousel-item.boat {
            background-image: url("https://picsum.photos/1200/600/?image=1082");
        }

        #carousel .carousel-item.sea {
            background-image: url("https://picsum.photos/1200/600/?image=1050");
        }

        #carousel .carousel-item.river {
            background-image: url("https://picsum.photos/1200/600/?image=1015");
        }

        #carousel .carousel-item.talab {
            background-image: url("https://picsum.photos/1200/600/?image=1016");
        }

        #carousel .carousel-item.nala {
            background-image: url("https://picsum.photos/1200/600/?image=1001");
        }

        #carousel .carousel-item {
            height: 70vh;
            width: 100%;
            min-height: 350px;
            background: no-repeat center center scroll;
            background-size: cover;
        }

        #carousel .carousel-inner .carousel-item {
            transition: -webkit-transform 2s ease;
            transition: transform 2s ease;
            transition: transform 2s ease, -webkit-transform 2s ease;
        }

        #carousel .carousel-item .caption {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 40px;
            color: white;
            animation-duration: 1s;
            animation-delay: 2s;
        }

        #carousel .caption h2 {
            animation-duration: 1s;
            animation-delay: 2s;
        }

        #carousel .caption p {
            animation-duration: 1s;
            animation-delay: 2.2s;
        }

        #carousel .caption a {
            animation-duration: 1s;
            animation-delay: 2.4s;
        }

        /* Button */
        .delicious-btn {
            display: inline-block;
            min-width: 160px;
            height: 60px;
            color: #ffffff;
            border: none;
            border-left: 3px solid #1c8314;
            border-radius: 0;
            padding: 0 30px;
            font-size: 16px;
            line-height: 58px;
            font-weight: 600;
            -webkit-transition-duration: 500ms;
            transition-duration: 500ms;
            text-transform: capitalize;
            background-color: #40ba37;
        }

        .delicious-btn.active,
        .delicious-btn:hover,
        .delicious-btn:focus {
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
            background-color: #1c8314;
            border-color: #40ba37;
        }

    </style>

    <body>
        <?php
	include_once "header.php";
?>
        <div class="">
            <div id="carousel" class="carousel slide hero-slides" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li class="active" data-target="#carousel" data-slide-to="0"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                    <li data-target="#carousel" data-slide-to="3"></li>
                    <li data-target="#carousel" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active boat">
                        <div class="container h-100 d-none d-md-block">
                            <div class="row align-items-center h-100">
                                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                    <div class="caption animated fadeIn">
                                        <h2 class="animated fadeInLeft">Boat Excursions</h2>
                                        <p class="animated fadeInRight">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit.
                                            Cras tristique nisl vitae luctus sollicitudin. Fusce consectetur sem eget
                                            dui tristique,
                                            ac posuere arcu varius.</p>
                                        <a class="animated fadeInUp btn delicious-btn" href="#">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item sea">
                        <div class="container h-100 d-none d-md-block">
                            <div class="row align-items-center h-100">
                                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                    <div class="caption animated fadeIn">
                                        <h2 class="animated fadeInLeft">Discover the canyon by the sea</h2>
                                        <p class="animated fadeInRight">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit.
                                            Cras tristique nisl vitae luctus sollicitudin. Fusce consectetur sem eget
                                            dui tristique,
                                            ac posuere arcu varius.</p>
                                        <a class="animated fadeInUp btn delicious-btn" href="#">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item river">
                        <div class="container h-100 d-none d-md-block">
                            <div class="row align-items-center h-100">
                                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                    <div class="caption animated fadeIn">
                                        <h2 class="animated fadeInLeft">Explore the river valley</h2>
                                        <p class="animated fadeInRight">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit.
                                            Cras tristique nisl vitae luctus sollicitudin. Fusce consectetur sem eget
                                            dui tristique,
                                            ac posuere arcu varius.</p>
                                        <a class="animated fadeInUp btn delicious-btn" href="#">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item talab">
                        <div class="container h-100 d-none d-md-block">
                            <div class="row align-items-center h-100">
                                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                    <div class="caption animated fadeIn">
                                        <h2 class="animated fadeInLeft">Explore the river valley</h2>
                                        <p class="animated fadeInRight">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit.
                                            Cras tristique nisl vitae luctus sollicitudin. Fusce consectetur sem eget
                                            dui tristique,
                                            ac posuere arcu varius.</p>
                                        <a class="animated fadeInUp btn delicious-btn" href="#">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item nala">
                        <div class="container h-100 d-none d-md-block">
                            <div class="row align-items-center h-100">
                                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                                    <div class="caption animated fadeIn">
                                        <h2 class="animated fadeInLeft">Explore the river valley</h2>
                                        <p class="animated fadeInRight">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit.
                                            Cras tristique nisl vitae luctus sollicitudin. Fusce consectetur sem eget
                                            dui tristique,
                                            ac posuere arcu varius.</p>
                                        <a class="animated fadeInUp btn delicious-btn" href="#">Learn more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <div class="container">
            <canvas id="myCanvas"></canvas>
        </div>
        <!-- Visit https://codepen.io/nicolaskadis/full/brQEOd/ for the latest, no js version! -->
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 card-container">
                    <div class="card card-flip">
                        <div class="front card-block">
                            <!-- To add FontAwesome Icons use Unicode characters and to set size use font-size instead of fa-*x because when calculating the height (see js), the size of the icon is not calculated if using classes -->




                            <img class="w-75"
                                src="https://thumbs.dreamstime.com/b/happy-female-startup-employees-office-doorway-portrait-standing-laptop-smiling-executive-94522131.jpg">



                            <h6 class="card-subtitle text-muted">Front Sub-title</h6>
                            <p class="card-text">Front Text</p>
                        </div>
                        <div class="back card-block">
                            <p>
                                Some example text<br> to
                                <br> increase
                                <br> card
                                <br> height
                                <br> to
                                <br> something
                                <br> long
                            </p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 card-container">
                    <div class="card card-flip">
                        <div class="front card-block">


                            <img class="w-75"
                                src="https://images.unsplash.com/photo-1534109165916-7878ad66d5eb?ixid=MXwxMjA3fDB8MHxzZWFyY2h8N3x8Y2VsZWJyaXR5JTIwZ2lybHxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80">
                            <h6 class="card-subtitle text-muted">Front Sub-title</h6>
                            <p class="card-text">Front Text</p>
                        </div>
                        <div class="back card-block">
                            <p>Some example short text</p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 card-container">
                    <div class="card card-flip">
                        <div class="front card-block">


                            <img class="w-75"
                                src="https://i.pinimg.com/originals/41/d0/5e/41d05edc5a5a191268ecde450da69dab.jpg">
                            <h6 class="card-subtitle text-muted">Front Sub-title</h6>
                            <p class="card-text">Front Text</p>
                        </div>
                        <div class="back card-block">
                            <p>Some example text</p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 card-container">
                    <div class="card card-flip">
                        <div class="front card-block">


                            <img class="w-75"
                                src="https://i.pinimg.com/originals/e3/b4/ec/e3b4ec716a6c15dc094aee32c41469dd.jpg">
                            <h6 class="card-subtitle text-muted">Front Sub-title</h6>
                            <p class="card-text">Front Text</p>
                        </div>
                        <div class="back card-block">
                            <p>
                                Some example text<br> to
                                <br> increase
                                <br> card
                                <br> height
                                <br> to
                                <br> something
                                <br> long
                            </p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 card-container">
                    <div class="card card-flip">
                        <div class="front card-block">


                            <img class="w-75"
                                src="https://i.pinimg.com/originals/cb/fe/23/cbfe2397906886b4da3195d274d05537.jpg">
                            <h6 class="card-subtitle text-muted">Front Sub-title</h6>
                            <p class="card-text">Front Text</p>
                        </div>
                        <div class="back card-block">
                            <p>Some example short text</p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 card-container">
                    <div class="card card-flip">
                        <div class="front card-block">


                            <img class="w-75"
                                src="https://c8.alamy.com/comp/D5AKXW/vertical-shot-of-a-female-boss-and-her-pretty-employee-D5AKXW.jpg">
                            <h6 class="card-subtitle text-muted">Front Sub-title</h6>
                            <p class="card-text">Front Text</p>
                        </div>
                        <div class="back card-block">
                            <p>Some example text</p>
                            <a href="#" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once "footer.php"; ?>

</html>
<script>


    $(document).ready(function () {
        var front = document.getElementsByClassName("front");
        var back = document.getElementsByClassName("back");

        var highest = 0;
        var absoluteSide = "";

        for (var i = 0; i < front.length; i++) {
            if (front[i].offsetHeight > back[i].offsetHeight) {
                if (front[i].offsetHeight > highest) {
                    highest = front[i].offsetHeight;
                    absoluteSide = ".front";
                }
            } else if (back[i].offsetHeight > highest) {
                highest = back[i].offsetHeight;
                absoluteSide = ".back";
            }
        }
        $(".front").css("height", highest);
        $(".back").css("height", highest);
        $(absoluteSide).css("position", "absolute");
    });



    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    var mask;

    var pointCount = 500;
    var str = "Welcome.";
    var fontStr = "bold 128pt Helvetica Neue, Helvetica, Arial, sans-serif";

    ctx.font = fontStr;
    ctx.textAlign = "center";
    c.width = ctx.measureText(str).width;
    c.height = 128; // Set to font size

    var whitePixels = [];
    var points = [];
    var point = function (x, y, vx, vy) {
        this.x = x;
        this.y = y;
        this.vx = vx || 1;
        this.vy = vy || 1;
    }
    point.prototype.update = function () {
        ctx.beginPath();
        ctx.fillStyle = "#95a5a6";
        ctx.arc(this.x, this.y, 1, 0, 2 * Math.PI);
        ctx.fill();
        ctx.closePath();

        // Change direction if running into black pixel
        if (this.x + this.vx >= c.width || this.x + this.vx < 0 || mask.data[coordsToI(this.x + this.vx, this.y, mask.width)] != 255) {
            this.vx *= -1;
            this.x += this.vx * 2;
        }
        if (this.y + this.vy >= c.height || this.y + this.vy < 0 || mask.data[coordsToI(this.x, this.y + this.vy, mask.width)] != 255) {
            this.vy *= -1;
            this.y += this.vy * 2;
        }

        for (var k = 0, m = points.length; k < m; k++) {
            if (points[k] === this) continue;

            var d = Math.sqrt(Math.pow(this.x - points[k].x, 2) + Math.pow(this.y - points[k].y, 2));
            if (d < 5) {
                ctx.lineWidth = .2;
                ctx.beginPath();
                ctx.moveTo(this.x, this.y);
                ctx.lineTo(points[k].x, points[k].y);
                ctx.stroke();
            }
            if (d < 20) {
                ctx.lineWidth = .1;
                ctx.beginPath();
                ctx.moveTo(this.x, this.y);
                ctx.lineTo(points[k].x, points[k].y);
                ctx.stroke();
            }
        }

        this.x += this.vx;
        this.y += this.vy;
    }

    function loop() {
        ctx.clearRect(0, 0, c.width, c.height);
        for (var k = 0, m = points.length; k < m; k++) {
            points[k].update();
        }
    }

    function init() {
        // Draw text
        ctx.beginPath();
        ctx.fillStyle = "#000";
        ctx.rect(0, 0, c.width, c.height);
        ctx.fill();
        ctx.font = fontStr;
        ctx.textAlign = "left";
        ctx.fillStyle = "#fff";
        ctx.fillText(str, 0, c.height / 2 + (c.height / 2));
        ctx.closePath();

        // Save mask
        mask = ctx.getImageData(0, 0, c.width, c.height);

        // Draw background
        ctx.clearRect(0, 0, c.width, c.height);

        // Save all white pixels in an array
        for (var i = 0; i < mask.data.length; i += 4) {
            if (mask.data[i] == 255 && mask.data[i + 1] == 255 && mask.data[i + 2] == 255 && mask.data[i + 3] == 255) {
                whitePixels.push([iToX(i, mask.width), iToY(i, mask.width)]);
            }
        }

        for (var k = 0; k < pointCount; k++) {
            addPoint();
        }
    }

    function addPoint() {
        var spawn = whitePixels[Math.floor(Math.random() * whitePixels.length)];

        var p = new point(spawn[0], spawn[1], Math.floor(Math.random() * 2 - 1), Math.floor(Math.random() * 2 - 1));
        points.push(p);
    }

    function iToX(i, w) {
        return ((i % (4 * w)) / 4);
    }
    function iToY(i, w) {
        return (Math.floor(i / (4 * w)));
    }
    function coordsToI(x, y, w) {
        return ((mask.width * y) + x) * 4;

    }

    setInterval(loop, 50);
    init();

</script>
