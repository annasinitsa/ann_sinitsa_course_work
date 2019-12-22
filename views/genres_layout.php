<main class="main-content">
    <div class="aside">
            <ul class="nav-genres">
                {{#genres_list}}
                <li class="genre-item"><a href="../genres.php?genre={{genre}}" id="genre-title">{{genre}}</a></li>
                {{/genres_list}}
            </ul>
        </div>
        <div class="content">
            <div class="grid-container">
                {{#serial_data}}
                <div class="grid-item">
                    <a href="../serial.php?title={{title}}">
                        <img src="{{poster}}" alt="{{title}}" class="poster">
                        <h4 class="serial-title">{{title}}</h4>
                    </a>
                </div>
                {{/serial_data}}
            </div>
            <div class="page-pagination">
                <a href="#">
                    <button class="nav-button">PREV</button>
                </a>
                <a href="#">
                    <button class="nav-button">NEXT</button>
                </a>
            </div>
        </div>
    </div>
</main>
