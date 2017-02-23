<?php

    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Student.php";
    require_once __DIR__."/../src/Teacher.php";

    $app = new Silex\Application();

    $app['debug']=true;

    $server = 'mysql:host=localhost:8889;dbname=crm_music';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        if (empty(Teacher::getAll())) {
        return $app['twig']->render('index.html.twig' );
        } else {
          return $app['twig']->render('index.html.twig', array('teachers' => Teacher::getAll()));
        }
    });

    $app->get("/teachers", function() use ($app) {
        if (empty(Teacher::getAll())) {
        return $app['twig']->render('teachers.html.twig', array('teachers' => array()));
        } else {
          return $app['twig']->render('teachers.html.twig', array('teachers' => Teacher::getAll()));
        }
    });

    $app->post("/teachers", function() use ($app) {

        $new_teacher_name = $_POST['teacher_name'];
        $new_teacher_instrument = $_POST['teacher_instrument'];
        $new_teacher = new Teacher($new_teacher_name, $new_teacher_instrument);
        $new_teacher->setNotes(date('l jS \of F Y h:i:s A') . " of first entry.");
        $new_teacher->save();
        return $app['twig']->render('teachers.html.twig', array('teachers' => Teacher::getAll()));

    });

    $app->get("/teachers/{id}", function($id) use ($app) {
        $teacher = Teacher::findTeacher($id);
        $teachers_students = Student::findStudentsByTeacher($id);
        var_dump($teacher);
        var_dump($teachers_students);
        return $app['twig']->render('teacher.html.twig', array('teacher' => $teacher, 'teachers_students' => $teachers_students ));

    });
    $app->get("/students", function() use ($app) {
        if (empty(Student::getAll())) {
        return $app['twig']->render('students.html.twig' );
        } else {
          return $app['twig']->render('students.html.twig', array('students' => Student::getAll()));
        }
    });


    return $app;
 ?>
