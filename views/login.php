    <h2 class='mt-3'>Login now</h2>

    <?php
    use MuhthishimisCoding\PreFramework\Application;

    if (Application::isLogedin()) {
        header('location:/');
    }
    use MuhthishimisCoding\PreFramework\form\Form;

    $field = Form::begin($model);
    $session->showFlashes('login');
    $field->input('emailOrusername', 'Email address or username');
    $field->input('password', 'Password', 'password');
    ?>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php
    form::end();
    ?>
