<?php

for ($i = 1; $i <= 10; $i++) {
    echo $i.'<br/>';
}

echo '<br/>';
for ($i = 2; $i <= 20; $i++) {
    if ($i % 2 == 0) {
        echo $i.'<br/>';
    }

}

echo '<br/>';
for ($i = 10; $i >= 0; $i--) {
    echo $i.'<br/>';
}

echo '<br/>';
for ($i = 1; $i <= 10; $i++) {
    echo ($i * 7).'<br/>';
}
