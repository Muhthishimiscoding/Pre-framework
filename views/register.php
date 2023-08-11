
    <h2 class='mt-3'>Register with us</h2>

    <?php
    use MuhthishimisCoding\PreFramework\form\Form;
    use MuhthishimisCoding\PreFramework\Application;
    if (Application::isLogedin()) {
        header('location:/');
    }
    $field = Form::begin($model);
    $field->input('fullName', 'Full Name');
    $field->input('email', 'Email', 'email');
    $field->input('username', 'Username');
    $field->input('password', 'Password');
    $field->input('confirmPassword', 'Confirm Password');
    ?>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php
    Form::end();
    ?>
