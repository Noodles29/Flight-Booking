<?php
// include('header.php');
include 'admin/db_connect.php';
?>
<style>
    #portfolio .img-fluid {
        width: calc(100%);
        height: 30vh;
        z-index: -1;
        position: relative;
        padding: 1em;
    }
</style>
<header>
<div class="slider">
		<div class="slideshow-container">
			<!-- Full-width images with number and caption text -->
			<div class="mySlides fade">
				<div class="numbertext">1 / 3</div>
				<img class="imgSlide" src="./assets/img/img1.jpg">
			</div>

			<div class="mySlides fade">
				<div class="numbertext">2 / 3</div>
				<img class="imgSlide" src="assets/img/img2.jpg">
			</div>

			<div class="mySlides fade">
				<div class="numbertext">3 / 3</div>
				<img class="imgSlide" src="assets/img/img3.jpg">
			</div>

			<!-- Next and previous buttons -->
			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>
		</div>

		<!-- The dots/circles -->
		<div class="slide_dot">
			<span class="dot" onclick="currentSlide(1)"></span>
			<span class="dot" onclick="currentSlide(2)"></span>
			<span class="dot" onclick="currentSlide(3)"></span>
		</div>
	</div>

    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4 page-title">
                <h3 style="margin-top: 50px;">Welcome to <?php echo $_SESSION['setting_name']; ?></h3>
                <hr class="divider my-4" />
                <div class="col-md-12 mb-2 text-left">
                    <div class="card">
                        <div class="card-body">
                            <form id="manage-filter" action="index.php?page=flights2" method="POST">
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="" class="control-label">From</label>
                                        <select name="departure_airport_id" id="departure_location" class="custom-select browser-default select2">
                                            <option value=""></option>
                                            <?php
                                            $airport = $conn->query("SELECT * FROM airport_list order by airport asc");
                                            while ($row = $airport->fetch_assoc()) :
                                            ?>
                                                <option value="<?php echo $row['id'] ?>" <?php echo isset($departure_airport_id) && $departure_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['location'] . ", " . $row['airport'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="control-label">To</label>
                                        <select name="arrival_airport_id" id="arrival_airport_id" class="custom-select browser-default select2">

                                            <option value=""></option>

                                            <?php
                                            $airport = $conn->query("SELECT * FROM airport_list order by airport asc");
                                            while ($row = $airport->fetch_assoc()) :
                                            ?>
                                                <option value="<?php echo $row['id'] ?>" <?php echo isset($arrival_airport_id) && $arrival_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['location'] . ", " . $row['airport'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3" style="display: grid;">
                                        <label for="" class="control-label">Departure Date</label>
                                        <input type="date" class="form-control input-sm datetimepicker2" name="date" autocomplete="off">
                                    </div>
                                    <div class="col-sm-3" id="rdate" style="display: none;">
                                        <label for="" class="control-label">Return Date</label>
                                        <input type="date" class="form-control input-sm datetimepicker2" name="date_return" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2 text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trip" id="onewway" value="1" checked>
                                            <label class="form-check-label" for="onewway">
                                                One-way
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trip" id="rtrip" value="2">
                                            <label class="form-check-label" for="rtrip">
                                                Round Trip
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 offset-sm-5">
                                        <button class="btn btn-block btn-sm btn-primary" type="submit"><i class="fa fa-plane-departure"></i> Find Flights</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</header>

<section class="page-section" id="menu">

    <div id="portfolio" class="container">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="mb-4">Partner Airlines</h2>
                    <hr class="divider">

                </div>
            </div>
            <div class="row no-gutters">
                <?php
                $cats = $conn->query("SELECT * FROM airlines_list order by rand() asc");
                while ($row = $cats->fetch_assoc()) :
                ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="portfolio-box" href="#">
                            <img class="img-fluid" src="assets/img/<?php echo $row['logo_path'] ?>" alt="" />
                                <form id="manage-filter" action="index.php?page=flights2" method="POST">
                                    <div class="port-content text-center">
                                        <button type="submit" class="btn-primary btn" name="airline_id" value="<?php echo $row['id'] ?> "> Find Flights </button>
                                    </div>
                                </form>
                        </div>
                    </div>
            
                <?php endwhile; ?>

            </div>
            
        </div>
    </div>
    
    <script>
        document.getElementById("btn_find")?.addEventListener("click", handleClick)
        {

        }
        $('.view_prod').click(function() {
            uni_modal_right('Product', 'view_prod.php?id=' + $(this).attr('data-id'))
        })
        $('.select2').select2({
            placeholder: 'Select Departure',
            width: '100%'
        })
        $('[name="trip"]').on("keypress change keyup", function() {
            if ($(this).val() == 1) {
                $('#rdate').hide()
            } else {
                $("#rdate").css("display", "grid");
                $('#rdate').show()
            }
        })

        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>

</section>