<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Home</h1>
    <?php
           use d17030752\Validator\models\Validator;
           require_once 'src/models/Validator.php';
           $validator = new Validator('12/12/2020');
           $validator2 = new Validator(45);
           $validator
           ->isNumber()
           ->isEmail()
           ->isUrl()
           ->isDate()
           ->contains(['google','www']);
           $validator2
           ->isNumber()
           ->isDate()
           ->contains(['hola'])
           ->minLength(3);
           if (count($validator->getErrors()) > 0) {
               echo "Hay un error en validator 1";
               foreach ($validator->getErrors() as $error) {
                   # code...
                   echo "<div>{$error['value']} : {$error['text']}</div>";
                }
            }
            if (count($validator2->getErrors()) > 0) {
                echo "Hay un error en validator 2";
                foreach ($validator2->getErrors() as $error) {
                    # code...
                    echo "<div>{$error['value']} : {$error['text']}</div>";
                }
            }
            
            ?>
</body>

</html>