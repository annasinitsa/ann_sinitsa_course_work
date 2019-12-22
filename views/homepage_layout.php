<main>
    <div class="hello-section">
        <div id="main-text">
            <h1 id="main-h">CREATE YOUR LISTS OF TV SHOWS</h1>
            <p id="main-p">You can list you favorite TV shows in one place. Or you could find what to watch by reading other`s users reviews.</p>
        </div>
        <div class="sign">
            <a href="../controllers/sign_up.php?type=signup"><button class="signbtn">SIGN UP</button></a>
            <h3 align="center">OR</h3>
            <a href="../controllers/sign_up.php?type=signin"><button class="signbtn">SIGN IN</button></a>
        </div>
    </div>

	<script type="text/javascript" src="js/quiz.js"></script>
	<div class="slideshow-container">
		<div class="mySlides fade">
			<img src="../img/chernobyl.jpg" alt="some serial" width="100%">
		</div>
		<div class="mySlides fade">
			<img src="../img/GOT.jpg" alt="some serial" width="100%">
		</div>
		<div class="mySlides fade">
			<img src="../img/RickAndMorty.png" alt="some serial" width="100%">
		</div>
		<div class="mySlides fade">
			<img src="../img/Black-mirror-for-web.png" alt="some serial" width="100%">
		</div>
		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>
		<br>
           <div style="text-align:center">
                   <span class="dot" onclick="currentSlide(1)"></span>
                   <span class="dot" onclick="currentSlide(2)"></span>
                   <span class="dot" onclick="currentSlide(3)"></span>
                   <span class="dot" onclick="currentSlide(4)"></span>
           </div>
	</div>
		<div class="genres-wrapper">
	    <h1>GENRES</h1>
		<div class="genres">
            {{#genres_list}}
			<a href="../genres.php?genre={{genre}}"><figure>{{genre}}</figure></a>
			{{/genres_list}}
        </div>
    </div>
    <script src="../js/slider.js"></script>
</main>		