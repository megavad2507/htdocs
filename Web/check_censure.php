<?php
            if(isset($_POST['username'])) {
                $array_of_mat = array('блять', 'бля', 'хуй', 'пизда', 'пиздец', 'фак', 'хуевый', 'охуительный', 'твою мать', 'нах', 'нахуй', 'пиздеж', 'пиздюлина',
                    'пиздабол', 'подпездывать', 'ебло', 'ебать', 'ебут', 'мудоебы', 'ебсти', 'мудак', 'манда', 'лох', 'говно', 'жопа');
                foreach ($array_of_mat as $value) {
                    if ((substr_compare($_POST['username'], $value, 0)) == 0) {
                        echo "Мат";
                        exit();

                    }
                }
            }
?>
