<?php partial("Header", ["favicon" => $favicon, "title" => $title], $places); ?>
<?php
    $oldUsernameValue = session_get_input("username");
    $oldPasswordValue = session_get_input("password");
    $oldRememberValue = session_get_input("remember") ?? false;
?>
<main>
    <div id="logo-container">
        <a href="<?php echo url()?>">
            <img src="<?php print_asset($logo);?>" alt="">
        </a>
    </div>
    <form action="<?php echo url()?>/doLogin.php" method="post">
        <div class="field-row" id="password-field-row">
            <input type="text" name="username" id="username" <?php echo inputValue($oldUsernameValue)?>>
            <label for="username">
                <i class="fa-solid fa-user-lock"></i>
                نام کاربری :
            </label>
            <div class="underline"></div>
        </div>
        <div class="field-row">
            <input type="password" name="password" id="password" <?php echo inputValue($oldPasswordValue)?>>
            <label for="password">
                <i class="fa-solid fa-key"></i>
                گذرواژه :
            </label>
            <div class="underline"></div>
        </div>
        <div class="remember-row">
            <div class="checkbox-wrapper-30">
                <span class="checkbox">
                    <input type="checkbox" name="rememberMe" id="rememberMe" <?php echo mustBeChecked($oldRememberValue)?>/>
                    <svg>
                      <use xlink:href="#checkbox-30" class="checkbox"></use>
                    </svg>
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
                    <symbol id="checkbox-30" viewBox="0 0 22 22">
                        <path fill="none" stroke="currentColor"
                              d="M5.5,11.3L9,14.8L20.2,3.3l0,0c-0.5-1-1.5-1.8-2.7-1.8h-13c-1.7,0-3,1.3-3,3v13c0,1.7,1.3,3,3,3h13 c1.7,0,3-1.3,3-3v-13c0-0.4-0.1-0.8-0.3-1.2"/>
                    </symbol>
                </svg>
                <label for="rememberMe">منو یادت باشه</label>

            </div>
        </div>
        <div class="button-row">
            <button type="submit" class="button purple-button action-button" id="login-button">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                ورود
            </button>
            <button type="reset" class="button error-button action-button" id="reset-button">
                <i class="fa-solid fa-broom"></i>
                پاک کن
            </button>
        </div>
    </form>
</main>

<?php partial("Footer"); ?>
