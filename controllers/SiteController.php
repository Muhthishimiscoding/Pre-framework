<?php
namespace Worth\controllers;

use MuhthishimisCoding\PreFramework\Request;
use MuhthishimisCoding\PreFramework\Controller;
use Worth\models\ContactForm;

class SiteController extends Controller
{
	public function contact(Request $request)
	{
		$model = new ContactForm();
		if ($request->isGet()) {
			return $this->render('contact', ['model' => $model]);
		} elseif ($request->isPost()) {
			$model->loadData($request->getBody(1));
			if ($model->send()) {
				header('location:/contact');
				exit;
			}
			return $this->render('contact', ['model' => $model]);
		}

	}
	public function handleContact(Request $request)
	{
		$request->getBody();
	}

	/**
	 * @return array
	 */
	public function getCssAndJs($key)
	{
		return $this->cssAndJs[$key];
	}

	/**
	 * @param mixed $cssAndJs 
	 * @return void
	 */
	public function setCssAndJs($key, $cssAndJs)
	{
		$this->cssAndJs[$key] = $cssAndJs;
	}
}