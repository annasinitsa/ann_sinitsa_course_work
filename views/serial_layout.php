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
        <div>
            <p><b>Author's name</b></p>
            <p><b>Rating:</b> {{rating}}/10</p>
            <q>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</q>
        </div>
        <hr>
    </section>
</main>