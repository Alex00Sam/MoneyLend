# Welcome to Money Lending App tutorial!

​	In this tutorial, I will show you how to step-by-step make a similar product. So follow along!

## Introduction

​	You are a person who frequently lends money to friends. But you can't keep every loan in your head, that's why you use Money Lending App where you can manage loans and returns.

## Conception

Our app will contain: 

 * Homepage
    * Short info
    * List of friends
* Every's friend report
  * Loans and returnings
  * Reminder message

## Preparation

### App initialization(`init.php`)

App will have:

* Attached atk4 `require 'vendor/autoload.php';`
* Title `$app = new \atk4\ui\App('Money Lending App');`


* Basic **centered** layout `$layout = $app->initLayout('Centered');`
* Database connection` $db = new \atk4\data\Persistence_SQL('database_name;host', 'username', 'password');` 

### Models

We will use 4 models in our app:

* Friends
* Loans
* Returnings
* Reminder message

## Step 1

Let's start from homepage `index.php`. First of all, open PHP code and attach our `init.php`. 

```php
<?php
require 'init.php';
```

We will add some information about our app and what it can do.

 For example: 

```php
$intro = $app->layout->add('Header')->set('Welcome to Money Lending App, where you can manage your friend loans and their returnings. Enjoy!');
```

For my personal design reasons, I've decided to add a form:

```php
$form = $app->layout->add('Form');
```

Form requires model. We will create one:

```php
<?php
class Friends extends \atk4\data\Model {
	public $table = 'friends';
	function init() {
		parent::init();
		$this->hasMany('Borrowed',new Borrowed())->addField('total_borrowed', ['aggregate'=>'sum', 'field'=>'amount']); //aggregate makes a certain operation(f.e. summary) with all field's values
		$this->hasMany('Returned',new Returned())->addField('total_returned', ['aggregate'=>'sum', 'field'=>'amount']);
		$this->addFields(['name','email','phone']);
	}
}
```

Now, since we have a 'Friends' model, we will set our added form.

```php
$form->setModel(new Friends($db));

$form->onSubmit(function($form) {
  $form->model->save();
  return $form->success('You have successfully added a new friend!');
```

For a next step, we shall add a divider:

```php
$layout->add(['ui'=>'hidden divider']);
```

Below our form will be placed our friend list.

```php
$crud = $app->layout->add('CRUD');
```

Every name in this list will contain link to his loans:

```php
$crud->addColumn('name', new \atk4\ui\TableColumn\Link('loan.php?friends_id={$id}'));
```

Now let's set our list: 

```php
$crud->setModel(new Friends($db));
```

Great! Our homepage is done. Now let's proceed to the report pages!