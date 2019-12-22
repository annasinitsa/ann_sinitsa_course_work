<main>
    <div class="hello-section">
        <div class="sign-section">
            {{#type}}
            {{#msg}}<div role="alert">{{msg}}</div>{{/msg}}
            <form class="sign" method="post">
                <label for="email"><b>Email</b></label>
                <input type="email" name="email" required>
                <label for="password"><b>Password</b></label>
                <input type="password" name="pass" required>
                <a href="../controllers/sign_up.php?type=signin"></a><button type="submit" class="signinbtn"><strong>Sign In</strong></button>
            </form>
            {{/type}}
            {{^type}}
            {{#msg}}<div role="alert">{{msg}}</div>{{/msg}}
            <form class="sign" method="post">
                <label for="name"><b>Name</b></label>
                <input type="text" name="username" required>
                <label for="email"><b>Email</b></label>
                <input type="email" name="email" required>
                <label for="password"><b>Password</b></label>
                <input type="password" name="pass" required>
                <a href="../controllers/sign_up.php?type=signup"></a><button type="submit" class="signupbtn"><strong>Sign Up</strong></button>
            </form>
            {{/type}}
        </div>
    </div>
</main>