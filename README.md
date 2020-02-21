# CI-CRUD-Template
A CodeIgniter model template provided for the developers when they want to interact with database and perform data manipulation.

Intro
-----
This is a simple CRUD model template I created in order to help other programmers for developing their program. This template contains Insert, Select, Update, and Delete operation, and aimed for MySQL database.

Installation
------------
In order to use the model, you have to copy it to your CodeIgniter project **`/application/models/`** directory. After that, you can load the model on your **Controller**. Load the on the `__construct()` function.

```
function __construct(){
  parent::__construct();
  
  $this->load->model('crud');
}
```

Keep in mind that there are some requirements on the function that you have to fullfill. Otherwise the function won't work as intended. For example :
1. If you want to Insert a data, this is the way to do so.
    * Create an array variable, then set the array key as the table field and the array value as the field value.
    ```
    $data = array(
      '<field name>' => '<field value>'
    );
    ```
    * Then, call the Insert function.
    ```
    $this->crud->AddData('<table name>', $data);
    ```
2. The same thing applied for Update function, just add the where condition.
    ```
    $this->crud->UpdateData('<table name>', $data, '<where condition>', '<where value>');
    ```
3. If you want to Delete a data, add the table name, where condition and its value.
    ```
    $this->crud->DeleteData('<table name>', '<where condition>', '<where value>');
    ```
4. 
    ***Notice : Do it all without the left and right angle bracket, and also no spacing.***

The Developer
-------------
**Ichwanul Fadhli**

GitHub    : [@ichwanulfadhli](https://github.com/ichwanulfadhli/)

Instagram : [@ichwa_nf](https://www.instagram.com/ichwa_nf/)

Note
----
There might be some update for the improvement some time in the future.

Copyright (c) 2020 Ichwanul Fadhli
