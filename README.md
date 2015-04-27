##Developers
Kyle Giard-Chase & James Nielson

##Date
March 19 2015



##Description
An app for a user to track the restaurants they have visited. Users are able to add, edit, and delete restaurants and assign them to a cuisine type.

##Technologies Used
PHP <br>
<a href='http://www.postgresql.org/'>PostgreSQL</a> <br>
<a href='https://developers.google.com/speed/libraries/'>jQuery</a> <br>
<a href='http://getbootstrap.com/'>Bootstrap </a>for styling <br>
It uses <a href='https://getcomposer.org/'>Composer</a> to install:
<li>
<a href='http://silex.sensiolabs.org/'>Silex</a>
</li>
<li><a href='http://twig.sensiolabs.org/'>Twig</a></li>
<li><a href='https://phpunit.de/'>PHPUnit</a></li>

##Use and Editing
To view the app,<br>
1. Open your command shell, and clone the repository into your home folder using the command `git clone https://github.com/k-giardchase/best_restaurants.git`<br>
2. Import the database into PostgreSQL. See the Database section to do so.<br>
3. In the top level of the project folder, run `composer install`<br>
4. Start a php server by changing directories into the web folder `cd best_restaurants/web`
and start your server `php -S localhost:8000`<br>
5. Open your browser and navigate to your root path: `localhost:8000`


##DATABASE
1. Create a new database `CREATE DATABASE best_restaurants;`<br>
2. Connect to the database `\c best_restaurants;`<br>
3. In your command shell, and in the top level of your home directory, import the database `\i best_restaurants.sql`<br>
4. If you would like to edit the app and make use of the test database, `CREATE DATABASE best_restaurants_test WITH TEMPLATE best_restaurants`<br>
5. NOTE: If the database fails to import (see above), you may manually create it using the following commands:<br>
```sql
CREATE DATABASE best_restaurants;
 \c best_restaurants
CREATE TABLE cuisines (id serial PRIMARY KEY, type varchar);
CREATE TABLE supervisors (id serial PRIMARY KEY, name varchar, review varchar, stars int, type_id int);
CREATE DATABASE best_restaurants_test WITH TEMPLATE best_restaurants;
```

##Copyright (c) 2015 Kyle Giard-Chase & James Nielson
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
