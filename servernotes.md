
####Database: crm_music

###Table Descriptions:

##accounts

| Field               | Type                | Null | Key | Default | Extra          |
|---------------------|---------------------|------|-----|---------|----------------|
| id                  | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| family_name         | varchar(255)        | YES  |     | NULL    |                |
| street_address      | varchar(255)        | YES  |     | NULL    |                |
| phone_number        | varchar(255)        | YES  |     | NULL    |                |
| email_address       | varchar(255)        | YES  |     | NULL    |                |
| notes               | text                | YES  |     | NULL    |                |
| billing_history     | text                | YES  |     | NULL    |                |
| outstanding_balance | int(11)             | YES  |     | NULL    |                |
| parent_one_name     | varchar(255)        | YES  |     | NULL    |                |
| parent_two_name     | varchar(255)        | YES  |     | NULL    |                |
CREATE TABLE accounts (id serial PRIMARY KEY, family_name VARCHAR (255), street_address VARCHAR (255), phone_number VARCHAR (255), email_address VARCHAR(255), notes TEXT, billing_history TEXT, outstanding_balance INT, parent_one_name VARCHAR (255), parent_two_name VARCHAR (255));

##courses

| Field | Type                | Null | Key | Default | Extra          |
|-------|---------------------|------|-----|---------|----------------|
| title | varchar(255)        | YES  |     | NULL    |                |
| id    | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
CREATE TABLE courses (title VARCHAR(255), id serial PRIMARY KEY);

##images

| Field   | Type             | Null | Key | Default | Extra          |
|---------|------------------|------|-----|---------|----------------|
| idpic   | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| caption | varchar(45)      | NO   |     | NULL    |                |
| img     | longblob         | NO   |     | NULL    |                |
CREATE TABLE images (idpic INTEGER UNSIGNED NOT NULL AUTO_INCREMENT, caption VARCHAR(45) NOT NULL, img LONGBLOB NOT NULL, PRIMARY KEY(idpic));

##teachers

| Field        | Type                | Null | Key | Default | Extra          |
|--------------|---------------------|------|-----|---------|----------------|
| id           | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| teacher_name | varchar(255)        | YES  |     | NULL    |                |
| instrument   | varchar(100)        | YES  |     | NULL    |                |
| notes        | text                | YES  |     | NULL    |                |

CREATE TABLE teachers (id serial PRIMARY KEY, teacher_name VARCHAR (255), instrument VARCHAR (100), notes TEXT);

##schools

| Field            | Type                | Null | Key | Default | Extra          |
|------------------|---------------------|------|-----|---------|----------------|
| school_name      | varchar(255)        | YES  |     | NULL    |                |
| manager_name     | varchar(255)        | YES  |     | NULL    |                |
| phone_number     | varchar(255)        | YES  |     | NULL    |                |
| email            | varchar(255)        | YES  |     | NULL    |                |
| business_address | varchar(255)        | YES  |     | NULL    |                |
| city             | varchar(255)        | YES  |     | NULL    |                |
| state            | varchar(255)        | YES  |     | NULL    |                |
| country          | varchar(255)        | YES  |     | NULL    |                |
| zip              | varchar(255)        | YES  |     | NULL    |                |
| type             | varchar(255)        | YES  |     | NULL    |                |

CREATE TABLE schools (id serial PRIMARY KEY, school_name VARCHAR(255), manager_name VARCHAR(255), phone_number VARCHAR(255), email VARCHAR(255), business_address VARCHAR(255), city VARCHAR(255), state VARCHAR(255), country VARCHAR(255), zip VARCHAR(255), type VARCHAR(255));


##services

| Field          | Type                | Null | Key | Default | Extra          |
|----------------|---------------------|------|-----|---------|----------------|
| description     | varchar(255)        | YES  |     | NULL    |                |
| duration        | int(11)             | YES  |     | NULL    |                |
| price           | decimal(10,2)       | YES  |     | NULL    |                |
| discount        | decimal(10,2)       | YES  |     | NULL    |                |
| paid_for        | int                 | YES  |     | NULL    |                |
| notes           | text                | YES  |     | NULL    |                |
| date_of_service | datetime            | YES  |     | NULL    |                |
| recurrence      | varchar(255)        | YES  |     | NULL    |                |
| attendance      | varchar(255)        | YES  |     | NULL    |                |
| id              | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |

CREATE TABLE services (description VARCHAR(255), duration INT, price DECIMAL(10,2), discount DECIMAL(10,2), paid_for INT, notes TEXT, date_of_service DATETIME, recurrence VARCHAR(255), attendance VARCHAR(255), id serial PRIMARY KEY);

##students

| Field        | Type                | Null | Key | Default | Extra          |
|--------------|---------------------|------|-----|---------|----------------|
| id           | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| student_name | varchar(255)        | YES  |     | NULL    |                |
| notes        | text                | YES  |     | NULL    |                |

CREATE TABLE students (id serial PRIMARY KEY, student_name VARCHAR (255), notes TEXT);


##lessons


| Field       | Type                | Null | Key | Default | Extra          |
|-------------|---------------------|------|-----|---------|----------------|
| title       | varchar(255)        | YES  |     | NULL    |                |
| description | varchar(255)        | YES  |     | NULL    |                |
| content     | TEXT                | YES  |     | NULL    |                |
| id          | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
CREATE TABLE lessons (title VARCHAR(255), description VARCHAR(255), content TEXT, id serial PRIMARY KEY);



#Join Tables:

##serverBlaster join table results:
CREATE TABLE accounts_courses (id serial PRIMARY KEY, account_id INT, course_id INT, date_of_join DATETIME);
CREATE TABLE accounts_images (id serial PRIMARY KEY, account_id INT, image_id INT, date_of_join DATETIME);
CREATE TABLE accounts_lessons (id serial PRIMARY KEY, account_id INT, lesson_id INT, date_of_join DATETIME);
CREATE TABLE accounts_schools (id serial PRIMARY KEY, account_id INT, school_id INT, date_of_join DATETIME);
CREATE TABLE accounts_services (id serial PRIMARY KEY, account_id INT, service_id INT, date_of_join DATETIME);
CREATE TABLE accounts_students (id serial PRIMARY KEY, account_id INT, student_id INT, date_of_join DATETIME);
CREATE TABLE accounts_teachers (id serial PRIMARY KEY, account_id INT, teacher_id INT, date_of_join DATETIME);
CREATE TABLE courses_images (id serial PRIMARY KEY, course_id INT, image_id INT, date_of_join DATETIME);
CREATE TABLE courses_lessons (id serial PRIMARY KEY, course_id INT, lesson_id INT, date_of_join DATETIME);
CREATE TABLE courses_schools (id serial PRIMARY KEY, course_id INT, school_id INT, date_of_join DATETIME);
CREATE TABLE courses_services (id serial PRIMARY KEY, course_id INT, service_id INT, date_of_join DATETIME);
CREATE TABLE courses_students (id serial PRIMARY KEY, course_id INT, student_id INT, date_of_join DATETIME);
CREATE TABLE courses_teachers (id serial PRIMARY KEY, course_id INT, teacher_id INT, date_of_join DATETIME);
CREATE TABLE images_lessons (id serial PRIMARY KEY, image_id INT, lesson_id INT, date_of_join DATETIME);
CREATE TABLE images_schools (id serial PRIMARY KEY, image_id INT, school_id INT, date_of_join DATETIME);
CREATE TABLE images_services (id serial PRIMARY KEY, image_id INT, service_id INT, date_of_join DATETIME);
CREATE TABLE images_students (id serial PRIMARY KEY, image_id INT, student_id INT, date_of_join DATETIME);
CREATE TABLE images_teachers (id serial PRIMARY KEY, image_id INT, teacher_id INT, date_of_join DATETIME);
CREATE TABLE lessons_schools (id serial PRIMARY KEY, lesson_id INT, school_id INT, date_of_join DATETIME);
CREATE TABLE lessons_services (id serial PRIMARY KEY, lesson_id INT, service_id INT, date_of_join DATETIME);
CREATE TABLE lessons_students (id serial PRIMARY KEY, lesson_id INT, student_id INT, date_of_join DATETIME);
CREATE TABLE lessons_teachers (id serial PRIMARY KEY, lesson_id INT, teacher_id INT, date_of_join DATETIME);
CREATE TABLE schools_services (id serial PRIMARY KEY, school_id INT, service_id INT, date_of_join DATETIME);
CREATE TABLE schools_students (id serial PRIMARY KEY, school_id INT, student_id INT, date_of_join DATETIME);
CREATE TABLE schools_teachers (id serial PRIMARY KEY, school_id INT, teacher_id INT, date_of_join DATETIME);
CREATE TABLE services_students (id serial PRIMARY KEY, service_id INT, student_id INT, date_of_join DATETIME);
CREATE TABLE services_teachers (id serial PRIMARY KEY, service_id INT, teacher_id INT, date_of_join DATETIME);
CREATE TABLE students_teachers (id serial PRIMARY KEY, student_id INT, teacher_id INT, date_of_join DATETIME);


##joinBlaster commands:
$GLOBALS['DB']->query("SELECT accounts.* FROM courses JOIN accounts_courses ON (courses.id = accounts_courses.course_id) JOIN accounts ON (accounts_courses.account_id = accounts.id) WHERE courses.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT accounts.* FROM images JOIN accounts_images ON (images.id = accounts_images.image_id) JOIN accounts ON (accounts_images.account_id = accounts.id) WHERE images.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT accounts.* FROM lessons JOIN accounts_lessons ON (lessons.id = accounts_lessons.lesson_id) JOIN accounts ON (accounts_lessons.account_id = accounts.id) WHERE lessons.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT accounts.* FROM schools JOIN accounts_schools ON (schools.id = accounts_schools.school_id) JOIN accounts ON (accounts_schools.account_id = accounts.id) WHERE schools.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT accounts.* FROM services JOIN accounts_services ON (services.id = accounts_services.service_id) JOIN accounts ON (accounts_services.account_id = accounts.id) WHERE services.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT accounts.* FROM students JOIN accounts_students ON (students.id = accounts_students.student_id) JOIN accounts ON (accounts_students.account_id = accounts.id) WHERE students.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT accounts.* FROM teachers JOIN accounts_teachers ON (teachers.id = accounts_teachers.teacher_id) JOIN accounts ON (accounts_teachers.account_id = accounts.id) WHERE teachers.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT courses.* FROM images JOIN courses_images ON (images.id = courses_images.image_id) JOIN courses ON (courses_images.course_id = courses.id) WHERE images.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT courses.* FROM lessons JOIN courses_lessons ON (lessons.id = courses_lessons.lesson_id) JOIN courses ON (courses_lessons.course_id = courses.id) WHERE lessons.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT courses.* FROM schools JOIN courses_schools ON (schools.id = courses_schools.school_id) JOIN courses ON (courses_schools.course_id = courses.id) WHERE schools.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT courses.* FROM services JOIN courses_services ON (services.id = courses_services.service_id) JOIN courses ON (courses_services.course_id = courses.id) WHERE services.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT courses.* FROM students JOIN courses_students ON (students.id = courses_students.student_id) JOIN courses ON (courses_students.course_id = courses.id) WHERE students.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT courses.* FROM teachers JOIN courses_teachers ON (teachers.id = courses_teachers.teacher_id) JOIN courses ON (courses_teachers.course_id = courses.id) WHERE teachers.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT images.* FROM lessons JOIN images_lessons ON (lessons.id = images_lessons.lesson_id) JOIN images ON (images_lessons.image_id = images.id) WHERE lessons.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT images.* FROM schools JOIN images_schools ON (schools.id = images_schools.school_id) JOIN images ON (images_schools.image_id = images.id) WHERE schools.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT images.* FROM services JOIN images_services ON (services.id = images_services.service_id) JOIN images ON (images_services.image_id = images.id) WHERE services.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT images.* FROM students JOIN images_students ON (students.id = images_students.student_id) JOIN images ON (images_students.image_id = images.id) WHERE students.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT images.* FROM teachers JOIN images_teachers ON (teachers.id = images_teachers.teacher_id) JOIN images ON (images_teachers.image_id = images.id) WHERE teachers.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT lessons.* FROM schools JOIN lessons_schools ON (schools.id = lessons_schools.school_id) JOIN lessons ON (lessons_schools.lesson_id = lessons.id) WHERE schools.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT lessons.* FROM services JOIN lessons_services ON (services.id = lessons_services.service_id) JOIN lessons ON (lessons_services.lesson_id = lessons.id) WHERE services.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT lessons.* FROM students JOIN lessons_students ON (students.id = lessons_students.student_id) JOIN lessons ON (lessons_students.lesson_id = lessons.id) WHERE students.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT lessons.* FROM teachers JOIN lessons_teachers ON (teachers.id = lessons_teachers.teacher_id) JOIN lessons ON (lessons_teachers.lesson_id = lessons.id) WHERE teachers.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT schools.* FROM services JOIN schools_services ON (services.id = schools_services.service_id) JOIN schools ON (schools_services.school_id = schools.id) WHERE services.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT schools.* FROM students JOIN schools_students ON (students.id = schools_students.student_id) JOIN schools ON (schools_students.school_id = schools.id) WHERE students.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT schools.* FROM teachers JOIN schools_teachers ON (teachers.id = schools_teachers.teacher_id) JOIN schools ON (schools_teachers.school_id = schools.id) WHERE teachers.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT services.* FROM students JOIN services_students ON (students.id = services_students.student_id) JOIN services ON (services_students.service_id = services.id) WHERE students.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT services.* FROM teachers JOIN services_teachers ON (teachers.id = services_teachers.teacher_id) JOIN services ON (services_teachers.service_id = services.id) WHERE teachers.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT students.* FROM teachers JOIN students_teachers ON (teachers.id = students_teachers.teacher_id) JOIN students ON (students_teachers.student_id = students.id) WHERE teachers.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT courses.* FROM accounts JOIN accounts_courses ON (accounts.id = accounts_courses.account_id) JOIN courses ON (accounts_courses.course_id = courses.id) WHERE accounts.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT images.* FROM accounts JOIN accounts_images ON (accounts.id = accounts_images.account_id) JOIN images ON (accounts_images.image_id = images.id) WHERE accounts.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT lessons.* FROM accounts JOIN accounts_lessons ON (accounts.id = accounts_lessons.account_id) JOIN lessons ON (accounts_lessons.lesson_id = lessons.id) WHERE accounts.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT schools.* FROM accounts JOIN accounts_schools ON (accounts.id = accounts_schools.account_id) JOIN schools ON (accounts_schools.school_id = schools.id) WHERE accounts.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT services.* FROM accounts JOIN accounts_services ON (accounts.id = accounts_services.account_id) JOIN services ON (accounts_services.service_id = services.id) WHERE accounts.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT students.* FROM accounts JOIN accounts_students ON (accounts.id = accounts_students.account_id) JOIN students ON (accounts_students.student_id = students.id) WHERE accounts.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT teachers.* FROM accounts JOIN accounts_teachers ON (accounts.id = accounts_teachers.account_id) JOIN teachers ON (accounts_teachers.teacher_id = teachers.id) WHERE accounts.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT images.* FROM courses JOIN courses_images ON (courses.id = courses_images.course_id) JOIN images ON (courses_images.image_id = images.id) WHERE courses.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT lessons.* FROM courses JOIN courses_lessons ON (courses.id = courses_lessons.course_id) JOIN lessons ON (courses_lessons.lesson_id = lessons.id) WHERE courses.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT schools.* FROM courses JOIN courses_schools ON (courses.id = courses_schools.course_id) JOIN schools ON (courses_schools.school_id = schools.id) WHERE courses.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT services.* FROM courses JOIN courses_services ON (courses.id = courses_services.course_id) JOIN services ON (courses_services.service_id = services.id) WHERE courses.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT students.* FROM courses JOIN courses_students ON (courses.id = courses_students.course_id) JOIN students ON (courses_students.student_id = students.id) WHERE courses.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT teachers.* FROM courses JOIN courses_teachers ON (courses.id = courses_teachers.course_id) JOIN teachers ON (courses_teachers.teacher_id = teachers.id) WHERE courses.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT lessons.* FROM images JOIN images_lessons ON (images.id = images_lessons.image_id) JOIN lessons ON (images_lessons.lesson_id = lessons.id) WHERE images.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT schools.* FROM images JOIN images_schools ON (images.id = images_schools.image_id) JOIN schools ON (images_schools.school_id = schools.id) WHERE images.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT services.* FROM images JOIN images_services ON (images.id = images_services.image_id) JOIN services ON (images_services.service_id = services.id) WHERE images.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT students.* FROM images JOIN images_students ON (images.id = images_students.image_id) JOIN students ON (images_students.student_id = students.id) WHERE images.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT teachers.* FROM images JOIN images_teachers ON (images.id = images_teachers.image_id) JOIN teachers ON (images_teachers.teacher_id = teachers.id) WHERE images.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT schools.* FROM lessons JOIN lessons_schools ON (lessons.id = lessons_schools.lesson_id) JOIN schools ON (lessons_schools.school_id = schools.id) WHERE lessons.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT services.* FROM lessons JOIN lessons_services ON (lessons.id = lessons_services.lesson_id) JOIN services ON (lessons_services.service_id = services.id) WHERE lessons.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT students.* FROM lessons JOIN lessons_students ON (lessons.id = lessons_students.lesson_id) JOIN students ON (lessons_students.student_id = students.id) WHERE lessons.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT teachers.* FROM lessons JOIN lessons_teachers ON (lessons.id = lessons_teachers.lesson_id) JOIN teachers ON (lessons_teachers.teacher_id = teachers.id) WHERE lessons.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT services.* FROM schools JOIN schools_services ON (schools.id = schools_services.school_id) JOIN services ON (schools_services.service_id = services.id) WHERE schools.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT students.* FROM schools JOIN schools_students ON (schools.id = schools_students.school_id) JOIN students ON (schools_students.student_id = students.id) WHERE schools.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT teachers.* FROM schools JOIN schools_teachers ON (schools.id = schools_teachers.school_id) JOIN teachers ON (schools_teachers.teacher_id = teachers.id) WHERE schools.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT students.* FROM services JOIN services_students ON (services.id = services_students.service_id) JOIN students ON (services_students.student_id = students.id) WHERE services.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT teachers.* FROM services JOIN services_teachers ON (services.id = services_teachers.service_id) JOIN teachers ON (services_teachers.teacher_id = teachers.id) WHERE services.id = {$this->getId()};");
$GLOBALS['DB']->query("SELECT teachers.* FROM students JOIN students_teachers ON (students.id = students_teachers.student_id) JOIN teachers ON (students_teachers.teacher_id = teachers.id) WHERE students.id = {$this->getId()};");
