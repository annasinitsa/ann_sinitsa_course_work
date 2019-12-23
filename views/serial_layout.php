<main class="main-wrapp">

    <section>
        <h2>{{title}}</h2>
        <div class="about-serial">
            <div>
                <img src="{{poster}}" alt="{{title}}" class="poster">
            </div>
            <div class="info">
                <p><strong>Release date: </strong>{{release_date}}</p>
                <p><strong>Country: </strong>{{country}}</p>
                <p><strong>Director(s): </strong>{{director}}</p>
                <p><strong>Age Rate: </strong>{{age_rate}}</p>
                <p><strong>Time: </strong>{{time}}</p>
                <p><strong>Seasons: </strong>{{seasons}}</p>
                <p><strong>Episodes: </strong>{{episodes}}</p>
                <p><strong>Genre: </strong>{{genre}}</p>
                <p><strong>Rating: </strong>{{rating}}</p>
                <p><strong>About: </strong>{{about}}</p>
            </div>
        </div>
    </section>
    <div class="trailer">
        <h2>Watch trailer</h2>
        <iframe width="560" height="315" src="{{trailer_link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <section>
        <a href="../create_review.php?title={{title}}"><button class="add-btn"><strong>ADD REVIEW</strong></button></a>
        <h2>Reviews</h2>
        <hr>
        {{#review}}
        <div>
            <p><b>Author:</b> {{author_name}}</p>
            <p><b>Rating:</b> {{rate}}/10</p>
            <p>{{rev_text}}</p>
        </div>
        <hr>
        {{/review}}
    </section>
</main>