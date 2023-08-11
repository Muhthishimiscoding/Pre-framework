  <?php
  use MuhthishimisCoding\PreFramework\Application;
  use MuhthishimisCoding\PreFramework\form\Form;
  /**
   * @var $model Worth\models\ContactForm;
   */
  Application::app()->session->showFlashes('contact');
  $field = Form::begin($model);
  $field->input('email','Enter your email');
  $field->input('fullname','Enter your Name');
  $field->input('subject','Subject');
  $field->textArea('message','Enter your message','Start typing your message');
  ?>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php
    form::end();
    ?>
