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

## Step 2

Our report page `loan.php` will consist friend's name, his loans and reminder message for him. Let's start!

```php
<?php
	require 'init.php';
	$back=$app->layout->add('Button'); 		//
	$back->set('Back');						// Back button
	$back->link('index.php');				//
```

 We need to make relation with a friend and his loans:

```php
	$friend = new Friends($db);
	$friend->load($app->stickyGet('friends_id'));  // making a relation
	$borrowed = $friend->ref('Borrowed');	// relation for borrowed
	$returned = $friend->ref('Returned');	// relation for returned

```

In case if you forgot current friend's name, we will add his name:

```php
$layout->add('Header')->set($friend['name']);  // adding name
```

I think column-style would look nice, that's why I will use columns:

```php
$columns = $app->layout->add(['ui'=>'segment'])->add(new \atk4\ui\Columns('divided')); //adding column style
$column = $columns->addColumn(); // adding first column
```

Now it's time to add tables with loans:

```php
	$column->add('Header')->set('In that interface you can add new lends:'); //adding header
	$crud1 = $column->add('CRUD');
 	$crud1->setModel($borrowed,['amount','date']);  //making crud for borrowed

	$column->add(['ui'=>'hidden divider']);

	$column->add('Header')->set('In that interface you can add new returnings:');
	$crud2 = $column->add('CRUD');
	$crud2->setModel($returned,['amount','date']); //making crud for borrowed
```

In the second column will be our reminder message:

```php
$column2 =  $columns->addColumn();  //adding second column
$column2->add('Header')->set('Here you have reminder message for your friend. If you will, you can send it to him.');
$column2->add(new ReminderBox())->setModel($friend); //adding reminder message
```

Now we need to add a model for our reminder:

```php
<?php
class ReminderBox extends \atk4\ui\View {
    public $ui='piled segment';
    /**
     * Specify which contact to remind about
     */
    public function setModel(\atk4\data\Model $friend) {
        $this->add('Header')->set('Please repay my loan, '.$friend['name']);
        $this->add('Text')->addParagraph('I have loaned you a total of ' . $friend['total_borrowed'] . '€ from which you still owe me ' . ($friend['total_borrowed']-$friend['total_returned']) . '€. Please pay back!');
        $this->add('Text')->addParagraph('Thanks!');
    }
}
```

And that's it! Hope that you've made through! Good job!