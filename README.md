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

### App initialization

App will have:

* attached atk4 `require 'vendor/autoload.php';`
* Title `$app = new \atk4\ui\App('Money Lending App');`


* basic **centered** layout `$layout = $app->initLayout('Centered');`
* Database connection` $db = new \atk4\data\Persistence_SQL('database_name;host', 'username', 'password');` 

### Models

We will use 4 models in our app:

* Friends
* Loans
* Returnings
* Reminder message