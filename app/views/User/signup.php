<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ?>">Главная</a></li>
                <li>Регистрация</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="signup">
                    <div class="register-top heading">
                        <h2>Регистрация</h2>
                    </div>
                    <div class="register-main">
                        <div class="account-left">
                            <form data-toggle="validator" method="post" action="user/signup" id="signup" role="form">
                                <div class="form-group has-feedback">
                                    <label for="login">Логин</label>
                                    <input type="text" name="login" class="form-control" id="login" placeholder="Логин" value="<?php echo (isset($_SESSION['form_data']['login'])) ? $_SESSION['form_data']['login'] : '';?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="pasword">Пароль</label>
                                    <input type="password" name="password" class="form-control" id="pasword" placeholder="Пароль" data-minlength="6" data-error="Пароль должен быть больше чем 6 символов" value="<?php echo (isset($_SESSION['form_data']['password'])) ? $_SESSION['form_data']['password'] : '';?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="name">Имя</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Имя" value="<?php echo (isset($_SESSION['form_data']['name'])) ? $_SESSION['form_data']['name'] : '';?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo (isset($_SESSION['form_data']['email'])) ? $_SESSION['form_data']['email'] : '';?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="address">Адрес</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Адрес" value="<?php echo (isset($_SESSION['form_data']['address'])) ? $_SESSION['form_data']['address'] : '';?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <button type="submit" class="btn btn-default">Зарегистрировать</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
<!--product-end-->